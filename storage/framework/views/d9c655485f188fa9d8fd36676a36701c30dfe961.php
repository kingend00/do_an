<?php $__env->startSection('title'); ?>
Quản trị

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
	
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
                            echo "<h4>Không có đơn đặt bàn nào trong hôm nay</h4>";
                        }
                       // echo date('Y-m-d',time());
                    ?>
                     <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <?php
                        $data = \App\Model\M_Menu::where('category_id','5')->get();
                        echo "<p><strong>Tổng số :</strong>".count($data)." Đồ uống trong thực đơn</p>";
                    ?>
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <?php
                        $data = \App\Model\M_Menu::whereIn('category_id',['1','2','3','4'])->get();
                        echo "<p><strong>Tổng số :</strong>".count($data)." Món ăn trong thực đơn</p>"
                    ?>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <?php
                        $data = \App\User::where('roles','4')->get();
                        echo "<p><strong>Tổng số :</strong> tài khoản khách hàng : ".count($data)." khách hàng</p>";
                    ?>
                     <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>