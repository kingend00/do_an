<?php

namespace App\Http\Controllers\User;
use App\Model\M_Menu;
use App\Model\M_Category;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class C_Menu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $menu = DB::table('menu')->join('category','menu.category_id','=','category.category_id')->select('menu.*','category.name')->get();
       $data = array();
       $categorys = DB::table('category')->orderBy('category_id', 'asc')->get();
       foreach ($categorys as $key ) {
            $value = DB::table('menu')->where('category_id','=',$key->category_id)->get();
            $data[$key->name] = $value;
       }
       return view('User.Menu',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = DB::table('menu')->where('type','=',$id)->get();
        return view('Admin.Menu',compact('menu'));
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
