@extends('Layout.user.master')
@section('title')
	Đặt bàn
@stop
@section('body')
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image:url('./images/background/slide1.jpg');">
		<h2 class="tit6 t-center" style="color: green">
			Pato Menu
		</h2>
	</section>

	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Reservation
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Book table
						</h3>
					</div>

				<form class="wrap-form-reservation size22 m-l-r-auto" method = "POST" action = "{{ route('F_seat.store') }}">
					{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4">
								<!-- Date -->
								<span class="txt9">
									Date
								</span>

								<div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date">
									<i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
								</div>
							</div>

							<div class="col-md-4">
								<!-- Time -->
								<span class="txt9">
									Time
								</span>

								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="time" id="time" class="time">
										<option>10:00</option>
										<option>10:30</option>
										<option>11:00</option>
										<option>11:30</option>
										<option>12:00</option>
										<option>12:30</option>
										<option>13:00</option>
										<option>13:30</option>
										<option>14:00</option>
										<option>14:30</option>
										<option>15:00</option>
										<option>15:30</option>
										<option>16:00</option>
										<option>16:30</option>
										<option>17:00</option>
										<option>17:30</option>
										<option>18:00</option>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									People
								</span>

								<div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="seat" id="seat">
										
										@if(isset($val))
											<option>Chọn loại bàn</option>
											@foreach($val as $seat)
												<option value ="{{$seat->type}}">{{ $seat->type }} người</option>
											@endforeach
										@else
										<option>Không tồn tại loại nào</option>									
										@endif
										
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									Name
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" value="{{ (Auth::check()!= null) ? Auth::user()->name : "" }}">
								</div>
							</div>

							<div class="col-md-4">
								<!-- Phone -->
								<span class="txt9">
									Phone
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone" value="{{ (Auth::check() != null) ? Auth::user()->phone : "" }}">
								</div>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" id = "email" type="email" name="email" placeholder="Email" value="{{ (Auth::check() != null) ? Auth::user()->email : "" }}">
								</div>
							</div>
							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Tổng số sản phẩm đã mua
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="total_product" placeholder="Tổng sản phẩm" value = "{{ (Cart::count()!=0) ? Cart::count() : 'Bạn chưa chọn sản phẩm nào' }}" readonly ="true">
								</div>
							</div>
							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Tổng tiền
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" id = "total_money" type="text" name="total_money" placeholder="Tổng tiền" value = "@if(isset($total)) {{ $total }} @else 0 @endif " readonly ="true">
								</div>
							</div>
							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Số bàn
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23" id = "number">

								</div>
							</div>
							

						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Book Table
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="info-reservation flex-w p-t-80">
				<div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
					<h4 class="txt5 m-b-18">
						Reserve by Phone
					</h4>

					<p class="size25">
						Donec quis euismod purus. Donec feugiat ligula rhoncus, varius nisl sed, tincidunt lectus.
						<span class="txt25">Nulla vulputate</span>
						, lectus vel volutpat efficitur, orci
						<span class="txt25">lacus sodales</span>
						 sem, sit amet quam:
						<span class="txt24">(001) 345 6889</span>
					</p>
				</div>

				<div class="size24 w-full-md p-t-40">
					<h4 class="txt5 m-b-18">
						For Event Booking
					</h4>

					<p class="size26">
						Donec feugiat ligula rhoncus:
						<span class="txt24">(001) 345 6889</span>
						, varius nisl sed, tinci-dunt lectus sodales sem.
					</p>
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

			$('#seat').change(function(){
				var value = $(this).val();
				
				$.ajax({
					type:"GET",
					url:'F_seat/'+value,
					
					success:function(res){
						var html = '';
						html += "<select name = 'number_seat' id = 'number_seat' style = ' max-width:100%; display: block;align-items: center;background-color:white;border: 0px solid transparent;border-radius: 10px;height: 46px;outline: none;width: auto;max-width: 100%' >";
						$.each(res,function(key,value){
							$.each(value,function(number2,type){
								$.each(type,function(key2,value2){
									html += '<option value ='+value2+'>';
									html += value2;
									html+='</option>';
								});
							});
						});
						html += "</select>";
						
						$('#number').html(html);

						console.log(html);
						
						
						
					},
					error:function(er){
						console.log(er);
					}
				});
				
			});
		});
	</script>
@stop