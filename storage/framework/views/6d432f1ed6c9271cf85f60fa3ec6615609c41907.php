<?php $__env->startSection('title'); ?>
	Thực đơn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
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
			<?php echo $__env->make('Layout.user.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>		
		<div class="container">
			<div class="row p-t-108 p-b-70">
				
					<!-- Block3 -->
					<?php if(isset($data)): ?>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<div class="col-md-12">
								<div class="header-lunch parallax0 parallax100" style="background-image: url(./images/background/img_menu_banner.jpg);margin-bottom: 40px;border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;">
								<div id = "<?php echo e($key); ?>" class="bg1-overlay t-center p-t-170 p-b-165" style="border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;border: none;">
										<h2 class="tit4 t-center">
											<?php echo e($key); ?>

										</h2>
									</div>
								</div>
							</div>
							<?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-md-6">
								<div class="blo3 flex-w flex-col-l-sm m-b-30">
									<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
										<a href="#"><img src="<?php echo e(URL::asset('images/food/'.$element->image)); ?>" alt="IMG-MENU"></a>
									</div>

									<div class="text-blo3 size21 flex-col-l-m">
										<a href="#" class="txt21 m-b-3">
											<?php echo e($element->name); ?>

										</a>

										<span class="txt23">
											<?php echo e($element->description); ?>

										</span>

										<span class="txt22 m-t-20">
											<?php echo e($element->price); ?>

										</span>
										
									</div>
									
									<div class="text-blo3 size21 flex-col-l-m">
									<button class="btn3 flex-c-m size18 txt11 trans-0-4 m-10 btnChecked" data-url="<?php echo e(route('F_menu.addtoCart',$element->menu_id)); ?>"> Checked</button>
									</div>
									
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php endif; ?>

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
					<?php $__currentLoopData = \App\Model\M_Combo::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>										
						<div class="col-md-6">
						<div class="blo3 flex-w flex-col-l-sm m-b-30">
							<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
								<a href="#"><img src="<?php echo e(URL::asset('images/background/'.$element->image)); ?>" alt="IMG-MENU"></a>
							</div>

							<div class="text-blo3 size21 flex-col-l-m">
								<span  href="" class="txt22 m-t-20" style="color:red">
									<?php echo e($element->name); ?>

								</span>
								
								<span class="txt21 m-b-3">
									Giảm giá : <?php echo e($element->discount); ?> %
								</span>

								<span class="txt22 m-t-20">
									Loại: <?php echo e($element->type); ?>

								</span>
								<span class="txt22 m-t-20" >
									Giá: <?php echo e($element->price); ?>

								</span>
								<div>
								<b>Gồm :</b> <br>
									<?php $__currentLoopData = \App\Model\M_Combo_Details::where('combo_id',$element->combo_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elements): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php $__currentLoopData = \App\Model\M_Menu::where('menu_id',$elements->menu_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php echo e($item->name); ?> ,
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<b>Số lượng: </b> <?php echo e($elements->quantity); ?> sp<br>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
								
							</div>
							
							<div class="text-blo3 size21 flex-col-l-m">
							<button class="btn3 flex-c-m size18 txt11 trans-0-4 m-10 btnChecked" data-url="<?php echo e(route('F_menu.addComboToCart',$element->combo_id)); ?>"> Checked</button>
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

	<script type="text/javascript">
	
		$(document).ready(function(){
			$('.btnChecked').click(function(){
				var url = $(this).attr('data-url');

				$.ajax({
					type:'GET',
					url : url,
					success:function(data){
						alert(data);
						$('.contentCart').load(' .contentCart');
					},
					error:function(error){
						console.log(error);
					}
				})
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>