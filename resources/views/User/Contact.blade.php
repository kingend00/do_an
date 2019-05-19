@extends('Layout.user.master')
@section('title')
	Liên hệ
@stop
@section('body')
	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
		<h2 class="tit6 t-center">
			LIÊN HỆ
		</h2>
	</section>


	<!-- Contact form -->
	<section class="section-contact bg1-pattern p-t-90 p-b-113">
		<!-- Map -->
		<div class="container">
			<div class="map bo8 bo-rad-10 of-hidden">
				<div class="contact-map size37" id="google_map" data-map-x="40.704644" data-map-y="-74.011987" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
			</div>
		</div>
		@include('Layout.user.error')
		<div class="container">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Hãy gửi phản hồi cho chúng tôi !
			</h3>
			
			{!! Form::open(['class' => 'wrap-form-reservation size22 m-l-r-auto','id'=>'form_update','method'=>'POST','route'=>'F_contact.store'])!!}
				<div class="row">
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Tên 
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" id="name" placeholder="Name" value = "{{ (Auth::check()) ? Auth::user()->name : '' }}" required>
						</div>
					</div>

					<div class="col-md-4">
						<!-- Email -->
						<span class="txt9">
							Email
						</span>

						<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" id="email" placeholder="Email" value = "{{ (Auth::check()) ? Auth::user()->email : '' }}">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Phone -->
						<span class="txt9">
							Số điện thoại
						</span>

						<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
						<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" id="phone" placeholder="Phone" value = "{{ (Auth::check()) ? Auth::user()->phone : '' }}" required>
						</div>
					</div>

					<div class="col-12">
						<!-- Message -->
						<span class="txt9">
							Nội dung
						</span>
						<textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3" name="message" id="message" placeholder="Message" required></textarea>
					</div>
				</div>

				<div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
						Gửi
					</button>
				</div>
				{!! Form::close() !!}

			<div class="row p-t-135">
				<div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/map-icon.png" alt="IMG-ICON">
						</div>

						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Địa chỉ
							</span>

							<span class="txt23 size38">
								Towner <strong>Rogteam</strong>, số 198, Quận Hoàn Kiếm, Hà Nội
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/phone-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Gọi chúng tôi
							</span>

							<span class="txt23 size38">
								(+1) 96 716 6879
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/clock-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Thời gian mở cửa
							</span>

							<span class="txt23 size38">
								10:00 AM – 10:00 PM <br/>Every Day
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@stop