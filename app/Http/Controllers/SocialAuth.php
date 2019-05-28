<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;


class SocialAuth extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->stateless()->user(), $social);
        auth()->login($user);
        if(SocialAccountService::$check == 1)
        {
           
            return redirect()->route('index')->with('success','Website đã gửi vào mail cho bạn mật khẩu lần đầu,vui lòng kiểm tra !');

        }
        else {
            return redirect()->route('index');
        }

    }
}
