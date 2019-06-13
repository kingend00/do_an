<?php $__env->startSection('title'); ?>
    Đăng nhập
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <form  method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo e(csrf_field()); ?>

                   
                    <div class="nk-form">
                            <?php echo $__env->make('Layout.user.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <div class="input-group mg-t-15<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                <div class="nk-int-st">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder = "Nhập email" required autofocus>
                                </div>
                            </div>
                            <div class="input-group mg-t-15<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                <div class="nk-int-st">
                                        <input id="password" type="password" class="form-control" name="password" required placeholder  ="Nhập mật khẩu">

                                        
                                </div>
                            </div>
                            <div class="fm-checkbox">
                                
                                <button type="submit" class="btn btn-success notika-btn-success" >Đăng nhập</button>
                                
                            </div>
                            <div class="fm-checkbox">
                                 <a href="<?php echo e(route('loginFb','facebook')); ?>" > Đăng nhập bằng <u>Facebook</u> <i class="fa fa-facebook"></i></a>

                            </div>

                           
                            <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
                        </div>
            
                        <div class="nk-navigation nk-lg-ic">
                            <a href="<?php echo e(route('register')); ?>" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Đăng kí</span></a>
                           
                             <a href="<?php echo e(route('password.request')); ?>" data-ma-block="#l-forget-password"><i>?</i><span>Quên mật khẩu</span></a>
                             <a href="<?php echo e(route('index')); ?>" data-ma-block="#l-register"><i><-</i><span>Trang chủ</span></a>
                         </div>
            </form>
        </div>

        

        <!-- Forgot Password -->
        <div class="nk-block" id="l-forget-password">
            <div class="nk-form">
                <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
            </div>

            <div class="nk-navigation nk-lg-ic rg-ic-stl">
                <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
                <a href="<?php echo e(route('register')); ?>" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.admin.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>