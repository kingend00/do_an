<?php

namespace App\Http\Controllers\Admin;
use App\Model\M_Menu;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;

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
    public function store(MenuRequest $request)
    {
       // $request->input('Image_Add');
        if($request->hasfile('Image_Add')) 
        { 
            $file = $request->file('Image_Add');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            //$filename =time().'.'.$extension;
            $file->move('images/food/', $extension);
            
            $name = $request->input('Name_Add');
            if(!DB::table('menu')->where('name','=',$name)->get())
            {
                return redirect()->back()->with('error','Sản phẩm đã tồn tại');
            }
            else {
                
                DB::table('menu')->insert([
                    'name' => $request->input('Name_Add'),
                    'description' => $request->input('Description_Add'),
                    'price' => $request->input('Price_Add'),
                    'image' => $extension, 
                    'category_id' => $request->input('Category_id_Add')
        
                ]);
                return redirect()->back()->with('success','Thêm sản phẩm mới thành công');
            }
        
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
        $data = DB::table('menu')->where('menu_id','=',$id)->get();
        if($data)
            return response()->json(['data'=>$data]);
    }
    public function showMenu($category_id)
    {
        if(DB::table('menu')->where('category_id','=',$category_id)->get())
        {
        $menu = DB::table('menu')->join('category','menu.category_id','=','category.category_id')->select('menu.*','category.name as category_name')->where('menu.category_id','=',$category_id)->simplePaginate(10);
            return view('Admin.Menu',compact('menu'));
        }
        return redirect()->back()->with('error','Danh mục không tồn tại !!!');
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
    public function update(MenuRequest $request, $id)
    {   
        if(DB::table('menu')->where('menu_id','=',$id)->get())
        {
            $data = ['name'=>$request->input('Name'),'description'=>$request->input('Description'),'price'=>$request->input('Price'),'category_id'=>$request->input('Category_id'),'image'=>$request->input('Image')];
            $Menu_items = DB::table('menu')->where('menu_id','=',$id)->update($data);
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
        $menu = DB::table('menu')->where('menu_id','=',$id)->get();
        if($menu)
        {
            DB::table('menu')->where('menu_id','=',$id)->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
