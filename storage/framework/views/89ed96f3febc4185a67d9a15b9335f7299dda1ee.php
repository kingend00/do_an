<?php $__env->startSection('body'); ?>

<div class="login-content">
        <div class="nk-block toggled" id="l-login">
                <form  method="post" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="nk-form">
                               
                                <div class="input-group mg-t-15<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                        <div class="nk-int-st">
                                                <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder='Email' requiredfocus >
        
                                                <?php if($errors->has('email')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                                        <div class="nk-int-st">
                                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder='Tên chủ khoản' required >
        
                                                <?php if($errors->has('name')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-phone"></i></span>
                                            <div class="nk-int-st">
                                                    <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" placeholder='Số điện thoại' required >
            
                                                    <?php if($errors->has('phone')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo e($errors->first('phone')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                <div class="input-group mg-t-15<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                    <div class="nk-int-st">
                                            <input id="password" type="password" class="form-control" name="password" placeholder='Mật khẩu' required>
    
                                            <?php if($errors->has('password')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                    </div>
                                </div>
                                <div class="input-group mg-t-15">
                                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                    <div class="nk-int-st">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder='Nhập lại mật khẩu' required>

                                    </div>
                                </div>
                                
                                <div class="fm-checkbox">
                
                                    <button type="submit" >Đăng kí</button>
                                </div>
    
                                <a href="#l-register" data-ma-action="nk-login-switch" data-ma-block="#l-register" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></a>
                            </div>
                
                            <div class="nk-navigation nk-lg-ic">
                                <a href="<?php echo e(route('login')); ?>" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Sign In</span></a>
                                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                            </div>
                </form>
            </div>
        </div>
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.admin.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>