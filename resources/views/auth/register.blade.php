@extends('Layout.admin.login')
@section('title')
    Đăng kí
@stop
@section('body')

<div class="login-content">
        <div class="nk-block toggled" id="l-login">
                <form  method="post" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="nk-form">
                               
                                <div class="input-group mg-t-15{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                        <div class="nk-int-st">
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder='Email' requiredfocus >
        
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                                        <div class="nk-int-st">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder='Tên chủ khoản' required >
        
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-phone"></i></span>
                                            <div class="nk-int-st">
                                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder='Số điện thoại' required >
            
                                                    @if ($errors->has('phone'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                        </div>
                                <div class="input-group mg-t-15{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                    <div class="nk-int-st">
                                            <input id="password" type="password" class="form-control" name="password" placeholder='Mật khẩu' required>
    
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="input-group mg-t-15">
                                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                    <div class="nk-int-st">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder='Nhập lại mật khẩu' required>

                                    </div>
                                </div>
                                
                                <div class="fm-checkbox">
                
                                    <button type="submit" >Đăng kí</button>
                                </div>
    
                                <a href="#l-register" data-ma-action="nk-login-switch" data-ma-block="#l-register" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></a>
                            </div>
                
                            <div class="nk-navigation nk-lg-ic">
                                <a href="{{ route('login') }}" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Sign In</span></a>
                                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                            </div>
                </form>
            </div>
        </div>
        
@endsection
