<?php $__env->startSection('title'); ?>
	Khách hàng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container">
	<div class="breadcomb-area">
	<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="breadcomb-wp">
						<div class="breadcomb-icon">
							<i class="notika-icon notika-windows"></i>
					</div>
						<div class="breadcomb-ctn">
								<h2>Tài khoản Khách hàng</h2>
								<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" ><i class="notika-icon notika-checked"></i> Thêm</button>
						</div>
					</div>
				</div>
			
	</div>
 </div>
 <br>
	
	<div class="bsc-tbl-hvr">
		<table class=" table table-hover" >
		<thead>
			<tr>
			<th>Email</th>
			<th>Tên chủ khoản</th>		
			<th>Số điện thoại</th>
			<th>Điểm</th>
		</tr>
		</thead>
		<?php if(isset($data)): ?>
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td> <?php echo e($value->email); ?> </td>
					<td> <?php echo e($value->name); ?> </td>
					<td> <?php echo e($value->phone); ?> </td>
					<td><?php echo e($value->point); ?></td>
					<td> <button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="<?php echo e(route('B_user.show',$value->user_id)); ?>" ><i class = "glyphicon glyphicon-cog"></i> Password Reset</button></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>	
		</tbody>


	</table>
<div class="modal fade" id="ModalUpdate" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             <?php echo Form::open(['id'=>'form_update','method'=>'POST']); ?>

             
             <?php echo e(method_field('PUT')); ?>

            <div class="modal-body">
            			<div class="form-group">
							<?php echo Form::hidden('Id','',['id' =>'Id']); ?>

						</div>
						<div class="form-group">
							<?php echo Form::label('ResetPassword','Reset Password',['class' => 'control-label']); ?>

							<?php echo Form::text('resetPassword','',['id' =>'resetPassword','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

						</div>
				                                 
            </div>
            <div class="modal-footer">
                
                <button class="btn btn-default " type="submit">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>




<div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
            	<h1> Thêm tài khoản</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             <?php echo Form::open(['id'=>'form_add','route'=>'B_user.store','method'=>'POST']); ?>

             
             
            <div class="modal-body">
						<div class="form-group">
							<?php echo Form::label('Email','Email',['class' => 'control-label']); ?>

							<?php echo Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']); ?>

						</div>
						<div class="form-group">
							<?php echo Form::label('hihi','Password',['class' => 'control-label']); ?>

							<?php echo Form::text('Password','',['id' =>'Password','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

						</div>
						<div class="form-group">
							<?php echo Form::label('Name','Name',['class' => 'control-label']); ?>

							<?php echo Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

						</div>
						
						<div class="form-group">
							<?php echo Form::label('Phone','Phone',['class' => 'control-label']); ?>

							<?php echo Form::text('Phone','',['id' =>'Phone','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

						</div>
				                                 
            </div>
            <div class="modal-footer">
                
                <button class="btn btn-default " type="submit">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

	</div>

</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});

			var url = null;
		$('.btn-edit').click(function(){
			url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				//dataType:'json',
				url : url,
				success:function(response){
					$('#Id').val(response.data.id);
					
				},
				error:function(eror){
					console.log(eror);
				}
			});
		});


		$('#form_update').on('submit',function(e){
			e.preventDefault();
			//var url = document.getElementById('id');
			var id = $('#Id').val();
			$.ajax({
				type:'PUT',
				url:url,
				data:$('#form_update').serialize(),
				
				
				success:function(data){
					if($.isEmptyObject(data.error))
					{
						$('#ModalUpdate').modal('hide');
						alert('Reset Password thành công');
						$('#tbData').load(' #tbData');	
					}
					else
					{
						$.each(data.error,function(key,value){
							$(".error-alert").find("ul").append('<li>'+value+'</li>');
						});
					}

					
					

				},
				error:function(er){
					console.log(er);
				}

			});
		});
		
	});
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>