<?php

namespace App\Http\Controllers\Admin;
use DB;
use Model\M_Booktable;
use Model\M_Booktable_Details;
use Illuminate\Http\Request;
use App\Http\Requests\BookTableRequest;
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
        $data = DB::table('booktable')->paginate(15);
        return view('Admin.Booktable',compact('data'));
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
        $data = ['email'=>$request->input('Email'),'name' => $request->input('Name'),'phone' => $request->input('Phone')
        ,'date'=>$request->input('Date'),'status'=>$request->input('Status'),'total'=>$request->input('Total')];
        DB::table('booktable')->insert($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('booktable')->select('date','time','status')->where('booktable_id','=',$id)->get();
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
       
    }
    public function showDetails($id)
    {
        $data = DB::table('booktable_details')->join('menu','booktable_details.menu_id','=','menu.menu_id')->join('combo','booktable_details.combo_id','=','combo.combo_id')
        ->select('booktable_details.*','combo.name','menu.name')->where('booktable_id','=',$id)->get();
        dd($data);
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
        $data = ['date'=>$request->input('Update_Date'),'time'=>$request->input('Update_Time'),'status'=>$request->input('Update_Status')];
        $result = DB::table('booktable')->where('booktable_id','=',$id)->update($data);
 
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
