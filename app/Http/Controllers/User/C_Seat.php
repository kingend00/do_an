<?php

namespace App\Http\Controllers\User;
use DB;
use Cart;
use App\Model\M_Booktable;
use App\Model\M_Booktable_Details;
use App\Model\M_Seat_Status;
use Illuminate\Http\Request;
use App\Http\Requests\AddBooktableRequest;
use App\Http\Controllers\Controller;
use App\Events\PusherEvent;
use Mail;

class C_Seat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // show dữ liệu lên trang đặt bàn -----
    public function index()
    {
        $val = DB::table('seat')->select('type')->distinct('type')->get();

        $data = Cart::content();

        $total = 0;
        foreach($data as $totals)
        {
            $total += $totals->qty*$totals->price;
        }
        return view('User.bookTable',compact('val','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function showTime_Seat(Request $request)
    {
        $seat = $request->seat;
       
        $date = $request->input('date');
        $date2 =  strtotime(str_replace('/', '-', $date));
        $date3 = date('Y-m-d',$date2);
        $data_seat = DB::table('seat')->select('number_seat')->where('type',$seat)->get();
        if(count($data_seat) < 1)
            return "false";
        
        $new = array();
        for($i = 0;$i < count($data_seat);$i++)
        {
            $datanew = array();
            $data = array();
            $value = array();
            $row = DB::table('booktable')->select('time')->where('date',$date3)->where('number_seat',$data_seat[$i]->number_seat)->whereIn('status',['wait','using'])->get();
           if(count($row) > 0)
           {
            for($j=0;$j<count($row);$j++)
            {
                $split  = explode(':',$row[$j]->time);
                array_push($value,(int)$split[0]);
            }

                array_push($value,22);
                sort($value);
                for($k = 0 ; $k < count($value)-1;$k++)
                {
                    $datanew[$k] = [1 => $this->start_end($value[$k],$value[$k+1])];
                    
                }

                $data["Bàn ".$data_seat[$i]->number_seat] = $datanew;
                $new[$i] = $data;
           }
           else {
                $data["Bàn ".$data_seat[$i]->number_seat] = array([1=>"00:00-00:00"]);
                $new[$i] = $data;
           }          
        }
         

        return json_encode($new);
     
    }
    public function start_end($a,$b)
    {
        if($b-$a >= 2)
        {
            $result =  $a.":00-".($a+2).":00";
            return $result;
        }
        else
        {
            $result =  $a.":00-".($a+1).":00";
            return $result;
        }
    }
    public function checkTime(Request $request)
    {
        $time_checked = explode(':',$request->time)[0];
        $date3 = date('Y-m-d',strtotime(str_replace('/', '-', $request->input('date'))));
        $data = DB::table('booktable')->select('time')->where('date','=',$date3)->where('number_seat','=',$request->number_seat)->whereIn('status',['wait','using'])->get();
        $mang = array();
        foreach($data as $item)
        {
            $item = explode(':',$item->time); 
            $mang[] = (int)$item[0];
        }
            sort($mang);
        for($i =0; $i < count($mang);$i++)
        {
            if($mang[$i]-$time_checked == 1)
            return "Đã có người đặt sau thời gian này 1h, hoặc thời gian này đã có người đặt, Quý khách nên cân nhắc !";
        }
        return 2;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBooktableRequest $request)
    {
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date2 =  strtotime(str_replace('/', '-', $request->input('date')));
        $date3 = date('Y-m-d',$date2);
        $date_now = date('Y-m-d',time());
        $time = date('H:i',strtotime($request->time));
        $email = $request->input('email');

        if($request->number_seat == 'false')
            return "Xin hãy chọn bàn trước khi đặt";
        if($request->time =="none")
            return " Xin hãy chọn giờ trước khi đặt";
        if($date3 < $date_now)
            return 'Ngày đặt nhỏ hơn ngày hiện tại';
        elseif($date3 == $date_now)
        {
            if($time < date('H:i'))
            return 'Thời gian đặt nhỏ hơn thời gian hiện tại';
        }

        $time_time = explode(':',$request->time)[0];
        $time_time = (int)$time_time;
        $time_time1 = ($time_time-1).":00";
        //$time_time2 = ($time_time+2).":00";
        
        
       

        if(count( DB::table('booktable')->where('date',$date3)->where('number_seat',$request->number_seat)->where('time',$time_time1)->whereIn('status',['wait','using'])->get()) != 0)
        {
            return 'Thời gian đặt bị trùng ,quý khách vui lòng xem lại biểu đồ thời gian';
        }
        $query = DB::table('booktable')->where('number_seat','=',$request->number_seat)->where('date','=',$date3)->where('time','=',$request->time)->whereIn('status',['wait','using'])->get();
        if(count($query)<1)
        {
            $date = $request->input('date');
            $date2 =  strtotime(str_replace('/', '-', $date));
            $date3 = date('Y-m-d',$date2);
            $booktable = new M_Booktable;
            $booktable->number_seat = $request->number_seat;
            $booktable->email = $request->input('email');
            $booktable->name = $request->input('name');
            $booktable->phone = $request->input('phone');
            $booktable->date = $date3;
            $booktable->time = $request->time;
            $booktable->total = $request->input('total_money');
            $booktable->save();
            //foreach lặp để lưu các chi tiết đơn đặt bàn ---- Mai 
            $data = Cart::content();
            if(count($data)>1)
            {
                foreach($data as $value)
                {
                    $bt_details = new M_Booktable_Details;
                    if($value->options->type != null)
                        $bt_details->combo_id = $value->id;
                    else   
                        $bt_details->menu_id = $value->id;

                    $bt_details->quantity = $value->qty;
                    $bt_details->price = $value->price;
                        //$booktable->details()->save($bt_details);
                    $bt_details ->booktables()->associate($booktable);
                    $bt_details->save();
                }
            }
            Cart::destroy();
            $notification = "Đã có hóa đơn bàn ".$request->number_seat." ".$request->time." giờ";
            event(new PusherEvent($notification));
            $query = DB::table('booktable')->where('email','=',$request->email)->orderBy('booktable_id','DESC')->first();

                $check = Mail::send('User.sendBooktable',['data'=>$query], function ($message) use ($email) {
                    $message->to($email);
                });
                return "true";
                           
            
        }
        return 'Đã có người đặt đơn này , Quý khách vui lòng chọn lại thời gian khác !';


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Hiển thị bàn theo loại bàn người dùng chọn ----
    public function show($id)
    {
        $data = DB::table('seat')->select('number_seat')->where('type','=',$id)->get();
        if (count($data) != 0) {
            return response()->json(['data'=>$data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
