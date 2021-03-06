<?php

namespace App\Http\Controllers\User;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\PusherEvent;
use Hash;

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
    public function demoPusher1(){
        return view("demo-pusher");
    }
    public function demoPusher2(){
        event(new PusherEvent());
        
    }
    // 
    public function resetPassword(Request $request)
    {
        $request->validate([
            're_new_pass' => 'required|min:8',
            'new_pass' => 'required|min:8',
            'old_pass' => 'required',
            'email' => 'required|email'

        ],[],
        ['re_new_pass'=>'Mật khẩu nhập lại','new_pass'=>'Mật khẩu mới','old_pass' => 'Mật khẩu cũ']);
        if($request->re_new_pass != $request->new_pass)
         return redirect()->back()->with('error','2 mật khẩu không trùng khớp');
         
        $old_pass = bcrypt($request->input('old_pass'));
        $user = DB::table('users')->select('password')->where('email','=',$request->email)->value('password');
        if(!(Hash::check($request->input('old_pass'), $user)))
        {
            return redirect()->back()->with('error','Mật khẩu không đúng');
        }
        else {
            $update = DB::table('users')->where('email','=',$request->email)->update(['password'=>bcrypt($request->input('new_pass'))]);
            return redirect()->back()->with('success','Đổi mật khẩu thành công');
        }

    }
    public function update(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Phone' => 'required|numeric',
            'Email' => 'required|email'

        ],[],
        ['Name'=>'Tên chủ khoản','Phone'=>'Số điện thoại','Email' => 'Email']);
       if(count(DB::table('users')->where('user_id','=',$request->Update_Id)->get()) != 0)
       {
                $data = [
                    'name' => $request->Name,
                    'address' => $request->Address,
                    'phone' => $request->Phone];
            
            $update = DB::table('users')->where('user_id','=',$request->Update_Id)->update($data);
            return redirect()->back()->with('success','Cập nhật tài khoản thành công');
       }
       else
        return redirect()->back()->with('error','Tài khoản không tồn tại');

    }

}
