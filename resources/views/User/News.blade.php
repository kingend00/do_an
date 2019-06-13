@extends('Layout.user.master')
@section('title')
	Sự kiện
@stop
@section('body')
	<!-- Title Page -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/background/11.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							RogTeam Place
						</span>
	
							<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-30" data-appear="fadeInUp">
								Event
							</h2>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Content page -->
	<section>
		
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9">
					<div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
					@foreach(\App\Model\M_News::all() as $item)
						<!-- Block4 -->
					<div class="blo4 p-b-63" id = "{{ $item->news_id }}">
							<!-- - -->
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
								
									<img src="{{ URL::asset('images/background/'.$item->image)}}" alt="IMG-BLOG">
								

								<div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
										28
									</span>

									<span class="txt31">
										Dec, 2018
									</span>
								</div>
							</div>

							<!-- - -->
							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
								<a href="#" class="tit9">{{ $item->title }}</a>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										28 December, 2018
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										Cooking, Food
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>

								<p>
								{{ $item->content  }}
								</p>
							</div>
						</div>
						@endforeach
											

					</div>
				</div>

				<div class="col-md-4 col-lg-3">
					<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
						<!-- Search -->
						<div class="search-sidebar2 size12 bo2 pos-relative">
							<input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
							<button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
						</div>

						<!-- Categories -->
						<div class="categories">
							<h4 class="txt33 bo5-b p-b-35 p-t-58">
								Thực đơn 
							</h4>

							<ul>
								@foreach(\App\Model\M_Category::all() as $item)
								<li class="bo5-b p-t-8 p-b-8">
										<a href="{{route('F_menu.index')}}/#{{$item->name}}" class="txt27">
											{{$item->name}}
										</a>
								</li>

								@endforeach
							
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
@stop