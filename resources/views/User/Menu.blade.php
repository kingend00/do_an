@extends('Layout.user.master')
@section('title')
	Thực đơn
@stop
@section('body')
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1 item1-slick1" style="background-image: url(images/background/menu.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
						RogTeam Place
					</span>

						<h2 style="color:gray" class="caption2-slide1 tit1 t-center animated visible-false m-b-30" data-appear="fadeInUp">
							Thực đơn
						</h2>
				</div>
			</div>
		</div>
	</div>
</section>


	<!-- Main menu -->
	<section class="section-lunch bgwhite">
			@include('Layout.user.error')		
		<div class="container">
			<div class="row p-t-108 p-b-70">
				
					<!-- Block3 -->
					@if(isset($data))
						@foreach ($data as $key=>$value)

							<div class="col-md-12">
								<div class="header-lunch parallax0 parallax100" style="background-image: url(./images/background/img_menu_banner.jpg);margin-bottom: 40px;border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;">
								<div id = "{{$key}}" class="bg1-overlay t-center p-t-170 p-b-165" style="border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;border: none;">
										<h2 class="tit4 t-center">
											{{ $key }}
										</h2>
									</div>
								</div>
							</div>
							@foreach ($value as $element)
								<div class="col-md-6">
								<div class="blo3 flex-w flex-col-l-sm m-b-30">
									<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
										<a href="#"><img src="{{ URL::asset('images/food/'.$element->image)}}" alt="IMG-MENU"></a>
									</div>

									<div class="text-blo3 size21 flex-col-l-m">
										<a href="#" class="txt21 m-b-3">
											{{ $element->name }}
										</a>

										<span class="txt23">
											{{ $element->description }}
										</span>

										<span class="txt22 m-t-20">
											{{ $element->price }}
										</span>
										
									</div>
									
									<div class="text-blo3 size21 flex-col-l-m">
									<button class="btn3 flex-c-m size18 txt11 trans-0-4 m-10 btnChecked" data-url="{{ route('F_menu.addtoCart',$element->menu_id) }}"> Checked</button>
									</div>
									
								</div>
							</div>
							@endforeach		
						@endforeach

					@endif

					<!-- Block3 -->
					<div class="col-md-12">
						<div class="header-lunch parallax0 parallax100" style="background-image: url(./images/background/img_menu_banner.jpg);margin-bottom: 40px;border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;">
							<div id = "combo" class="bg1-overlay t-center p-t-170 p-b-165" style="border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;border: none;">
								<h2 class="tit4 t-center">
									Combo
								</h2>
							</div>
						</div>
					</div>
					@foreach (\App\Model\M_Combo::all() as $element)										
						<div class="col-md-6">
						<div class="blo3 flex-w flex-col-l-sm m-b-30">
							<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
								<a href="#"><img src="{{ URL::asset('images/background/'.$element->image)}}" alt="IMG-MENU"></a>
							</div>

							<div class="text-blo3 size21 flex-col-l-m">
								<span  href="" class="txt22 m-t-20" style="color:red">
									{{ $element->name }}
								</span>
								
								<span class="txt21 m-b-3">
									Giảm giá : {{ $element->discount }} %
								</span>

								<span class="txt22 m-t-20">
									Loại: {{ $element->type }}
								</span>
								<span class="txt22 m-t-20" >
									Giá: {{ $element->price }}
								</span>
								<div>
								<b>Gồm :</b> <br>
									@foreach (\App\Model\M_Combo_Details::where('combo_id',$element->combo_id)->get() as $elements)
										@foreach (\App\Model\M_Menu::where('menu_id',$elements->menu_id)->get() as $item)
												{{ $item->name }} ,
										@endforeach
										<b>Số lượng: </b> {{ $elements->quantity }} sp<br>
									@endforeach
								</div>
								
							</div>
							
							<div class="text-blo3 size21 flex-col-l-m">
							<button class="btn3 flex-c-m size18 txt11 trans-0-4 m-10 btnChecked" data-url="{{ route('F_menu.addComboToCart',$element->combo_id) }}"> Checked</button>
							</div>
							
						</div>
					</div>					
				@endforeach

				
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

	<script type="text/javascript">
	
		$(document).ready(function(){
			$('.btnChecked').click(function(){
				var url = $(this).attr('data-url');

				$.ajax({
					type:'GET',
					url : url,
					success:function(data){
						Mynotify(data,'info');
						$('.contentCart').load(' .contentCart');
					},
					error:function(error){
						console.log(error);
					}
				})
			});
		});
	</script>
@stop