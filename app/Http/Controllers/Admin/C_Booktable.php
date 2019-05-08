<?php

namespace App\Http\Controllers\Admin;
use DB;
use Model\M_Booktable;
use Model\M_Booktable_Details;
use Illuminate\Http\Request;
use App\Http\Requests\BookTableRequest;
use App\Http\Requests\B_BooktableAddRequest;
use App\Http\Controllers\Controller;

class C_Booktable extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = DB::table('booktable')->get();
        $TypeSeat = DB::table('seat')->select('type')->distinct('type')->get();
        return view('Admin.Booktable',compact('data','TypeSeat'));
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
    public function store(B_BooktableAddRequest $request)
    {
        
        $query = DB::table('booktable')->where('number_seat','=',$request->Number_seat)->where('date','=',$request->Date)->where('time','=',$request->Time)->whereIn('status',['success','wait','using'])->get();
        if (count($query)<1) {
            $data = ['email'=>$request->input('Email'),'name' => $request->input('Name'),'phone' => $request->input('Phone')
            ,'date'=>$request->Date,'number_seat'=>$request->Number_seat,'time' => $request->Time];    
             $test = DB::table('booktable')->insert($data);
          return redirect()->back()->with('success','Tạo đơn đặt bàn thành công');

        }
        else {
            return redirect()->back()->with('error','Đơn đặt bàn đã tồn tại');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('booktable')->select('booktable_id','date','time','status')->where('booktable_id','=',$id)->get();
        if($data)
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
        $data = DB::table('seat')->select('number_seat')->where('type','=',$id)->get();
       if($data)
        return response()->json(['data'=>$data]);
    }

    // Tối Xử lý  cả front-end
    public function showDetails($id)
    {      
            $data = DB::table('booktable_details')->where('booktable_id','=',$id)->get();
            if(count($data)>=1)
             return view('Admin.Details',compact('data'));
            return "Đơn này không có sản phẩm đặt trước";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookTableRequest $request, $id)
    {
        if(DB::table('booktable')->where('booktable_id','=',$id)->get())
        {
            $data = ['date'=>$request->input('Update_Date'),'time'=>$request->input('Update_Time'),'status'=>$request->input('Update_Status')];
            $result = DB::table('booktable')->where('booktable_id','=',$id)->update($data);
            return "Cập nhật thành công";
        }
        return "Cập nhật thất bại";
        
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
