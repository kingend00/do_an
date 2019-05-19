<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Model\M_Seat;
use App\Model\M_Seat_Status;
use Illuminate\Http\Request;
use App\Http\Requests\B_SeatRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
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
       
       return view('Admin.Seat',compact('val','data'));
    }
    public function getData($type){
         $seat = DB::table('seat')->where('type','=',$type)->get();
        if($type == 'All')
        $seat = DB::table('seat')->get();
        return Datatables::of($seat)->addColumn('btn-edit',function($seat){
            return '<button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="'.route('B_seat.show',$seat->number_seat).'"><i class = "glyphicon glyphicon-cog"></i> Sửa</button>';
        })->addColumn('btn-destroy',function($seat){
            return '<button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="'.route('B_seat.destroy',$seat->number_seat).'"><i class="notika-icon notika-close"></i> Xóa</button>';
        })->rawColumns(['btn-edit','btn-destroy'])->make(true);
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
        $request->validate([
            'Type'=>'required|numeric',
            'NumberAdd' => 'required|numeric'
            
        ],
        [],
        ['Type'=>'Loại bàn','NumberAdd' => 'Số bàn']);
        if(DB::table('seat')->where('number_seat','=',$request->input('NumberAdd'))->get() != null)
        {
            if(DB::table('seat')->where('type','=',$request->input('Type'))->get() == null)
            {
                return redirect()->back()->with('error','Không tồn tại loại bàn này !!');
            }
            else {
                $type = $request->input('Type');
                DB::table('seat')->insert([
                    'type' => $type
                    
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
        return view('Admin.Seat',compact('type','val'));
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
                $hihi = DB::table('seat')->where('number_seat','=',$id)->update(['type'=>$request->input('Type')]);
                
            }
                   
       }
        
       return Datatables::queryBuilder(DB::table('seat'))->make(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seat = DB::table('seat')->where('number_seat','=',$id)->get();
        if($seat)
        {
            $seat = DB::table('seat')->where('number_seat','=',$id)->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
