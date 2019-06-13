<!DOCTYPE html>
<html class="no-js">
<head>
	<title><?php echo $__env->yieldContent('title','Title'); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="./public/admin/image/x-icon" href="<?php echo e(URL::asset('/images/logo/logo1.png')); ?>">
    <!-- Google Fonts
		============================================ -->
    <link href="<?php echo e(URL::asset('public/css/font.css')); ?>" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/bootstrap.min.css')); ?>">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/font-awesome.min.css')); ?>">
    <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/datapicker/datepicker3.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/owl.theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/owl.transitions.css')); ?>">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/meanmenu/meanmenu.min.css')); ?>">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/animate.css')); ?>">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/normalize.css')); ?>">
    <!-- mCustomScrollbar CSS
    
        ============================================ -->
    
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/bootstrap-select/bootstrap-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/summernote/summernote.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/themesaller-forms.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/dropzone/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/scrollbar/jquery.mCustomScrollbar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/jquery.dataTables.min.css')); ?>">
    <!-- Color Picker CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/color-picker/farbtastic.css')); ?>">
    <!-- main CSS
		============================================ -->
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/notification/notification.css')); ?>">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/jvectormap/jquery-jvectormap-2.0.3.css')); ?>">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/notika-custom-icon.css')); ?>">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/wave/waves.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/wave/button.css')); ?>">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/main.css')); ?>">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/style.css')); ?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/dialog/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/dialog/dialog.css')); ?>">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/vendor/modernizr-2.8.3.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/js/jquerynew.min.js')); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('/public/showTable/TimeTable.css')); ?>">
    <script src="<?php echo e(URL::asset('/public/js/pusher.min.js')); ?>"></script>   
    
</head>
<body>
	<!-- Start Header Top Area -->
	<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                    <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(URL::asset('images/logo/logo2.png')); ?>" alt="" / width=70px height = 80px></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Thông báo</h2>
                                    </div>
                                    <div class="hd-message-info">
                                            <h3>Không có thông báo mới</h3>                    
                                    </div>
                                    <div class="hd-mg-va">
                                            <a href="#" style="font-size:30px" id="seen">Đã xem</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><div class="spinner4 spinner-4" ></div><div class="ntd-ctn" style="color:white"><span class="hihi">0</span></div>
                            </li>
                            <li class="nav-item">
                                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                    <!-- Left Side Of Navbar -->
                
                                    <!-- Right Side Of Navbar -->
                                    <ul class="nav navbar-nav navbar-right">
                                        <!-- Authentication Links -->
                                        <?php if(auth()->guard()->guest()): ?>
                                            <li><a href="<?php echo e(route('login')); ?>">Đăng nhập</a></li>
                                            <li><a href="<?php echo e(route('register')); ?>">Đăng kí</a></li>
                                        <?php else: ?>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu">
                                                        
                                                         <div class="dropdown-trig-sgn">
                                                            <a href="<?php echo e(route('logout')); ?>"
                                                                onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                            <button class="btn triger-fadeIn" >Đăng xuất</button>
                                                                
                                                            </a>
                                                        </div> 
                                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                                <?php echo e(csrf_field()); ?>

                                                            </form>
                                                        
                                                    </div>                                            
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
     <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a  href="<?php echo e(route('B_user.index')); ?>"><i class="notika-icon notika-house"></i> Trang chủ</a>
                                </li>
                                <li><a href="<?php echo e(route('B_booktable.index')); ?>"><i class="notika-icon notika-app"></i> Đơn đặt bàn</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Tài Khoản</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('B_user.showAccount',3)); ?>">Nhân viên</a>
                                        </li>
                                        <li><a href="<?php echo e(route('B_user.showAccount',4)); ?>">Khách hàng</a>
                                        </li>
                                    <?php if(Auth::check()&&Auth::user()->roles==1): ?>
                                        <li><a href="<?php echo e(route('B_user.showAccount',2)); ?>">Quản lý</a>
                                        </li>
                                    <?php endif; ?>
                                    </ul>
                                </li>
                                <li><a data-toggle="tab" href="#democrou"><i class="notika-icon notika-edit"></i> Bàn</a>
                                    
                                   <ul id="democrou" class="collapse dropdown-header-top">
                                    <?php $__currentLoopData = \App\Model\M_Seat::select('type')->distinct('type')->orderBy('type','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href = "<?php echo e(route('B_seat.showType',$item->type)); ?>">Loại <?php echo e($item->type); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href = "<?php echo e(route('B_seat.showType',"All")); ?>">Hiện tất cả</a></li>
                                   </ul>
                               
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Thực đơn</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <?php if(isset($nameMenushareAll)): ?>
                                        <?php $__currentLoopData = $nameMenushareAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href = "<?php echo e(route('B_menu.showMenu',$value->category_id)); ?>"><?php echo e($value->name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <li><a href = "<?php echo e(route('B_combo.index')); ?>">combo</a></li>
                                   </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Thống kê</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('B_statistic.index2')); ?>">Theo loại bàn</a>
                                        </li>
                                    <li><a href="<?php echo e(route('B_statistic.index')); ?>">Theo sản phẩm</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Khác</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('B_contact.index')); ?>">Phản hồi</a></li>
                                        <li><a href="<?php echo e(route('B_news.index')); ?>">Sự kiện</a></li>
                                        <!-- <li><a href="form-examples.html">Form Examples</a></li> -->
                                    </ul>
                                </li>
                               
                               
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li><a  href="<?php echo e(route('B_user.index')); ?>"><i class="notika-icon notika-house"></i> Trang chủ</a>
                        </li>
                        <li><a href="<?php echo e(route('B_booktable.index')); ?>"><i class="notika-icon notika-app"></i> Đơn đặt bàn</a>
                        </li>

                        <?php if(Auth::check()&& Auth::user()->roles <=2): ?>
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Tài khoản</a>
                        </li>
                        <li><a data-toggle="tab" href="#Home"><i class="notika-icon notika-edit"></i> Bàn</a>
                        </li>
                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Thực đơn</a>
                        </li>                       
                        <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Thống kê</a>
                        </li>
                        <li><a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> Khác </a>
                        </li>               
                        
                            
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <?php $__currentLoopData = \App\Model\M_Seat::select('type')->distinct('type')->orderBy('type','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href = "<?php echo e(route('B_seat.showType',$item->type)); ?>">Loại <?php echo e($item->type); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li><a href = "<?php echo e(route('B_seat.showType',"All")); ?>">Hiện tất cả</a></li>
                            </ul>
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo e(route('B_user.showAccount',3)); ?>">Nhân viên</a>
                                </li>
                                <li><a href="<?php echo e(route('B_user.showAccount',4)); ?>">Khách hàng</a>
                                </li>
                            <?php if(Auth::check()&&Auth::user()->roles==1): ?>
                                <li><a href="<?php echo e(route('B_user.showAccount',2)); ?>">Quản lý</a>
                                </li>
                            <?php endif; ?>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            
                        </div>
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                
                                <?php if(isset($nameMenushareAll)): ?>
                                    <?php $__currentLoopData = $nameMenushareAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href = "<?php echo e(route('B_menu.showMenu',$value->category_id)); ?>"><?php echo e($value->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <li><a href = "<?php echo e(route('B_combo.index')); ?>">combo</a></li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo e(route('B_statistic.index2')); ?>">Theo loại bàn</a>
                                </li>
                            <li><a href="<?php echo e(route('B_statistic.index')); ?>">Theo sản phẩm</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo e(route('B_contact.index')); ?>">Phản hồi</a></li>
                            <li><a href="<?php echo e(route('B_news.index')); ?>">Sự kiện</a></li>
                                <!-- <li><a href="form-examples.html">Form Examples</a>
                                </li> -->
                            </ul>
                        </div>
                        <div id="Appviews" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="notification.html">Notifications</a>
                                </li>
                                <li><a href="alert.html">Alerts</a>
                                </li>
                                <li><a href="modals.html">Modals</a>
                                </li>
                                <li><a href="buttons.html">Buttons</a>
                                </li>
                                <li><a href="tabs.html">Tabs</a>
                                </li>
                                <li><a href="accordion.html">Accordion</a>
                                </li>
                                <li><a href="dialog.html">Dialogs</a>
                                </li>
                                <li><a href="popovers.html">Popovers</a>
                                </li>
                                <li><a href="tooltips.html">Tooltips</a>
                                </li>
                                <li><a href="dropdown.html">Dropdowns</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="contact.html">Contact</a>
                                </li>
                                <li><a href="invoice.html">Invoice</a>
                                </li>
                                <li><a href="typography.html">Typography</a>
                                </li>
                                <li><a href="color.html">Color</a>
                                </li>
                                <li><a href="login-register.html">Login Register</a>
                                </li>
                                <li><a href="404.html">404 Page</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->

    
        <?php if(isset($errors) && count($errors) > 0): ?>
         <div class="alert alert-danger error-alert">           
                        <h2>Đã có lỗi xảy ra </h2>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      
        </div>
        <?php endif; ?>

        <?php if(Session::has('error')): ?> 
            <div class="alert alert-danger error-alert">
                <?php echo e(Session::get('error')); ?>

            </div>       
        <?php endif; ?>
        <?php if(Session::has('success')): ?> 
            <div class="alert alert-success error-alert">
                <?php echo e(Session::get('success')); ?>

            </div>       
        <?php endif; ?>
    
	<?php echo $__env->yieldContent('body'); ?>




	<div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
        ============================================ -->
    
    <script type="text/javascript" src="<?php echo e(URL::asset('/public/showTable/createjs.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('/public/showTable/TimeTable.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/bootstrap.min.js')); ?>"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/wow.min.js')); ?>"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/jquery-price-slider.js')); ?>"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/owl.carousel.min.js')); ?>"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/jquery.scrollUp.min.js')); ?>"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/meanmenu/jquery.meanmenu.js')); ?>"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/counterup/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/counterup/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/counterup/counterup-active.js')); ?>"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <!-- jvectormap JS
        ============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/datapicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/datapicker/datepicker-active.js')); ?>"></script>

    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/sparkline/sparkline-active.js')); ?>"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/flot/jquery.flot.js')); ?>"></script>
    
    

     
   
    <script src="<?php echo e(URL::asset('public/admin/js/flot/curvedLines.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/flot/flot-active.js')); ?>"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/knob/jquery.knob.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/knob/jquery.appear.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/knob/knob-active.js')); ?>"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/wave/waves.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/wave/wave-active.js')); ?>"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/todo/jquery.todo.js')); ?>"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/bootstrap-select/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/plugins.js')); ?>"></script>
     <!--  notification JS
		============================================ -->
        <script src="<?php echo e(URL::asset('public/admin/js/notification/bootstrap-growl.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/admin/js/notification/notification-active.js')); ?>"></script>
        <!--  summernote JS
            ============================================ -->
        <script src="<?php echo e(URL::asset('public/admin/js/summernote/summernote-updated.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('public/admin/js/summernote/summernote-active.js')); ?>"></script>
        <!-- dropzone JS
            ============================================ -->
        <script src="<?php echo e(URL::asset('public/admin/js/dropzone/dropzone.js')); ?>"></script>
    
	<!--  Chat JS
        ============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/data-table/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/data-table/data-table-act.js')); ?>"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo e(URL::asset('public/admin/js/main.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('/public/js/myjs.js')); ?>"></script>
    
	<!-- tawk chat JS
		============================================ -->
   <script type="text/javascript">
       $('div.alert').delay(12000).fadeOut(100);
   </script>
   <script>
      
        $.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});


        var pusher = new Pusher('4009c42e7cd6daccc27a', {
                    cluster: 'ap1',
                    encrypted: true
                });
				
				
                //Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
        	var channel = pusher.subscribe('Hoang-channel');
			channel.bind('App\\Events\\PusherEvent',function(data){
                $('#tbData').DataTable().ajax.reload();
                ajaxLoadTable();
                if(data.message != 'false')
                {
                    var notifi = '';
                    var count = 0;
                    var liTag = "<li class='list-group-item'>"+data.message+"</li>";
                    var old_value = (localStorage.getItem('notifi') != null) ? localStorage.getItem('notifi') : '';
                    notifi += liTag;
                    notifi += old_value;            
                    localStorage.setItem('notifi',notifi);
                    $('.hd-message-info').html(localStorage.getItem('notifi'));
                    count = $('.hd-message-info li').length;	               
                    localStorage.setItem('count',count);               
                    $('.hihi').html(localStorage.getItem('count'));			    							
                    $('#seen').css('display','block');
                }
			});
            $('.hd-message-info').html(localStorage.getItem('notifi'));
			$('.hihi').html(localStorage.getItem('count'));
                

            $('#seen').click(function(){
                localStorage.setItem('count',0); 
                localStorage.setItem('notifi','');
                $('.hd-message-info').html('');
                $('.hihi').html(0);	
                $('#seen').css('display','none');
            });
			
       
   
   </script>
  
    
</body>
</html>