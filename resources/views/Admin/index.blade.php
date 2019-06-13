@extends('Layout.admin.master')
@section('title')
Quản trị

@stop
@section('body')
	
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <?php
                     date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $data = \App\Model\M_Booktable::where('date','=',date('Y-m-d',time()))->get();
                        if(count($data)>0)
                        {
                           echo "<h4> Hôm nay có ".count($data)." đơn đặt bàn</h4>";

                        }else {
                            echo "<h3>Không có đơn đặt bàn nào</h3>";
                        }
                       // echo date('Y-m-d',time());
                    ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <?php
                        $data = \App\Model\M_Menu::where('category_id','5')->get();
                        echo "<h4> Tổng số ".count($data)." Đồ uống trong thực đơn</h4>";
                    ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <?php
                        $data = \App\Model\M_Menu::whereIn('category_id',['1','2','3','4'])->get();
                        echo "<h4>Tổng số ".count($data)." Món ăn trong thực đơn</h4>"
                    ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <?php
                        $data = \App\User::where('roles','4')->get();
                        echo "<h4>Tổng số tài khoản khách hàng : ".count($data)." khách hàng</h4>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

@stop