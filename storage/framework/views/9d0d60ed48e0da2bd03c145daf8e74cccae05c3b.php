<?php $__env->startSection('title'); ?>
    Đăng nhập
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <form  method="post" action="<?php echo e(route('login')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="nk-form">
                            <div class="input-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                <div class="nk-int-st">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="input-group mg-t-15<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                <div class="nk-int-st">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="fm-checkbox">
                                <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                                <button type="submit" >Đăng nhập</button>
                            </div>

                            <a href="#l-register" data-ma-action="nk-login-switch" data-ma-block="#l-register" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></a>
                        </div>
            
                        <div class="nk-navigation nk-lg-ic">
                            <a href="<?php echo e(route('register')); ?>" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
                            <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
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