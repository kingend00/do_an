<?php

namespace App\Http\Controllers\User;
use App\Model\M_Menu;
use App\Model\M_Category;
use DB;
use Cart;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
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
    public function addtoCart($id)
    {      
            $product = DB::table('menu')->where('menu_id','=',$id)->get();
            
            if($product)
            {            
                Cart::add(['id'=>$product[0]->menu_id,'name'=>$product[0]->name,'qty'=>1,'price'=>$product[0]->price,'options'=>['description'=>$product[0]->description,'image'=>$product[0]->image]]);
                return "Bạn đã thêm thành công 1 sản phẩm";
            }
            
            return "Đã có lỗi xảy ra vui lòng thử lại";
        //return redirect()->back();
        


    }
    public function addComboToCart($id)
    {
        $combo = DB::table('combo')->where('combo_id','=',$id)->get();
        $combo_details = DB::table('combo_details')->select('menu.name as Name_menu','combo_details.quantity')->join('menu','menu.menu_id','=','combo_details.menu_id')->where('combo_id','=',$id)->get();
        $html  = '';
        foreach($combo_details as $item )
        {
            $html .= $item->Name_menu.' - Số lượng: '.$item->quantity.'<br/>';
        } 
        
        if($combo)
        {
                Cart::add(['id'=>$combo[0]->combo_id,'name'=>$combo[0]->name,'qty'=>1,'price'=>$combo[0]->price,'options'=>['description'=> $html]]);
                return "Bạn đã thêm thành công 1 combo";
        }
        return "Đã có lỗi xảy ra vui lòng thử lại";
    }
    // trả về view xem chi tiết giỏ hàng -> thêm/sửa.xóa sản phẩm
    public function showCart()
    {
        $cart = Cart::content();
        return view('User.ShoppingCart',compact('cart'));
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
        return "hihi";
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
        if($menu)
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
        $product = DB::table('menu')->where('menu_id','=',$id)->get();
        if($product)
        {
            $rows = Cart::search(function($key, $value) {
                return $key->id == $id;
            });
            $item = $rows->first();
            Cart::update($item->rowId, ++$item->qty);
            $data = $item->qty;
            return response()->json(['data'=>$data]);   
        }
    }
    public function EditCart(Request $request)
    {

        $rowId = $request->input('rowId');
        $qty = $request->input('qty');
        $number = count($rowId);
        for ($i=0; $i < $number; $i++) { 
            Cart::update($rowId[$i],$qty[$i]);
        }
        return redirect()->route('F_seat.index');

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
        $rowId = $id;
       $result =  Cart::remove($rowId);
        if($result)
        return "Thành công";
        else {
            return "Thất bại";
        }
    }
}
