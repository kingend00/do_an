@extends('Layout.user.master')
@section('title')
	Giới thiệu
@stop
@section('body')
	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-03.jpg);">
		<h2 class="tit6 t-center">
			Story
		</h2>
	</section>


	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
		<span class="tit2 t-center">
			Rogteam Place
		</span>

		<h3 class="tit3 t-center m-b-35 m-t-5">
			Về chúng tôi
		</h3>

		<p class="t-center size32 m-l-r-auto">
			Là 1 lĩnh vực nhỏ thuộc tập đoàn <strong>Rog</strong>, ông lớn đứng đầu AI System tại Việt Nam, RogTeam Place có tất cả 60 chi nhánh trên toàn quốc, về chi tiết RogTeam Place kinh doanh về các mục như bữa trưa,
			 bữa tối, món khai vị, đồ uống (rượi nội, rượi ngoại, rượi ngâu lâu năm, bia,... ), 
			 đặc biệt phần lớn các nguyên liệu được nhập từ nước ngoài về như : Mỹ, Canada, Singapore, Đức,Ba Lan,... 
			 Nguồn gốc rõ ràng, đã được kiểu chứng an toàn thực phẩm, dự kiến sắp tới chuỗi nhà hàng sẽ hợp tác với Pháp 
			 để đưa về nhà hàng hương vị rượu Pháp nổi tiếng và hợp tác với Bỉ mang về bia Bỉ với hơn 2000 loại vị khác nhau vốn là đặc trưng của vùng này...	
		</p>
	</section>


	<!-- Video -->
	<section class="section-video parallax100" style="background-image: url(images/header-menu-01.jpg);">
		<div class="content-video t-center p-t-225 p-b-250">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

			<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
				giới thiệu
			</h3>

			<div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal" data-target="#modal-video-01">
				<div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
					<i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</section>


	<!-- Delicious & Romantic-->
	<section class="bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<!-- Delicious -->
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-delicious t-center">
						<span class="tit2 t-center">
							Châm ngôn
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Tập đoàn Rog
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
							Phát triển trí tuệ nên bắt đầu từ lúc mới sinh và chấm dứt chỉ sau khi chết
						</p>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-delicious size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="{{ URL::asset('images/logo/logo2.png') }}" alt="IMG-OUR">
					</div>
				</div>
			</div>


			<!-- Romantic -->
			<div class="row p-t-170">
				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-romantic size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="{{ URL::asset('images/logo/logo1.png') }}" alt="IMG-OUR">
					</div>
				</div>

				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-romantic t-center">
						<span class="tit2 t-center">
							Châm ngôn 
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Nhà hàng
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
							Cái gì không bán được thì tôi không muốn sáng chế. Doanh số là bằng chứng về tính hữu dụng, và tính hữu dụng là thành công	
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Chef -->
	<section class="section-chef bgwhite p-t-115 p-b-95">
		<div class="container t-center">
			<span class="tit2 t-center">
				Meet Our
			</span>

			<h3 class="tit5 t-center m-b-50 m-t-5">
				Chef
			</h3>

			<div class="row">
				<div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
					<!-- -Block5 -->
					<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="#"><img src="{{ URL::asset('images/background/chef1.jpg') }}" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<a href="#" class="txt34 dis-block p-b-6">
								Peter Hart
							</a>

							<span class="dis-block t-center txt35 p-b-25">
								Chef
							</span>

							<p class="t-center">
								Donec porta eleifend mauris ut effici-tur. Quisque non velit vestibulum, lob-ortis mi eget, rhoncus nunc
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
					<!-- -Block5 -->
					<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="#"><img src="{{ URL::asset('images/background/chef2.JPG') }}"" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<a href="#" class="txt34 dis-block p-b-6">
								Joyce Bowman
							</a>

							<span class="dis-block t-center txt35 p-b-25">
								Chef
							</span>

							<p class="t-center">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies felis a sem tempus tempus.
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
					<!-- -Block5 -->
					<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="#"><img src="{{ URL::asset('images/background/chef3.jpg') }}" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<a href="#" class="txt34 dis-block p-b-6">
								Peter Hart
							</a>

							<span class="dis-block t-center txt35 p-b-25">
								Chef
							</span>

							<p class="t-center">
								Phasellus aliquam libero a nisi varius, vitae placerat sem aliquet. Ut at velit nec ipsum iaculis posuere quis in sapien
							</p>
						</div>
					</div>
				</div>
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
		<a href = "{{ route('contact') }}"><button type="button" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
			Contact
		</button></a>
		</form>
	</div>

@stop