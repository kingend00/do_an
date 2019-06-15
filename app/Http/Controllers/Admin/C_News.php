<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class C_News extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.News');
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
            'Title'=>'required|string',
            'Image' => 'required|file',
            'Content' =>'required|max:255'
        ],
        [],
        ['Title'=>'Tiêu đề','Image'=>'Ảnh','Content' => 'Nội dung']);
        if(count(DB::table('news')->where('title','=',$request->Title)->get())!= 0)
        {
            return redirect()->back()->with('error',"Sự kiện này đã tồn tại");
        }
        if($request->hasfile('Image')) 
        {
                $file = $request->file('Image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().'.'.$extension;
                $file->move('images/background/', $filename); 
                $data = [
                    'title'=>$request->Title,
                    'image' => $filename,
                    'content' => $request->Content];
                DB::table('news')->insert($data);
                return redirect()->back()->with('success','Thêm thành công');
        }
        
        return redirect()->back()->with('error','Thất bại, vui lòng kiểm tra lại thông tin');
    }
    public function getDataNews(){      
        $news = DB::table('news')->get();
        return Datatables::of($news)->addColumn('btn-edit',function($news){
            return '<button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="'.route('B_news.show',$news->news_id).'"><i class = "glyphicon glyphicon-cog"></i> Sửa/Xem</button>';
        })->addColumn('btn-destroy',function($news){
            return '<button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="'.route('B_news.destroy',$news->news_id).'"><i class="notika-icon notika-close"></i> Xóa</button>';
        })->addColumn('image',function($news){
            return '<img src="images/background/'.$news->image.'" width = 70px height = 70px>';})->rawColumns(['btn-edit','btn-destroy','image'])->make(true);
    }
    public function UpdateNews(Request $request)
    {
        $request->validate([
            'Title'=>'required|string',
            
            'Content' =>'required|max:255'
        ],
        [],
        ['Title'=>'Tiêu đề','Content' => 'Nội dung']);
        if($request->Image == "" || $request->Image == null)
        {
            $data = [
                'title'=>$request->Title,
                'content' => $request->Content];
            DB::table('news')->where('news_id','=',$request->Id)->update($data);
            return redirect()->back()->with('success','Cập nhật thành công');
        }
        else {
            if($request->hasfile('Image')) 
            {                  
                        $file = $request->file('Image');
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename =time().'.'.$extension;
                        $file->move('images/background/', $filename); 
                        $data = [
                            'title'=>$request->Title,
                            'image' => $filename,
                            'content' => $request->Content];
                        DB::table('news')->where('news_id','=',$request->Id)->update($data);
                        return redirect()->back()->with('success','Cập nhật thành công');
                    
            }
            else
            return redirect()->back()->with('error','Trường ảnh không phải định dạng ảnh'); 
        }
        
            return redirect()->back()->with('error','Đã có lôi xảy ra vui lòng kiểm tra lại thông tin');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('news')->where('news_id','=',$id)->get();
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
        $seat = DB::table('news')->where('news_id','=',$id)->get();
        if(count($seat) != 0 )
        {
            $seat = DB::table('news')->where('news_id','=',$id)->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
