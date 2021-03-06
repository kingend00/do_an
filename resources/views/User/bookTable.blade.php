@extends('Layout.user.master')
@section('title')
	Đặt bàn
@stop
@section('body')
<style>
	.erShow {
		display:block;
	}
</style>
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1 item1-slick1" style="background-image: url(images/background/bg5.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
						RogTeam Place
					</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-30" data-appear="fadeInUp">
							Book Bàn
						</h2>
				</div>
			</div>
		</div>
	</div>
</section>

	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div id="toptable" style="margin-bottom:30px;height:80px"></div>

			<div id="test"></div>

			<div class="row">
				<div class="col-lg-12 p-b-30">
					@include('Layout.user.error')
					<div class="t-center">
						<span class="tit2 t-center">
							Reservation
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Book Bàn
						</h3>
					</div>
					<div id="error" style="display:none;">
						Xin hãy chọn loại bàn
					</div> 

				<form class="wrap-form-reservation size22 m-l-r-auto" method = "POST" id = "formTable">
					{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4">
								<!-- Date -->
								<span class="txt9">
									Ngày (*)
								</span>

								<div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" id="date" name="date" data-date-format = 'yy-mm-dd' readonly>
									<i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
								</div>
							</div>

							<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									Loại bàn (*)
								</span>

								<div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="seat" id="seat">
										
										@if(isset($val))
											<option value = "false">Chọn loại bàn</option>
											@foreach($val as $seat)
												<option value ="{{$seat->type}}">{{ $seat->type }} người</option>
											@endforeach
										@else
										<option>Không tồn tại loại nào</option>									
										@endif
										
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<!-- Time -->
								<span class="txt9">
									Thời gian (*)
								</span>

								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<div class="click">
										<select class="selection-1" name="time" id="time" class="time">
											<option value="none">Chọn giờ</option>
											<option id ="">10:00</option>
											
											<option id ="11">11:00</option>
											
											<option id ="12">12:00</option>
											
											<option id ="13">13:00</option>
											
											<option id ="14">14:00</option>
											
											<option id ="15">15:00</option>
											
											<option id ="16">16:00</option>
											
											<option id ="17">17:00</option>
											
											<option id ="18">18:00</option>
											
											<option id ="19">19:00</option>
	
											<option id ="20">20:00</option>
											<option id ="21">21:00</option>
										</select>
									</div>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									Tên khách hàng (*)
								</span>
								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" value="{{ (Auth::check()!= null) ? Auth::user()->name : "" }}">
								</div>
							</div>

							<div class="col-md-4">
								<!-- Phone -->
								<span class="txt9">
									Số điện thoại (*)
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone" value="{{ (Auth::check() != null) ? Auth::user()->phone : "" }}">
								</div>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Email (*)
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
									Số bàn (*)
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23" id = "number"  title="Hãy chọn loại bàn trước khi chọn số"></div>
							</div>
							

						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6" id="divSubmit">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" id="btnSubmit">
								Đặt bàn
							</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="info-reservation flex-w p-t-80">
				<div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
					<h4 class="txt5 m-b-18">
						Liên hệ chúng tôi nếu có thắc mắc
					</h4>

					<p class="size25">
						Giải đáp bất cứ thắc mắc nào của quý khách, chỉ cần gọi cho chúng tôi
						
						<span class="txt24">+84 233 345 6889</span>
					</p>
				</div>

				<div class="size24 w-full-md p-t-40">
					<h4 class="txt5 m-b-18">
						Đối với việc đặt sự kiện
					</h4>

					<p class="size26">
						Liên hệ theo số điện thoại này
						<span class="txt24">+84 233 345 6889</span>
						, chúng tôi sẽ phản hồi lại 
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
			
			
			DisableTime();
			function DisableTime()
			{
				var value = $('#seat').val();
				if(value == 'false')
				document.getElementById('time').disabled = true;
				
				
				
			};

		//	document.getElementById('#divSubmit').disabled = true;


			
			$(document).on('click','#number',function(){
				var html = $('#number').html();
				var element = document.getElementById("error");
				if(html == 0)
				{
					
					Mynotify('Xin hãy chọn loại bàn','danger');
					
				}
			});
			
			$(document).on('change','#time',function(){
				
				ajaxCall();
				// var currentDate = new Date();
				// var date = currentDate.getHours();
				// var hi = $(this).val();
				// var value = hi.split(':')[0];
				// $('#time option').each(function(key,value){
				// 	var hihi = value.value.split(':')[0];
					
				// 		hihi = String(hihi);
				// 		document.getElementById(hihi).disabled = true;
					
						
				// });
				
				//if(date < '10:00')
					//alert(value);
				var value2 = $('#time').val();
				if(value2 == "21:00")
					Mynotify('Nhà hàng chỉ mở cửa đến 22h, nếu vẫn muốn đặt, hãy tiếp tục !','warning');

			});
			$(document).on('change','#number_seat',function(){
				ajaxCall();
			});

			// Kiểm tra tính hợp lệ của thời gian
			function ajaxCall(){
				$.ajax({
					type:"POST",
					url : "{{ route('F_seat.checktime') }}",
					data : $('#formTable').serialize(),
					success:function(data){
						//console.log(data);
						if(data != 2)
							alert(data);
					},
					error:function(er){
						console.log(er);
					}
				});
			};
			$('.click').click(function(){
				let value = $(this).val();
				//if(value == "chọn giờ giờ")
				let hi = document.getElementById('time');
				if(hi.disabled == true)
					Mynotify('Hãy chọn loại bàn và ngày trước khi chọn giờ !','danger');
				
				
			});

			$('#seat').change(function(){
				var value = $(this).val();
				if(value != 'false')
					document.getElementById('time').disabled = false;
				else
					document.getElementById('time').disabled = true;
				$.ajax({
					type:"GET",
					url:'F_seat/'+value,
					
					success:function(res){
						var html = '';
						html += "<select name = 'number_seat' id = 'number_seat' class = 'number_seat'>";
						html += "<option value = 'false'>Chọn số bàn </option>";
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

						$('.number_seat').select2({
							minimumResultsForSearch: -1
						});
						
						
						
					},
					error:function(er){
						console.log(er);
					}
				});
				
			});
		});
	</script>



	<script type="text/javascript">
		jQuery(document).ready(function(){
			var hi;
			
			$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
				
			$('#formTable').on('submit',function(e){
				e.preventDefault();
				$.ajax({
					type:'POST',
					url : "{{ route('F_seat.store') }}",
					data : $('#formTable').serialize(),
					success:function(data)
					{
						if(data == "true")
							Mynotify('Quý khách đã đặt bàn thành công, xin hãy đợi trong giây lát, chúng tôi phản hồi lại','success');
						else
							Mynotify(data,'danger');
					},
					error:function(er)
					{
						console.log(er.responseJSON.exception);
						if(er.status == 500 && er.responseJSON.exception  == "Swift_TransportException" )
						Mynotify('Quý khách đã đặt bàn thành công, xin hãy đợi trong giây lát, chúng tôi phản hồi lại','success');
						else{
							//console.log(er);
							var errors = er.responseJSON;
							var errorShow = '';
							$.each(errors.errors,function(key,value){
								errorShow += value+"<br>";
							});
							Mynotify(errorShow,'danger');
							console.log(errorShow);
						}
					}
				});
			});

			$('#seat').change(function(){
				ajaxLoadTable();

			});
			$('#date').change(function(){
				var value  = $('#seat').val();
				if(value != "false")
					ajaxLoadTable();
			});
			$('#seat').click(function(){
				ajaxLoadTable();

			});

			// kiểm tra dữ liệu đầu vào cho việc show Bàn bận
			function ajaxLoadTable()
			{
				$.ajax({
					type:"POST",
					url : "{{ route('F_seat.showTime_Seat') }}",
					data : $('#formTable').serialize(),
					
					success:function(data)
					{
						$('#test').html(null);
							let gt = "<p style = 'font-size:30px'>Bảng thông tin bàn rảnh/bàn bận, <strong>Tô màu -> đang bận </strong></p><br>";
							$('#test').html(gt);
								//console.log(data);
								if(data == "false")
									Mynotify('Hãy chọn loại bàn','danger');
								else
								{
											let shiftObj = JSON.parse(data);
										//console.log(shiftObj);



										var instance = new TimeTable({

											// Beginning Time
											startTime: "10:00",

											// Ending Time
											endTime: "22:00",

											// Time to divide(minute)
											divTime: "30",

											// Time Table
											shift: shiftObj,
											addFirstColumn: "HIHI",

											// Other options
											option: {
											

											// workTime include time not displaying
											workTime: true,

											// bg color
											bgcolor: ["#00FFFF"],
											//useBootstrap: true,
											
											//{index :  name, : index: name,,..}
											// selectBox index and shift index should be same
											// Give randome if shift index was not in selectBox index
											
											}

											});
											instance.init("#test");
										$('html, body').animate({
										scrollTop: $("#toptable").offset().top
										}, 0);
								}
								
							
						
					},
					error:function(er)
					{
						console.log(er);
					}

				});
			};
			var pusher = new Pusher('4009c42e7cd6daccc27a', {
                    cluster: 'ap1',
                    encrypted: true
                });
			var channel = pusher.subscribe('RealtimeTable');
			channel.bind('App\\Events\\PusherEvent',function(data){
				$.ajax({
					type:"POST",
					url : "{{ route('F_seat.showTime_Seat') }}",
					data : $('#formTable').serialize(),
					
					success:function(data)
					{
						$('#test').html(null);

								//console.log(data);
								if(data == "false")
									Mynotify('Hãy chọn loại bàn','danger');
								else
								{
											let shiftObj = JSON.parse(data);
										//console.log(shiftObj);



										var instance = new TimeTable({

											// Beginning Time
											startTime: "10:00",

											// Ending Time
											endTime: "22:00",

											// Time to divide(minute)
											divTime: "30",

											// Time Table
											shift: shiftObj,
											addFirstColumn: "HIHI",

											// Other options
											option: {
											

											// workTime include time not displaying
											workTime: true,

											// bg color
											bgcolor: ["#00FFFF"],
											//useBootstrap: true,
											
											//{index :  name, : index: name,,..}
											// selectBox index and shift index should be same
											// Give randome if shift index was not in selectBox index
											
											}

											});
											instance.init("#test");
										
								}
								
							
						
					},
					error:function(er)
					{
						console.log(er);
					}

				});
			});
			
							
				// jQuery("#schedule").timeSchedule({
				// 			rows : {
				// 				'1' : {
				// 				title : 'Title Area',
				// 				schedule:[{start:'10:00',end:'12:00',},{start:'12:00',end:'14:00',},
				// 			]
				// 				},
				// 				'2' : {
				// 				title : 'Hoang dz',
				// 				schedule:[{
				// 					start:'11:00',
				// 					end:'12:00',
				// 				}]
				// 				},
				// 			},
				// 				startTime: "10:00",
				// 				endTime: "22:00", 
				// 				widthTimeX: 16,
				// 				widthTime: 60 * 10,
				// 				timeLineY: 60,
				// 				timeLineBorder:1,
				// 				timeBorder:1,   // border width
				// 				timeLinePaddingTop:0,
				// 				timeLinePaddingBottom:0,
				// 				headTimeBorder:1, // time border width 
				// 				dataWidth:160,
				// 				bundleMoveWidth:1,
				// 				init_data: null,
				// 				change: null,
				// 				click: null,
				// 				append: null,
				// 				time_click: null,
				// 				debug:""
				// 		});	
						
	
		});
		</script>
		
@stop