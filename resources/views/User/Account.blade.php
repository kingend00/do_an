@if (Auth::check()&&Auth::user()->roles==4)
@extends('Layout.admin.login')

@section('title')
    Tài khoản
@stop

@section('body')
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                <a href="{{ route('index') }}"><img src="{{URL::asset('/images/logo/logo1.png')}}" alt="" width="80" height="80" /></a>
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

    @if(Auth::check())
<div class="container">
    <div class="row">
        <div class="col-lg-5" id="formData" style="margin-top:30px">
            {!! Form::open(['id'=>'form_update','route'=>'F_user.update','method'=>'POST'])!!}                     
               
                    @include('Layout.user.error')
                  

                   {!! Form::hidden('Update_Id',Auth::user()->user_id,['id' =>'Update_Id','class' => 'form-group','placeholder' => 'Enter here', 'required' => 'true','readonly' => 'true']) !!}
               

                   <div class="form-group">
                       <div class="nk-int-st">{!! Form::label('Email','Email',['class' => 'control-label']) !!}</div>
                               <div class="nk-int-st">
                               {!! Form::text('Email',Auth::user()->email,['id' =>'Email','class' => 'form-control','placeholder' => 'Enter here','required' => 'true','readonly'=>'true']) !!}
                               
                            </div>
                   </div>
                   <div class="nk-int-st">{!! Form::label('Email','Địa chỉ',['class' => 'control-label']) !!}</div>                        
                   <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="nk-int-st">
                                <textarea name="Address" id="Address" class="form-control" rows="5" placeholder=" Nhập địa chỉ" >{{ Auth::user()->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   <div class="form-group">
                           <div class="nk-int-st">{!! Form::label('Email','Tên chủ khoản',['class' => 'control-label']) !!}</div>
                                   <div class="nk-int-st">
                                           {!! Form::text('Name',Auth::user()->name,['id' =>'Name','class' => 'form-control','placeholder' => 'Nhập tên chủ khoản', 'required' => 'true']) !!}
                                   </div>
                   </div>
                   
                   <div class="form-group">
                           <div class="nk-int-st">{!! Form::label('Email','Số điện thoại',['class' => 'control-label']) !!}</div>
                                   <div class="nk-int-st">
                                           {!! Form::text('Phone',Auth::user()->phone,['id' =>'Phone','class' => 'form-control','placeholder' => 'Nhập Số điện thoại', 'required' => 'true']) !!}
                                   </div>
                   </div>                                      
                    <button class="btn notika-btn-cyan btn-submit" type="submit" >Sửa thông tin</button>  
                    

               
               
                       
   
   {!! Form::close() !!}
        </div>
        <div class="col-lg-2">

        </div>
        <div class="col-lg-5">
             
        </div>

    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-12">
            <h1>Lịch sử đặt bàn</h1>
                @if (isset($query))
                <div class="table-responsive">
                    <table  class="table table-striped" id="tbData">
                        <thead>
                            <th>Số đơn bàn</th>
                            <th>Số bàn</th>
                            <th>Ngày đặt</th>
                            <th>Thời gian đặt</th>
                            <th> Tổng tiền</th>
                        </thead>
                        <tbody>
                            @foreach ($query as $item)
                                <tr>
                                <td>{{ $item->booktable_id }}</td>
                                <td>  {{ $item->number_seat }}</td>
                                <td>  {{ $item->date }}</td>
                                <td>  {{ $item->time }}</td>
                                <td>  {{ $item->total }}</td>
                                </tr>
                            @endforeach 
                        </tbody>      
                    </table>
                </div>
                @else
                    <h3>Quý khách chưa đặt đơn nào tại cửa hàng chúng tôi !</h3> 
                @endif
        </div>
    </div>

</div>
    @endif
<script type = "text/javascript">
    $(document).ready(function(){
        $("#tbData").DataTable();
    });
</script>
@stop
@else
    <h1>404 Not Found</h1>
@endif