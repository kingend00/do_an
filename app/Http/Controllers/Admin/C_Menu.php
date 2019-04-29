<?php

namespace App\Http\Controllers\Admin;
use App\Model\M_Menu;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        $data = array();
        $menu = DB::table('menu')->distinct()->select('type')->get();
        foreach ($menu as $key) {
            $data[$key->type] = DB::table('menu')->where('type','=',$key->type)->get();
        }
        return view('User.menu',compact('data'));
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
        DB::table('menu')->insert([
            'name' => $request->input('Name'),
            'description' => $request->input('Description'),
            'price' => $request->input('Price'),
            'image' => $request->input('Image'), 
            'type' => $request->input('Type')

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = M_Menu::find($id);
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
        $Menu_items = M_Menu::find($id);
        $Menu_items->name = $request->input('Name'); 
        $Menu_items->description = $request->input('Description'); 
        $Menu_items->price = $request->input('Price'); 
        $Menu_items->type = $request->input('Type'); 
        $Menu_items->image = $request->input('Image');   
        $Menu_items->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = M_Menu::find($id);
        if($menu)
        {
            $menu->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
