<?php

namespace App\Http\Controllers\User;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class C_User extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function showAccount()
    {
        $money = 0;
       // $data = DB::table('booktable')->join('booktable_details','booktable.booktable_id','=','booktable_details.booktable_id')->where('email','=',Auth::user()->email)->get();
        $point = DB::table('users')->select('point')->where('email','=',Auth::user()->email)->value('point');
        return view('User.Account',compact('query','point'));
        
    }
    public function update(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Phone' => 'required|numeric',
            'Update_Id' => 'required',
            'Email' => 'required|email'

        ]);
       if(DB::table('users')->where('user_id','=',$request->Update_Id)->get())
       {
            if($request->Password == '' || $request->Password == null)
            {
                    
                $data = [
                    'name' => $request->Name,
                    'address' => $request->Address,
                    'phone' => $request->Phone

                ];
            }
            else {
                $data = [
                    'name' => $request->Name,
                    'password' => bcrypt($request->Password),
                    'address' => $request->Address,
                    'phone' => $request->Phone];
            }
            $update = DB::table('users')->where('user_id','=',$request->Update_Id)->update($data);
            return redirect()->back()->with('success','Cập nhật tài khoản thành công');
       }
       else
        return redirect()->back()->with('error','Tài khoản không tồn tại');

    }

}
