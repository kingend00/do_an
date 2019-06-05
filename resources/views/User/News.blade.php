@extends('Layout.user.master')
@section('title')
	Sự kiện
@stop
@section('body')
	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/background/11.jpg);">
		<h2 class="tit6 t-center">
			Event
		</h2>
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
								<a href="blog-detail.html">
									<img src="{{ URL::asset('images/background/'.$item->image)}}" alt="IMG-BLOG">
								</a>

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
								<a href="blog-detail.html" class="tit9">{{ $item->title }}</a>
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
								Categories
							</h4>

							<ul>
								<li class="bo5-b p-t-8 p-b-8">
									<a href="#" class="txt27">
										Cooking recipe
									</a>
								</li>

								<li class="bo5-b p-t-8 p-b-8">
									<a href="#" class="txt27">
										Delicious foods
									</a>
								</li>

								<li class="bo5-b p-t-8 p-b-8">
									<a href="#" class="txt27">
										Events Design
									</a>
								</li>

								<li class="bo5-b p-t-8 p-b-8">
									<a href="#" class="txt27">
										Restaurant Place
									</a>
								</li>

								<li class="bo5-b p-t-8 p-b-8">
									<a href="#" class="txt27">
										WordPress
									</a>
								</li>
							</ul>
						</div>

						


						<!-- Archive -->
						<div class="archive">
							<h4 class="txt33 p-b-20 p-t-43">
								Archive
							</h4>

							<ul>
								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										uly 2018
									</a>

									<span class="txt29">
										(9)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										June 2018
									</a>

									<span class="txt29">
										(39)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										May 2018
									</a>

									<span class="txt29">
										(29)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										April  2018
									</a>

									<span class="txt29">
										(35)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										March 2018
									</a>

									<span class="txt29">
										(22)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										February 2018
									</a>

									<span class="txt29">
										(32)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										January 2018
									</a>

									<span class="txt29">
										(21)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										December 2017
									</a>

									<span class="txt29">
										(26)
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop