<?php $__env->startSection('title'); ?>
	Trang chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/background/slide1.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Welcome to
						</span>

							<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
								RogTeam Place
							</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
							<!-- Button1 -->
							<a href="#menu" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Xem thực đơn
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/background/slide2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Welcome to
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							RogTeam Place
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
							<!-- Button1 -->
							<a href="#menu" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Xem thực đơn
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(images/background/img10.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Welcome to
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							RogTeam Place
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
							<!-- Button1 -->
							<a href="#menu" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Xem thực đơn
							</a>
						</div>
					</div>
				</div>

			</div>

			<div class="wrap-slick1-dots"></div>
		</div>
	</section>
	
	
	
	<!-- Welcome -->
	<section class="section-welcome bg1-pattern p-t-120 p-b-105">
			<div class="row">
					<div class="col-md-12 p-t-45 p-b-30">
						<div class="wrap-text-welcome t-center">
							<span class="tit2 t-center">
								RogTeam Place
							</span>
	
							<h3 class="tit3 t-center m-b-35 m-t-5">
								Event
							</h3>
						</div>
					</div>
				</div>
			<section class="section-slide" style="margin-bottom:100px">
					<div class="wrap-slick3">
						
							<div class="slick3 col-sm-12">
								<?php $__currentLoopData = \App\Model\M_News::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
										<div class="item-slick3 item1-slick3" style="background-image: url(<?php echo e('images/background/'.$item->image); ?>);height:300px;width:400px;border-radius:10px" >
											<div class="wrap-content-slide3 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						
													<h1 style="color:white;font-size:40px">
														<?php echo e($item->title); ?>

													</h1>
													<br>
												<div class="wrap-btn-slide3 animated" data-appear="zoomIn">
													<!-- Button1 -->
													<a href="<?php echo e(route('news')); ?>/#<?php echo e($item->news_id); ?>" class="btn1 flex-c-m size1 txt3 trans-0-4">
														Xem thêm
													</a>
												</div>
											</div>
										</div>
																
								

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
									
					</div>
				</section>		
		<div class="container">
			
			
			
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							RogTeam Place
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Welcome
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
							Là 1 lĩnh vực nhỏ thuộc tập đoàn <strong>Rog</strong>, ông lớn đứng đầu AI System tại Việt Nam, RogTeam Place có tất cả 60 chi nhánh trên toàn quốc... 
						</p>

					<a href="<?php echo e(route('about')); ?>" class="txt4">
							Xem  thêm
							<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
						</a>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="<?php echo e(URL::asset('images/background/hh1.jpg')); ?>" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Intro -->
	<section class="section-intro">
		<div class="header-intro parallax100 t-center p-t-135 p-b-158" style="background-image: url(./images/background/img7.jpg);">
			<span class="tit2 p-l-15 p-r-15">
				Khám phá
			</span>

			<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
				RogTeam Place
			</h3>
		</div>

		<div class="content-intro bg-white p-t-77 p-b-133">
			<div class="container">
				<div class="row">
					<div class="col-md-4 p-t-30">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<img src="<?php echo e(URL::asset('images/background/party.jpg')); ?>" alt="IMG-INTRO">
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<h4 class="txt5 color0-hov trans-0-4 m-b-13">
									Vua của những bữa tiệc
								</h4>

								<p class="m-b-20">
									Không gian thú vị, vừa phù hợp cho những bũa tiệc lãng man, vừa phù hợp với những bữa tiệc đôi chút sôi động.
								</p>

								
							</div>
						</div>
					</div>

					<div class="col-md-4 p-t-30">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<img src="<?php echo e(URL::asset('images/background/slow4.jpg')); ?>" alt="IMG-INTRO">
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<h4 class="txt5 color0-hov trans-0-4 m-b-13">
									Thực đơn mới lạ
								</h4>

								<p class="m-b-20">
									Những món ăn độc, lạ, mang sự mới mẻ, sự tò mò tới cho khách hàng và hơn thế nữa.
								</p>

								
							</div>
						</div>
					</div>

					<div class="col-md-4 p-t-30">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<img src="<?php echo e(URL::asset('images/background/love1.jpg')); ?>" alt="IMG-INTRO"> 
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<h4 class="txt5 color0-hov trans-0-4 m-b-13">
									Lãng mạn, đầy màu sắc
								</h4>

								<p class="m-b-20">
									Khung cảnh lãng mạn, ánh lửa nhẹ nhàng dành cho những bữa tiệc đôi lứa
								</p>

								
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- Our menu -->
	<section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
		<div class="container" id="menu">
			<div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Discover
				</span>

				<h3 class="tit5 t-center m-t-2">
					Our Menu
				</h3>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-sm-6">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="<?php echo e(URL::asset('images/background/low7.jpg')); ?>" alt="IMG-MENU">

								<!-- Button2 -->
							<a href="<?php echo e(route('F_menu.index')); ?>/#lunch" class="btn2 flex-c-m txt5 ab-c-m size4">
									Lunch
								</a>
							</div>


							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="<?php echo e(URL::asset('images/background/slow10.jpg')); ?>" alt="IMG-MENU">

								<!-- Button2 -->
							<a href="<?php echo e(route('F_menu.index')); ?>/#combo" class="btn2 flex-c-m txt5 ab-c-m size4">
									Combo
								</a>
							</div>
						</div>

						<div class="col-sm-6">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="<?php echo e(URL::asset('images/background/low4.jpg')); ?>" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="<?php echo e(route('F_menu.index')); ?>/#dinner" class="btn2 flex-c-m txt5 ab-c-m size5">
									Dinner
								</a>
							</div>
							<div class="col-12">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="<?php echo e(URL::asset('images/background/low1.jpg')); ?>" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="<?php echo e(route('F_menu.index')); ?>/#dessert" class="btn2 flex-c-m txt5 ab-c-m size5" style="text-align:center">
									Dessert
								</a>
							</div>
						</div>
						</div>

					</div>
				</div>

				<div class="col-md-4">
					<div class="row">
						<div class="col-12">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="<?php echo e(URL::asset('images/background/low6.jpg')); ?>" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="<?php echo e(route('F_menu.index')); ?>/#drink" class="btn2 flex-c-m txt5 ab-c-m size5" style="text-align:center" >
									Drink
								</a>
							</div>
						</div>
						
					<div class="col-12">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="<?php echo e(URL::asset('images/background/low2.jpg')); ?>" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="<?php echo e(route('F_menu.index')); ?>/#starters" class="btn2 flex-c-m txt5 ab-c-m size8">
									Starters
								</a>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Event -->
	<section class="section-event">
		<div class="wrap-slick2">
			<div class="slick2">
				<div class="item-slick2 item1-slick2" style="background-image: url(./images/background/20.jpg);">
					<div class="wrap-content-slide2 p-t-115 p-b-208">
						<div class="container">
							<!-- - -->
							<div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Sản phẩm sắp ra mắt
								</span>

								<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
									Events
								</h3>
							</div>

							<!-- Block2 -->
							<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="zoomIn">
								<!-- Pic block2 -->
							<a href="<?php echo e(route('news')); ?>" class="wrap-pic-blo2 bg1-blo2">
									<div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m t-center">
											08:00 tối thứ 2 - 21 November 2020
										</span>
									</div>
								</a>

								<!-- Text block2 -->
								<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
									<h4 class="tit7 t-center m-b-10">
										
										Tôm caribe, hương vị cực mới lạ
									</h4>

									<p class="t-center">
										Cái tên đã nói nên phần nào nguồn gốc của sản phẩm này, xuất xứ từ vùng biển rất nổi tiếng trên phim ảnh : Caribe
									</p>

									<div class="flex-sa-m flex-w w-full m-t-40">
										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Ngày">
												25
											</span>

											<span class="dis-block t-center txt8">
												Ngày
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Giờ">
												12
											</span>

											<span class="dis-block t-center txt8">
												Giờ
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Phút">
												59
											</span>

											<span class="dis-block t-center txt8">
												Phút
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Giây">
												56
											</span>

											<span class="dis-block t-center txt8">
												Giây
											</span>
										</div>
									</div>

									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick2 item2-slick2" style="background-image: url(./images/background/16.jpg);">
					<div class="wrap-content-slide2 p-t-115 p-b-208">
						<div class="container">
							<!-- - -->
							<div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Sản phẩm sắp ra mắt
								</span>

								<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
									Events
								</h3>
							</div>

							<!-- Block2 -->
							<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="fadeInDown">
								<!-- Pic block2 -->
								<a href="<?php echo e(route('news')); ?>" class="wrap-pic-blo2 bg2-blo2">
									<div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m">
											10:00 sáng thứ 7  - 21 November 2019
										</span>
									</div>
								</a>

								<!-- Text block2 -->
								<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
									<h4 class="tit7 t-center m-b-10">
										
										Cá thu đậm hương vị biển
									</h4>

									<p class="t-center">
										Được đánh bắt ở gần bờ biển Pháp, mang lại đôi chút vị độc đáo của vùng đất này khác với cá thu tại Việt Nam
									</p>

									<div class="flex-sa-m flex-w w-full m-t-40">
										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Ngày">
												25
											</span>

											<span class="dis-block t-center txt8">
												Ngày
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Giờ">
												12
											</span>

											<span class="dis-block t-center txt8">
												Giờ
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Phút">
												59
											</span>

											<span class="dis-block t-center txt8">
												Phút
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Giây">
												56
											</span>

											<span class="dis-block t-center txt8">
												Giây
											</span>
										</div>
									</div>

									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick2 item3-slick2" style="background-image: url(./images/background/23.jpg);">
					<div class="wrap-content-slide2 p-t-115 p-b-208">
						<div class="container">
							<!-- - -->
							<div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Sản phẩm sắp ra mắt
								</span>

								<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
									Events
								</h3>
							</div>

							<!-- Block2 -->
							<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="rotateInUpLeft">
								<!-- Pic block2 -->
								<a href="<?php echo e(route('news')); ?>" class="wrap-pic-blo2 bg3-blo2">
									<div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m">
											08:00 tối chủ nhật - 21 November 2020
										</span>
									</div>
								</a>

								<!-- Text block2 -->
								<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
									<h4 class="tit7 t-center m-b-10">
										Spaghetti Ý, công thức mới
									</h4>

									<p class="t-center">
										Vẫn là mì spaghetti đó, nhưng với công thức pha sốt mới mang lại hương vị vô cùng mới lạ.
									</p>

									<div class="flex-sa-m flex-w w-full m-t-40">
										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Ngày">
												25
											</span>

											<span class="dis-block t-center txt8">
												Ngày
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Giờ">
												12
											</span>

											<span class="dis-block t-center txt8">
												Giờ
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Phút">
												59
											</span>

											<span class="dis-block t-center txt8">
												Phút
											</span>
										</div>

										<div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 Giây">
												56
											</span>

											<span class="dis-block t-center txt8">
												Giây
											</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="wrap-slick2-dots"></div>
		</div>
	</section>

	<!-- Booking -->
	<section class="section-booking bg1-pattern p-t-100 p-b-110">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Reservation
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Book table
						</h3>
						<div style="text-align:center;padding-left:150px">
						<a href ="<?php echo e(route('F_seat.index')); ?>"><button type="button" class="btn3 flex-c-m size13 txt11 trans-0-4" style="width:250px;height:130px;font-size:30px">
								Đặt bàn
							</button></a>
						</div>
					</div>

					
				</div>

				<div class="col-lg-6 p-b-30 p-t-18">
					<div class="wrap-pic-booking size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="<?php echo e(URL::asset('images/background/low3.jpg')); ?>" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Blog -->
	<section class="section-blog bg-white p-t-115 p-b-123">
		<div class="container">
			<div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Latest News
				</span>

				<h3 class="tit5 t-center m-t-2">
					Tin mới
				</h3>
			</div>

			<div class="row">
				<?php $__currentLoopData = \App\Model\M_News::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-4 p-t-30">
					<!-- Block1 -->
					<div class="blo1">
						<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
							<a href="<?php echo e(route('news')); ?>/#<?php echo e($item->news_id); ?>"><img src="<?php echo e(URL::asset('images/background/'.$item->image)); ?>" width=100px height = 200px alt="IMG-INTRO"></a>

							<div class="time-blog">
								12 Dec 2017
							</div>
						</div>

						<div class="wrap-text-blo1 p-t-35">
							<a href="blog-detail.html"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
								<?php echo e($item->title); ?>

							</h4></a>

							<p class="m-b-20">
								<?php echo e($item->content); ?>

							</p>

						<a href="<?php echo e(route('news')); ?>/#<?php echo e($item->news_id); ?>" class="txt4">
								Đọc thêm
								<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>


	<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-85 p-b-85">
		<form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
			<span class="txt5 m-10">
				Liên hệ với chúng tôi !
			</span>

			<!-- Button3 -->
		<a href = "<?php echo e(route('contact')); ?>"><button type="button" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
			Contact
		</button></a>
		</form>
		
	</div>

	<input type="hidden" value="<?php echo e((Session::has('success')) ? Session::has('success') : ""); ?>" id="max_ping">


	<script>
		$(document).ready(function(){
			
			let data = $('#max_ping').val();
			if(data != "") 
			{
				Mynotify("Nhà hàng đã gửi mật khẩu lần đầu tới email của quý khách, vui lòng kiểm tra",'success');
				setTimeout(function(){
					$('#max_ping').val("");
				},18000);
			}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>