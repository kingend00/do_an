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
        $val = DB::table('category')->get();
        return view('Admin.Menu',compact('val'));
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
            'name' => $request->input('Name_Add'),
            'description' => $request->input('Description_Add'),
            'price' => $request->input('Price_Add'),
            'image' => $request->input('Image_Add'), 
            'category_id' => $request->input('Category_id_Add')

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
        $data = DB::table('menu')->where('menu_id','=',$id)->get();
        return response()->json(['data'=>$data]);
    }
    public function showMenu($category_id)
    {
        $menu = DB::table('menu')->join('category','menu.category_id','=','category.category_id')->select('menu.*','category.name as category_name')->where('menu.category_id','=',$category_id)->simplePaginate(10);
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
        $data = ['name'=>$request->input('Name'),'description'=>$request->input('Description'),'price'=>$request->input('Price'),'category_id'=>$request->input('Category_id'),'image'=>$request->input('Image')];
        $Menu_items = DB::table('menu')->where('menu_id','=',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = DB::table('menu')->where('menu_id','=',$id)->get();
        if($menu)
        {
            $menu->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
