<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Welcome !!!')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{URL::asset('/public/user/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/fonts/themify/themify-icons.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/vendor/lightbox2/css/lightbox.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/public/user/css/main.css')}}">
	<script src="{{ URL::asset('public/js/jquerynew.min.js') }}"></script>

<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html">
							<img  src="{{ URL::asset('images/background/logodropdown.png') }}" alt="IMG-LOGO" data-logofixed="{{ URL::asset('images/background/logo.png') }}" width="200px" height="80px" >
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
								<a href="{{ route('index') }}">Trang chủ</a>
								</li>

								<li>
								<a href="{{ route("F_menu.index") }}">Thực đơn</a>
								</li>

								<li>
								<a href="{{ route('F_seat.index') }}">Đặt bàn</a>
								</li>

								<li>
									<a href="about.html">Giới thiệu</a>
								</li>

								<li>
									<a href="blog.html">Sự kiện</a>
								</li>

								<li>
									<a href="contact.html">Liên hệ</a>
								</li>
								<li>
									
										<!-- Authentication Links -->
										@guest
											<li><a href="{{ route('B_user.index') }}">Đăng nhập</a></li>
											<li><a href="{{ route('register') }}">Đăng kí</a></li>
										@else
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
													{{ Auth::user()->name }} <span class="caret"></span>
												</a>
				
												<div class="dropdown-menu">
													
														<a href="{{ route('logout') }}"
															onclick="event.preventDefault();
																	 document.getElementById('logout-form').submit();">
															Logout
														</a>
				
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
														</form>
													
												</div>
											</li>
										@endguest
									
								</li>
							</ul>
						</nav>
					</div>

					<!-- Social -->
					<div class="social flex-w flex-l-m p-r-20">
						<a data-toggle='dropdown' href="" class="dropdown">Giỏ hàng</a>
						<div class="dropdown-menu dropup">
					  				<span class="caret"></span>
						  			<ul class="media-list">
								  		<li class="media">							
										    <div class="media-body contentCart">
										      	@foreach (Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
													 {{$item->name}} <br>
												@endforeach
								    		</div>
								  		</li>
									</ul>
								<a href="{{ route('F_menu.showCart') }}"><button class="btn btn-primary btn-sm">Xem giỏ hàng</button></a>
						</div>
						<button class="btn-show-sidebar m-l-33 trans-0-4"></button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href="index.html" class="txt19">
				Trang chủ</a>
			</li>

			<li class="t-center m-b-13">
				<a href="menu.html" class="txt19">Thực đơn</a>
			</li>

			<li class="t-center m-b-13">
				<a href="about.html" class="txt19">Giới thiệu</a>
			</li>

			<li class="t-center m-b-13">
				<a href="blog.html" class="txt19">Sự kiện</a>
			</li>

			<li class="t-center m-b-33">
				<a href="contact.html" class="txt19">Liên hệ</a>
			</li>

			<li class="t-center">
				<!-- Button3 -->
				<a href="reservation.html" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Đặt bàn
				</a>
			</li>
		</ul>	
	</aside>
	


	@yield('body')
	@if(count($errors) > 0)
	<div class="alert alert-danger error-alert">           
				   <h2>Đã có lỗi xảy ra </h2>
				   <ul>
					   @foreach($errors->all() as $error)
						   <li>{{$error}}</li>
					   @endforeach
				   </ul>
				 
   </div>
   @endif

   @if (Session::has('error')) 
	   <div class="alert alert-danger error-alert">
		   {{ Session::get('error') }}
	   </div>       
   @endif
   @if (Session::has('success')) 
	   <div class="alert alert-success error-alert">
		   {{ Session::get('success') }}
	   </div>       
   @endif


	<footer class="bg1">
		<div class="container p-t-40 p-b-70">
			<div class="row">
				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-33">
						Liên hệ với chúng tôi !
					</h4>

					<ul class="m-b-70">
						<li class="txt14 m-b-14">
							<i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
							Towner <strong>Rogteam</strong>, số 198, Quận Hoàn Kiếm, Hà Nội
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
							(+84) 96 716 6879
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
							hoangx.rogteam@gmail.com
						</li>
					</ul>

					<!-- - -->
					<h4 class="txt13 m-b-32">
						Thời gian mở cửa
					</h4>

					<ul>
						<li class="txt14">
							09:30 AM – 11:00 PM
						</li>

						<li class="txt14">
							Tất cả các ngày trong tuần
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-33">
						Latest twitter
					</h4>

					<div class="m-b-25">
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
						<a href="#" class="txt15">
							@colorlib
						</a>

						<p class="txt14 m-b-18">
							Activello is a good option. It has a slider built into that displays the featured image in the slider.
							<a href="#" class="txt15">
								https://buff.ly/2zaSfAQ
							</a>
						</p>

						<span class="txt16">
							21 Dec 2017
						</span>
					</div>

					<div>
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
						<a href="#" class="txt15">
							@colorlib
						</a>

						<p class="txt14 m-b-18">
							Activello is a good option. It has a slider built into that displays
							<a href="#" class="txt15">
								https://buff.ly/2zaSfAQ
							</a>
						</p>

						<span class="txt16">
							21 Dec 2017
						</span>
					</div>
				</div>

				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-38">
						Gallery
					</h4>

					<!-- Gallery footer -->
					<div class="wrap-gallery-footer flex-w">
						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow1.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow2.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow3.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-04.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow4.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow5.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow6.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow7.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-08.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow8.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow9.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow10.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow11.jpg') }}" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-12.jpg" data-lightbox="gallery-footer">
							<img src="{{ URL::asset('images/background/slow12.jpg') }}" alt="GALLERY">
						</a>
					</div>

				</div>
			</div>
		</div>

		<div class="end-footer bg2">
			<div class="container">
				<div class="flex-sb-m flex-w p-t-22 p-b-22">
					<div class="p-t-5 p-b-5">
						<a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
					</div>

					<div class="txt17 p-r-20 p-t-5 p-b-5">
						Copyright &copy; 2018 All rights reserved  |  This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Hoàng X's</a>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<!-- <iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe> -->
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
});

</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/bootstrap/js/popper.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/daterangepicker/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/slick/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('/public/user/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/parallax100/parallax100.js')}}"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{URL::asset('/public/user/vendor/lightbox2/js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{URL::asset('/public/user/js/main.js')}}"></script>
	<script type="text/javascript">
		$('div.alert').delay(4500).fadeOut(100);
	</script>
</body>
</html>