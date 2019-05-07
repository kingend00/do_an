<?php

namespace App\Http\Controllers\User;
use DB;
use Cart;
use App\Model\M_Booktable;
use App\Model\M_Booktable_Details;
use App\Model\M_Seat_Status;
use Illuminate\Http\Request;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = [
        // 'number_seat'=>$request->number_seat,
        // 'email'=>$request->input('email'),
        // 'name' => $request->input('name'),
        // 'phone'=>$request->input('phone'),
        // 'date'=>$request->input('date'),
        // 'time'=>$request->time,
        // 'total'=>(int)$request->input('total_money')
        // ];
        // $result = DB::table('booktable')->insert($data);
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
        $seat_status->date = $request->input('time');
        $seat_status->save();
        //foreach lặp để lưu các chi tiết đơn đặt bàn ---- Mai 
        $data = Cart::content();
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
        return response()->json(['data'=>$data]);
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
