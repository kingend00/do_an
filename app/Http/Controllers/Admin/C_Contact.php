<?php

namespace App\Http\Controllers\Admin;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class C_Contact extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('feedback')->get();
        return view('Admin.Contact',compact('data'));
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

     // Thêm phản hồi mới vào db
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'phone' => 'required|numeric',
            'message' =>'required|max:255'
        ]);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ];
        DB::table('feedback')->insert(['name' => $request->name,'phone' => $request->phone,'email' => $request->email,'message' => $request->message]);
        return redirect()->back()->with('success','Cảm ơn bạn đã góp ý , chúng tôi sẽ xem và rút kinh nghiệm !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = DB::table('feedback')->where('feedback_id','=',$id)->get();
        if(count($feedback)>=1)
        {
            DB::table('feedback')->where('feedback_id','=',$id)->update(['type'=>'seen']);
             return view('Admin.Details',compact('feedback'));
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
        $combo = DB::table('feedback')->where('feedback_id','=',$id)->get();
        if(count($combo)>=1)
        {
            
            DB::table('feedback')->where('feedback_id','=',$id)->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
