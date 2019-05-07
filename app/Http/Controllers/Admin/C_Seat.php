<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Model\M_Seat;
use App\Model\M_Seat_Status;
use Illuminate\Http\Request;
use App\Http\Requests\B_SeatRequest;
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
        $data = DB::table('seat')->get();
       return view('Admin.Seat',compact('val','data'));
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
        if(DB::table('seat')->where('number_seat','=',$request->input('NumberAdd'))->get() != null)
        {
            if(DB::table('seat')->where('type','=',$request->input('Type'))->get() == null)
            {
                return redirect()->back()->with('error','Không tồn tại loại bàn này !!');
            }
            else {
                DB::table('seat')->insert([
                    'type' => $request->input('Type')
                ]);
                return redirect()->back()->with('success','Thêm bàn mới thành công'); 
            }
                
        }
        return redirect()->back()->with('error','Số bàn đã tồn tại');
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
        if($data)
            return response()->json(['data'=>$data]);
    }


    public function showType($type)
    {
        // hiển thị loại bàn theo số lượng tăng dần
        $val = DB::table('seat')->select('type')->distinct('type')->get();   
        if($type == 'All')
          $data = DB::table('seat')->get();
        else    
         $data = DB::table('seat')->where('type','=',$type)->get();
        
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
    public function update(B_SeatRequest $request, $id)
    {
        if(DB::table('seat')->where('type','=',$request->input('Type'))->get())
       {
            if(DB::table('seat')->where('number_seat','=',$id)->get() != null)
            {
                DB::table('seat')->where('number_seat','=',$id)->update(['type'=>$request->input('Type')]);
                return "thành công";
            }
                return "Số bàn không tồn tại";     
       }
        
        return "Loại bàn không tồn tại";
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
