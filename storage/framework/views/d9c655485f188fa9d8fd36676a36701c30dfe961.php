<?php $__env->startSection('title'); ?>
Quản trị

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
	
    <h1>Something in here , thinking...</h1>
    <script>
      
            var activeurl = window.location;
          $('a[href="'+activeurl+'"]').parent('li').addClass('active');
          
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>