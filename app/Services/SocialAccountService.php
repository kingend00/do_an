<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Model\SocialAccount;
use App\User;
use Mail;
use Illuminate\Support\Str;

class SocialAccountService
{
    public static $check = 0;
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $random = Str::random(18);
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = User::whereEmail($email)->first();

            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => bcrypt($random),
                ]);
                $account->user_id = $user->user_id;
            }

            $account->user()->associate($user);
            $account->save();
            
            //kiểm tra nếu đăng nhập fb lần đầu , hiện thông báo : đã gửi mật khẩu lần đầu !
            self::$check = 1;

            Mail::send('auth.sendFirstPass', [ 'content' => 'Email : ' . $email.',Mật khẩu lần đầu: '.$random ], function ($message) use ($email) {
                $message->to($email);
            });
            return $user;
        }
    }
}
?>