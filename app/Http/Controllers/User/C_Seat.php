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
        $data = array();
        $datanew = array();
        
        for($i = 0;$i < count($data_seat);$i++)
        {
            $value = array();
            $row = DB::table('booktable')->select('time')->where('date',$date3)->where('number_seat',$data_seat[$i]->number_seat)->get();
           if(count($row) != 0)
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

                $data[$data_seat[$i]->number_seat] = $datanew;
           }
           
           
        }
         $new['12'] = $data;

        return json_encode($new);
        // $hihi = 1;
        // $html = "{";
        //     foreach($data as $key=>$value)
        //     {
               
        //         $html .= "'".$hihi."' :{";
        //         $html .= "title: '".$key."',";
        //         $html .= "schedule :[";
        //         for($i = 0 ; $i < count($value)-1;$i++)
        //         {
        //             $data2 = $this->start_end($value[$i],$value[$i+1]);
        //             $html .= "{start: '".$data2[0].":00',";
        //             $html .= "end: '".$data2[1].":00',},";
        //         } 
        //         $html .= "]";
        //         $html .= "},";
        //         $hihi++;   
        //     }
        // $html .= "}";
        // session()->put(['hihi'=>$html]);
        // return $html;

        
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBooktableRequest $request)
    {
        $date2 =  strtotime(str_replace('/', '-', $request->input('date')));
        $date3 = date('Y-m-d',$date2);
        $date_now = date('Y-m-d',time());
        if($date3 < $date_now)
            return redirect()->back()->with('error','Ngày đặt nhỏ hơn ngày hiện tại');
        elseif($date3 == $date_now)
        {
            if($request->time < date('H:i'))
            return redirect()->back()->with('error','Thời gian đặt nhỏ hơn thời gian hiện tại');
        }
        
        $query = DB::table('booktable')->where('number_seat','=',$request->number_seat)->where('date','=',$request->input('date'))->where('time','=',$request->time)->whereIn('status',['success','wait','using'])->get();
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
            return redirect()->back()->with('success','Đã gửi đi đơn đặt bàn , Quý khách vui lòng chờ trong giây lát... ');
        }
        return redirect()->back()->with('error','Đã có người đặt đơn này , Quý khách vui lòng chọn lại thời gian khác !');


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
        if ($data) {
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
