<?php $__env->startSection('title'); ?>
	Thực đơn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url('./images/background/menu.jpg');">
		<h2 class="tit6 t-center">
			Pato Menu
		</h2>
	</section>


	<!-- Main menu -->
	<section class="section-lunch bgwhite">
				
		<div class="container">
			<div class="row p-t-108 p-b-70">
				
					<!-- Block3 -->
					<?php if(isset($data)): ?>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<div class="col-md-12">
								<div class="header-lunch parallax0 parallax100" style="background-image: url(./images/background/img_menu_banner.jpg);margin-bottom: 40px;border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;">
									<div class="bg1-overlay t-center p-t-170 p-b-165" style="border-radius:30px;-webkit-border-radius: 30px;-moz-border-radius: 30px;border: none;">
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
									<a href="<?php echo e(route('F_menu.addtoCart',$element->menu_id)); ?>"><button class="btn3 flex-c-m size18 txt11 trans-0-4 m-10 btnChecked"> Checked</button></a>	
									</div>
									
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php endif; ?>

					<!-- Block3 -->
					

				
			</div>
		</div>

				
	</section>


	<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-85 p-b-85">
		<form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
			<span class="txt5 m-10">
				Specials Sign up
			</span>

			<div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
				<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email-address" placeholder="Email Adrress">
				<i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
			</div>

			<!-- Button3 -->
			<button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
				Sign-up
			</button>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>