@if (Auth::check()&&Auth::user()->roles==4)
@extends('Layout.admin.login')

@section('title')
    Đổi mật khẩu
@stop
@section('body')
<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                    <a href="{{ route('index') }}"><img src="{{URL::asset('/images/logo/logo2.png')}}" width="100" height="100" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">                      
                                         
                            <li class="nav-item">
                                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="nav navbar-nav">
                                        &nbsp;
                                    </ul>
                
                                    <!-- Right Side Of Navbar -->
                                    <ul class="nav navbar-nav navbar-right">
                                        <!-- Authentication Links -->
                                        @guest
                                            <li><a href="{{ route('login') }}">ĐĂNG NHẬP</a></li>
                                            <li><a href="{{ route('register') }}">ĐĂNG KÍ</a></li>
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                            Đăng xuất
                                                        </a>
                
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="login-content" style="margin-top:-100px;padding-right:200px">
    <div class="nk-block toggled" id="l-login">
            <form  method="POST" action="{{ route('F_user.reset') }}">
                    {{ csrf_field() }}
                    <div class="nk-form">
                            <div class="input-group mg-t-15{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                    <div class="nk-int-st">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required readonly>
                                    </div>
                                </div>
                            <div class="input-group mg-t-15{{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                <div class="nk-int-st">
                                        <input id="old_pass" type="password" class="form-control" name="old_pass" value="{{ old('email') }}" placeholder="Mật khẩu cũ" required autofocus>
                                </div>
                            </div>
                            <div class="input-group mg-t-15{{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                <div class="nk-int-st">
                                        <input id="new_pass" type="password" class="form-control" name="new_pass" placeholder="Mật khẩu mới" minlength="8" required>

                                        
                                </div>
                            </div>
                            <div class="input-group mg-t-15{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                    <div class="nk-int-st">
                                            <input id="re_new_pass" type="password" class="form-control" name="re_new_pass" minlength="8" placeholder="Nhập lại mật khẩu mới" required>
    
                                            
                                    </div>
                            </div>
                            <div class="fm-checkbox">
                               
                                <button type="submit" class="btn btn-success notika-btn-success" >Đăng nhập</button>
                            </div>
                           

                             </div>
            </form>
    </div>

</div>

@stop
@else
    <h1>404 Not Found</h1>
@endif