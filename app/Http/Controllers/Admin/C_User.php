<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\User;
use Auth;
use UserPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use Yajra\DataTables\Facades\DataTables;
class C_User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        //$this->middleware('denied_cus_emp');
    }

    public function index()
    {
        return view('Admin.index');
    }
    public function showAccount($role)
    {
        if ($role == 2) {
            
            return view('Admin.Account_Man');
        }
        if ($role == 3) {
            
            return view('Admin.Account_Emp');
        }
        if ($role == 4) {
            
            return view('Admin.Account_Cus');
        }
        else {
            return view('Admin.index');
        }
    }
    public function getData($roles)
    {
        $user = null;
        if($roles == 4)
            $user =  DB::table('users')->select('user_id','email','name','phone','point')->where('roles','=',$roles)->get();
        if($roles == 2 || $roles == 3)
            $user = DB::table('users')->select('user_id','email','name','phone','address')->where('roles','=',$roles)->get();
        
        return Datatables::of($user)->addColumn('btn-edit',function($user){
            return '<button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="'.route('B_user.show',$user->user_id).'"><i class = "glyphicon glyphicon-cog"></i> Sửa</button>';
        })->addColumn('btn-destroy',function($user){
            return '<button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="'.route('B_user.destroy',$user->user_id).'"><i class="notika-icon notika-close"></i> Xóa</button>';
        })->rawColumns(['btn-edit','btn-destroy'])->make(true);
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
    public function store(UserRequest $request)
    {
        $user = DB::table('users')->where('email','=',$request->input('Email'))->get();
        if(count($user)>=1)
        {
            return redirect()->back()->with('error','Tài khoản đã tồn tại');
        }
       else
       {
        if ($request->has('Roles')) {
            DB::table('users')->insert([
                 'password' => bcrypt($request->input('Password')),
                 'name' => $request->input('Name'),
                 'email' => $request->input('Email'), 
                 'address' => $request->input('Address'),
                 'roles' => 2,
                 'phone' => $request->input('Phone')

             ]);
        }
        elseif($request->has('Address'))
        {
                DB::table('users')->insert([
                    'password' => bcrypt($request->input('Password')),
                    'name' => $request->input('Name'),
                    'email' => $request->input('Email'), 
                    'address' => $request->input('Address'),
                    'roles' => 3,
                    'phone' => $request->input('Phone')

                ]);
        }
           else
           {
                DB::table('users')->insert([
                    'password' => bcrypt($request->input('Password')),
                    'name' => $request->input('Name'),
                    'email' => $request->input('Email'), 
                    'roles' => 4,
                    'phone' => $request->input('Phone')

                ]);
           }          
           return redirect()->back()->with('success','Bạn đã tạo tài khoản thành công');
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
        $data = DB::table('users')->where('user_id','=',$id)->get();
        if ($data) {
            return response()->json(['data'=>$data]);
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
        $request->validate([
            'Update_Password' => 'required|min:8',
            'Update_Address' => 'required',
            'Update_Name' => 'required',
            'Update_Email' => 'required|email',
            'Update_Phone' => 'required|numeric'

        ],[],
        ['Update_Password'=>'Mật khẩu','Update_Address'=>'Địa chỉ','Update_Name' => 'Tên tài khoản','Update_Email' =>'Email','Update_Phone' => 'Số điện thoại']);
             $dk = DB::table('users')->where('user_id','=',$id)->get();
             if ($dk == null) {
                return response()->json('Tài khoản chưa tồn tại');
             }
             else
             {
                 $data = $dk[0]->roles;
                 if($data == 4)
                 {
                     $AccountEmp = DB::table('users')->where('user_id','=',$id)->update(['password'=> bcrypt($request->input('resetPassword'))]);

                 }
                 if($data == 3 || $data == 2)
                 {
                     $AccountEmp = DB::table('users')->where('user_id','=',$id)->update(
                         ['password'=>bcrypt($request->input('Update_Password')),
                         'name' => $request->input('Update_Name'),
                         'phone' =>$request->input('Update_Phone'),
                         'address' => $request->input('Update_Address')]
                     );
                 }
 
             }
             return response()->json('Cập nhật thành công');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = DB::table('users')->where('user_id','=',$id)->get();
        if($account)
        {
            $account = DB::table('users')->where('user_id','=',$id)->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
