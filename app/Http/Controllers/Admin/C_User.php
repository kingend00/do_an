<?php

namespace App\Http\Controllers\Admin;
use DB;
use User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
class C_User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if(DB::table('users')->where('email','=',$request->input('email'))->exists())
       {
            echo " null";
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
           return redirect()->back();
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
        
             $dk = DB::table('users')->where('user_id','=',$id)->get();
             if ($dk == null) {
                 echo "null";
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
                         ['password'=>$request->input('Password'),
                         'name' => $request->input('Name'),
                         'phone' =>$request->input('Phone'),
                         'address' => $request->input('Address')]
                     );
                 }
 
             }
             return response()->json('Successfully');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = User::findOrFail($id);
        if($account)
        {
            $account->delete();
            return 'Bạn đã xóa thành công';
        }
        return 'Đã xảy ra lỗi';
    }
}
