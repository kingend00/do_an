@extends('Layout.user.master')
@section('title')
	Liên hệ
@stop
@section('body')
	<!-- Title Page -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/background/contac2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Contact
						</span>
	
							<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-30" data-appear="fadeInUp">
								Liên hệ
							</h2>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Contact form -->
	<section class="section-contact bg1-pattern p-t-90 p-b-113">
		<!-- Map -->
	
		@include('Layout.user.error')
		<div class="container">
			<h1 class="tit7 t-center p-b-62 p-t-105">
				Nếu có, hãy gửi phản hồi cho chúng tôi !
			</h1>
			
			
		<form method="POST" id="form_update" class="wrap-form-reservation size22 m-l-r-auto">
		{{ csrf_field() }}
		
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
		</form>

			<div class="row p-t-135">
				<div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/background/address2.png" alt="IMG-ICON" width = 80 height = 60>
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
							<img src="images/background/phone12.png" alt="IMG-ICON" width = 80 height = 60>
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
							<img src="images/background/time2.png" alt="IMG-ICON" width = 80 height = 60>
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
	<script type="text/javascript">
		$(document).ready(function(){
			
			$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#form_update').submit(function(e){
				e.preventDefault();
				$.ajax({
					type : "POST",
					url : "{{ route('createContact') }}",
					data : $('#form_update').serialize(),
					success:function(data)
					{
						Mynotify(data,'info',5000);
					},
					error:function(er)
					{
							var errors = er.responseJSON;
							var errorShow = '';
							$.each(errors.errors,function(key,value){
								errorShow += value+"<br>";
							});
							Mynotify(errorShow,'danger');
							
					}
				});
			});
			
		});
	</script>


@stop