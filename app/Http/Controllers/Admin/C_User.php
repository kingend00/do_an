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
            $data = DB::table('users')->where('roles',$role)->get();
            return view('Admin.Account_Man',compact('data'));
        }
        if ($role == 3) {
            $data = DB::table('users')->where('roles',$role)->get();
            return view('Admin.Account_Emp',compact('data'));
        }
        if ($role == 4) {
            $data = DB::table('users')->where('roles',$role)->get();
            return view('Admin.Account_Cus',compact('data'));
        }
        else {
            return view('Admin.index');
        }
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
        if(DB::table('users')->where('email','=',$request->input('Email'))->exists())
       {
            return redirect()->back()->with('error','Tài khoản đã tồn tại');
       }
       else
       {
        if($request->has('Address'))
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
    public function update(UpdateUserRequest $request, $id)
    {             
        
             $dk = DB::table('users')->where('user_id','=',$id)->get();
             if ($dk == null) {
                return response()->json('Tài khoản chưa tồn tại');
             }
             else
             {
                 $data = $dk[0]->roles;
                 if($data == 4)
                 {
                     $AccountEmp = DB::table('users')->where('user_id','=',$id)->update(['password'=> $request->input('resetPassword')]);

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
