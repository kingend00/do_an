<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Model\M_Seat;
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
    public function __construct(){
        //$this->middleware('denied_cus_emp');
    }
    public function index()
    {
        $val = DB::table('seat')->select('type')->distinct('type')->get();
       return view('Admin.Seat',compact('val'));
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
        DB::table('seat')->insert([
            'type' => $request->input('Type')
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('seat')->where('number_seat','=',$id)->get();
        return response()->json(['data'=>$data]);
    }


    public function showType($type)
    {
        // hiển thị loại bàn theo số lượng tăng dần
        $val = DB::table('seat')->select('type')->distinct('type')->get();   
        if($type == 'All')
          $data = DB::table('seat')->simplePaginate(10);
        else    
         $data = DB::table('seat')->where('type','=',$type)->simplePaginate(10);

        return view('Admin.Seat',compact('data','val'));
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
    public function AutoIncrement()
    {
        $data = DB::table('seat')->select('number_seat')->orderBy('number_seat','DESC')->get();
        return response()->json(['data'=>$data]);
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
       
        $data = DB::table('seat')->where('number_seat','=',$id)->update(['type'=>$request->input('Type')]);
        return "Thành công";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seat = DB::table('seat')->where('number_seat','=',$id)->delete();
        if($seat)
        {
            $seat->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
