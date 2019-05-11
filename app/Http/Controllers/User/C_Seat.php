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
    public function showTime_Seat($date,$people)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBooktableRequest $request)
    {
  
        $query = DB::table('booktable')->where('number_seat','=',$request->number_seat)->where('date','=',$request->input('date'))->where('time','=',$request->time)->whereIn('status',['success','wait','using'])->get();
        if(count($query)<1)
        {
            $booktable = new M_Booktable;
            $booktable->number_seat = $request->number_seat;
            $booktable->email = $request->input('email');
            $booktable->name = $request->input('name');
            $booktable->phone = $request->input('phone');
            $booktable->date = $request->input('date');
            $booktable->time = $request->time;
            $booktable->total = $request->input('total_money');
            $booktable->save();
            $seat_status = new M_Seat_Status;
            $seat_status->number_seat = $request->number_seat;
            $seat_status->date = $request->input('date');
            $seat_status->time = $request->time;
            $seat_status->save();
            //foreach lặp để lưu các chi tiết đơn đặt bàn ---- Mai 
            $data = Cart::content();
            if(count($data)>1)
            {
                foreach($data as $value)
                {
                        $bt_details = new M_Booktable_Details;
                        $bt_details->menu_id = $value->id;
                        $bt_details->quantity = $value->qty;
                        //$booktable->details()->save($bt_details);
                        $bt_details ->booktables()->associate($booktable);
                        $bt_details->save();
                }
            }
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
