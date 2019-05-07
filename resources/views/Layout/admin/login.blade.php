<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
        <link rel="shortcut icon" type="./public/admin/image/x-icon" href="{{URL::asset('public/admin/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="{{URL::asset('public/css/font.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap.min.css') }}">
    <!-- font awesome CSS font-awesome.min
		============================================ -->
    <link rel="stylesheet" href="href="{{ URL::asset('public/admin/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/animate.css')}}">
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- wave CSS
		============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/wave/waves.min.css')}}">
    <!-- Notika icon CSS
		============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/notika-custom-icon.css')}}">
    <!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/main.css')}}">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/style.css')}}">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="{{URL::asset('public/admin/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{ URL::asset('public/js/jquerynew.min.js') }}"></script>
 
</head>
<body>

    @yield('body')

    <script src="{{URL::asset('public/admin/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/jquery-price-slider.js')}}"></script>
     <!-- owl.carousel JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/owl.carousel.min.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/meanmenu/jquery.meanmenu.js')}}"></script>
         <!-- counterup JS
		============================================ -->
    <script src="{{URL::asset('public/admin/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::asset('public/admin/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{URL::asset('public/admin/js/counterup/counterup-active.js')}}"></script>
        <!-- mCustomScrollbar JS
            ============================================ -->
    <script src="{{URL::asset('public/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <!-- sparkline JS
            ============================================ -->
    <script src="{{URL::asset('public/admin/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{URL::asset('public/admin/js/sparkline/sparkline-active.js')}}"></script>
        <!-- flot JS jquery.flot.js jquery.flot.resize.js flot-active.js
            ============================================ -->
        <script src="{{ URL::asset('public/admin/js/flot/jquery.flot.js') }}"></script>
        <script src="{{ URL::asset('public/admin/js/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ URL::asset('public/admin/js/flot/flot-active.js') }}"></script>
        <!-- knob JS
            ============================================ -->
            <script src="{{URL::asset('public/admin/js/knob/jquery.knob.js')}}"></script>
            <script src="{{URL::asset('public/admin/js/knob/jquery.appear.js')}}"></script>
            <script src="{{URL::asset('public/admin/js/knob/knob-active.js')}}"></script>
        <!--  Chat JS
            ============================================ -->
        
        <!--  wave JS
            ============================================ -->
            <script src="{{URL::asset('public/admin/js/wave/waves.min.js')}}"></script>
            <script src="{{URL::asset('public/admin/js/wave/wave-active.js')}}"></script>
        <!-- icheck JS   js/icheck/icheck.min.js  js/icheck/icheck-active.js
            ============================================ -->
        <script src="{{URL::asset('public/admin/js/icheck/icheck.min.js')}}"></script>
        <script src="{{URL::asset('public/admin/js/icheck/icheck-active.js')}}"></script>           
            <!--  todo JS
                ============================================ -->
            <script src="{{URL::asset('public/admin/js/todo/jquery.todo.js')}}"></script>
        <!-- Login JS   js/login/login-action.js
            ============================================ -->
        <script src="{{URL::asset('public/admin/js/login/login-action.js')}}"></script>
        <!-- plugins JS
            ============================================ -->
            <script src="{{URL::asset('public/admin/js/plugins.js')}}"></script>
        <!-- main JS
            ============================================ -->
            <script src="{{URL::asset('public/admin/js/main.js')}}"></script>
</body>
