<?php

namespace App\Http\Controllers\Admin;
use DB;
use Model\M_Booktable;
use Model\M_Booktable_Details;
use Illuminate\Http\Request;
use App\Http\Requests\BookTableRequest;
use App\Http\Requests\B_BooktableAddRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Events\PusherEvent;

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
    public function getData()
    {
        $booktable = DB::table('booktable')->orderBy('booktable_id','DESC')->get();
        return Datatables::of($booktable)->addColumn('btn-edit',function($booktable){
            return '<button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="'.route('B_booktable.show',$booktable->booktable_id).'"><i class = "glyphicon glyphicon-cog"></i> Sửa</button>';
        })->addColumn('btn-details',function($booktable){
            return '<button type="button" class="btn btn-danger danger-icon-notika btn-details" data-toggle="modal" data-target="#ModalDetails" data-url="'.route('B_booktable.showDetails',$booktable->booktable_id).'"><i class="notika-icon notika-close"></i>Chi tiết</button>';
        })->rawColumns(['btn-edit','btn-details'])->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(B_BooktableAddRequest $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date2 =  strtotime(str_replace('/', '-', $request->Date));
        $date3 = date('Y-m-d',$date2);
        $date_now = date('Y-m-d',time());
        if($date3 < $date_now)
            return redirect()->back()->with('error','Ngày đặt nhỏ hơn ngày hiện tại');
        
        if($request->Time < date('H:i'))
         return redirect()->back()->with('error','Thời gian đặt nhỏ hơn thời gian hiện tại'); 
        //$date_new = date_format($date,'m/d/Y'); 
            //$date = date('d/m/Y - H:i:s',strtotime($date));   
            
       $query = DB::table('booktable')->where('number_seat','=',$request->Number_seat)->where('date','=',$date3)->where('time','=',$request->Time)->whereIn('status',['wait','using'])->get();
        if (count($query)<1) {
            $data = ['email'=>$request->input('Email'),'name' => $request->input('Name'),'phone' => $request->input('Phone')
            ,'date'=>$date3,'number_seat'=>$request->Number_seat,'time' => $request->Time];    
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
        $data = DB::table('booktable')->select('booktable_id','date','time','status','email','number_seat')->where('booktable_id','=',$id)->get();
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
       if(count($data)>=1)
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
        
        $date = date('Y-m-d',strtotime($request->input('Update_Date')));
        $date_now = date('Y-m-d',time());
        if($date < $date_now)
            return 'Ngày đặt nhỏ hơn ngày hiện tại';
        if($date == $date_now)
        {
            if($request->input('Update_Time') < date('H:i'))
            return 'Thời gian đặt nhỏ hơn thời gian hiện tại';
        }


      
        if($request->Update_Time != $request->Time_Check)
        {
            $query = DB::table('booktable')->where('number_seat','=',$request->input('Update_Number_Seat'))->where('date','=',$date)->where('time','=',$request->Time_Check)->whereIn('status',['wait','using'])->get();
            if(count($query) != 0)
                return "Thời gian đã bị trùng";
        }   

        if(count(DB::table('booktable')->where('booktable_id','=',$id)->get())!=0)
        {           
             
            $status = $request->input('Update_Status');
            if ($status == 'success') {
                // Tính số điểm mới
                $data = DB::table('booktable_details')->select(DB::raw('sum(quantity*price) as total'))->where('booktable_id','=',$id)->value('total');
                $point = (int)($data/50000);
                // Lấy lại số điểm cũ và cộng thêm số điểm mới
               if(count(DB::table('users')->where('email','=',$request->Update_User)->get()) >=1)
               {
                $point_old = DB::table('users')->select('point')->where('email','=',$request->Update_User)->value('point');
                $point += $point_old;
                // Update điểm 
                DB::table('users')->where('email','=',$request->Update_User)->update(['point'=>$point]);
               }
   
            }
            $data = ['date'=>$date,'time'=>$request->input('Update_Time'),'status'=>$request->input('Update_Status')];
            $result = DB::table('booktable')->where('booktable_id','=',$id)->update($data);
           event(new PusherEvent('false'));
            return "true";
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
