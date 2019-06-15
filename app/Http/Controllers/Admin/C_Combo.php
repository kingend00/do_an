<?php

namespace App\Http\Controllers\Admin;
use DB;
use Cart;
use App\Model\M_Combo_Details;
use App\Model\M_Combo;
use Illuminate\Http\Request;
use App\Http\Requests\AddComboRequest;
use App\Http\Requests\UpdateComboRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\UploadedFile;

class C_Combo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('combo')->get();
        $val = DB::table('menu')->join('category','menu.category_id','=','category.category_id')->select('menu.*','category.name as name_category')->get();
        return view('Admin.Combo',compact('data','val'));
    }
    public function getData()
    {
        $combo = DB::table('combo')->get();
        return Datatables::of($combo)->addColumn('btn-edit',function($combo){
            return '<button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="'.route('B_combo.show',$combo->combo_id).'"><i class = "glyphicon glyphicon-cog"></i> Sửa</button>';
        })->addColumn('btn-destroy',function($combo){
            return '<button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="'.route('B_combo.destroy',$combo->combo_id).'"><i class="notika-icon notika-close"></i> Xóa</button>';
        })->addColumn('btn-details',function($combo){
            return '<button type="button" class="btn btn-danger danger-icon-notika btn-details" data-toggle="modal" data-target="#ModalDetails" data-url="'.route('B_combo.showDetails',$combo->combo_id).'"><i class="notika-icon notika-close"></i>Chi tiết</button>';})
        ->addColumn('image',function($combo){
                return '<img src="images/Combo/'.$combo->image.'"  width = 70px height = 70px>';})
                    
            ->rawColumns(['btn-edit','btn-destroy','btn-details','image'])->make(true);
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
    public function store(AddComboRequest $request)
    {
        if($request->hasfile('Image_Add')) 
        { 
                $file = $request->file('Image_Add');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().'.'.$extension;
                $file->move('images/background/', $filename);

                $price = 0;
                $details = $request->Details_Add;
                $quantity = explode(',',$request->Quantity_Add);
                
                foreach($quantity as $value)
                    if(!is_numeric($value))
                        return redirect()->back()->with('error',"Trường số lượng , bạn nhập không phải số ");


                if(count($details) != count($quantity))
                    return redirect()->back()->with('error','Sản phẩm và số lượng không khớp nhau');
                
                foreach($details as $key=>$value)
                {
                    $money = DB::table('menu')->select('price')->where('menu_id','=',$value)->value('price'); 
                    $price += $money;
                }
                
                $combo = new M_Combo;
                $combo->name = $request->Name_Add;
                $combo->discount = $request->Discount_Add;
                $combo->type = $request->Type_Add;
                $combo->image = $filename;
                $combo->price = $price - (($price*($request->Discount_Add))/100);
                $combo->save();
                
                for ($i=0; $i <count($quantity); $i++) { 
                    $cb_details = new M_Combo_Details;
                    $cb_details->combos()->associate($combo);
                    $cb_details->menu_id = $details[$i];
                    $cb_details->quantity = $quantity[$i];
                    $cb_details->save();
                }
                return redirect()->back()->with('success','Bạn đã tạo Combo thành công !!!');

        }
        return redirect()->back()->with('error','Thất bại, hãy xem lại thông tin');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('combo')->join('combo_details','combo.combo_id','=','combo_details.combo_id')->join('menu','combo_details.menu_id','=','menu.menu_id')->select('combo.*','menu.menu_id as id_menu','combo_details.quantity')->where('combo.combo_id','=',$id)->get();
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
    public function showDetails($id)
    {      if( count(DB::table('combo')->where('combo_id','=',$id)->get())>=1)
            {
                $combo = DB::table('combo_details')->join('menu','combo_details.menu_id','=','menu.menu_id')->join('combo','combo.combo_id','=','combo_details.combo_id')->select('combo_details.*','menu.name as name_menu','menu.price as menu_price','menu.image as menu_image','combo.name as name_combo')->where('combo_details.combo_id','=',$id)->get();
                if(count($combo)>=1)
                return view('Admin.Details',compact('combo'));
                    return "Đơn này không có sản phẩm đặt trước";
            }
            return "Đã có lỗi xảy ra ";
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComboRequest $request, $id)
    {
        
    }
    public function Update2(Request $request)
    {
        $id = $request->Id;
        if(count(DB::table('combo')->where('combo_id','=',$request->Id)->get())>=1)
        {
           if($request->Image == null || $request->Image == "")
           {
            $price = 0;
            $details = $request->Details;
            $quantity = explode(',',$request->Quantity);

            foreach($quantity as $value)
                if(!is_numeric($value))
                return redirect()->back()->with('error','Trường số lượng bạn nhập không phải số');


            if(count($details) != count($quantity))
            return redirect()->back()->with('error','số lượng và sản phẩm không trùng khớp với nhau');

            $id_details = DB::table('combo')->join('combo_details','combo.combo_id','=','combo_details.combo_id')->select('combo_details.id')->where('combo.combo_id','=',$id)->get();

            foreach($details as $key=>$value)
            {
                $money = DB::table('menu')->select('price')->where('menu_id','=',$value)->value('price'); 
                $price += $money;
            }
            $data = [
                'name' => $request->Name,
                'discount' =>$request->Discount,
                'type' => $request->Type,
                'price' =>($price - (($price*($request->Discount))/100))

            ];
            $combo = DB::table('combo')->where('combo_id','=',$id)->update($data);
            
            
            // for ($i=0; $i <count($quantity); $i++) 
            // { 
            //     DB::table('combo_details')->where('id','=',$id_details[$i]->id)->update(['menu_id'=>$details[$i],'quantity'=>$quantity[$i]]);                     
            // }
            
            DB::table('combo_details')->where('combo_id','=',$id)->delete();
            
            for ($i=0; $i <count($quantity); $i++) 
            { 
                $cb_details = new M_Combo_Details;
                $cb_details->combos()->associate($combo);
                $cb_details->menu_id = $details[$i];
                $cb_details->quantity = $quantity[$i];
                $cb_details->save();
            }
                return redirect()->back()->with('success','Cập nhật thành công');
           }
           else 
           {
                if($request->hasfile('Image')) 
                { 
                $file = $request->file('Image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().'.'.$extension;
                $file->move('images/Combo/', $filename);
                //return $filename; 

                $price = 0;
                $details = $request->Details;
                $quantity = explode(',',$request->Quantity);

                foreach($quantity as $value)
                    if(!is_numeric($value))
                    return redirect()->back()->with('error','Trường số lượng bạn nhập không phải số');


                if(count($details) != count($quantity))
                return redirect()->back()->with('error','số lượng và sản phẩm không trùng khớp với nhau');

                $id_details = DB::table('combo')->join('combo_details','combo.combo_id','=','combo_details.combo_id')->select('combo_details.id')->where('combo.combo_id','=',$id)->get();

                foreach($details as $key=>$value)
                {
                    $money = DB::table('menu')->select('price')->where('menu_id','=',$value)->value('price'); 
                    $price += $money;
                }
                $data = [
                    'name' => $request->Name,
                    'discount' =>$request->Discount,
                    'type' => $request->Type,
                    'image' =>$filename,
                    'price' =>($price - (($price*($request->Discount))/100))

                ];
                $combo = DB::table('combo')->where('combo_id','=',$id)->update($data);
                
                
                // for ($i=0; $i <count($quantity); $i++) 
                // { 
                //     DB::table('combo_details')->where('id','=',$id_details[$i]->id)->update(['menu_id'=>$details[$i],'quantity'=>$quantity[$i]]);                     
                // }
                
                DB::table('combo_details')->where('combo_id','=',$id)->delete();
                
                for ($i=0; $i <count($quantity); $i++) { 
                    $cb_details = new M_Combo_Details;
                    $cb_details->combos()->associate($combo);
                    $cb_details->menu_id = $details[$i];
                    $cb_details->quantity = $quantity[$i];
                $cb_details->save();
                }
                    return redirect()->back()->with('success','Cập nhật thành công');
                }
           }
        }
        
            return redirect()->back()->with('error','Cập nhật thất bại, hãy xem lại thông tin !');
        
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $combo = DB::table('combo')->where('combo_id','=',$id)->get();
        if(count($combo)>=1)
        {
            DB::table('combo_details')->where('combo_id','=',$id)->delete();
            DB::table('combo')->where('combo_id','=',$id)->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
