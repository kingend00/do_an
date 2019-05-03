<?php $__env->startSection('title'); ?>
	Quản lý
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container">
	<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Tài khoản Quản lý</h2>
										<button type="button" class="btn btn-danger btn-add" data-toggle="modal" data-target="#ModalAdd" >Thêm</button>
										
									</div>
								</div>
							</div>
						</div>
	
	<div class="bsc-tbl-hvr">
		<table class=" table table-hover" id="tbData" >
		<thead>
			<tr>
			<th>Email</th>
			<th>Password</th>
			<th>Tên chủ khoản</th>			
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Quyền</th>
			<th colspan="2">Thao tác</th>
		</tr>
		</thead>
		<tbody>
			<?php if(isset($data)): ?>
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td> <?php echo e($value->email); ?> </td>
					<td> <?php echo e($value->password); ?> </td>
					<td> <?php echo e($value->name); ?> </td>					
					<td> <?php echo e($value->phone); ?> </td>
					<td> <?php echo e($value->address); ?> </td>
					<td> <?php echo e($value->roles); ?> </td>
					<td> <button type="button" class="btn btn-danger btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="<?php echo e(route('B_user.show',$value->user_id)); ?>" >Edit</button></td>
					<td> <button type="button" class="btn btn-danger btn-destroy" value="<?php echo e($value->user_id); ?>">Xóa</button></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</tbody>


	</table>

	</div>
</div>
<!-- MODAL UPDATE -->
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
								<?php echo Form::label('Email','Email',['class' => 'control-label']); ?>

								<?php echo Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']); ?>

						</div>
						<div class="form-group">
							<?php echo Form::label('hihi','Password',['class' => 'control-label']); ?>

							<?php echo Form::text('Password','',['id' =>'Password','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

						</div>
						<div class="form-group">
							<?php echo Form::label('Address','Address',['class' => 'control-label']); ?>

							<?php echo Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']); ?>

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
<!-- End MODAL UPDATE -->
<div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
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
							<?php echo Form::label('Address','Address',['class' => 'control-label']); ?>

							<?php echo Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']); ?>

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
<script type="text/javascript">
	
	$(document).ready(function(){
		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});
			var url = null;
		// show thông tin tài khoản
		$('.btn-edit').click(function(){
			 url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				//dataType:'json',
				url : url,
				success:function(response){
					$('#Id').val(response.data.id);
					$('#Password').val(response.data.password);
					$('#Address').val(response.data.address);
					$('#Name').val(response.data.name);
					$('#Email').val(response.data.email);
					$('#Phone').val(response.data.phone);
					
				},
				error:function(eror){
					console.log(eror);
				}
			});
		});


		$('.btn-destroy').click(function(){
			var id = $(this).val();
			
			if(confirm('Bạn có chắc chắn muốn xóa ?'))
			{
				$.ajax({
				type:'DELETE',
				url:'/B_user/'+id,
				//data:{id:id},
				dataType:'html',
				success:function(response){
					alert(response);
					$('#tbData').load(' #tbData');

				},
				error:function(eror){
					console.log(eror);
				}
				});
			}
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
					console.log(data);

					$('#ModalUpdate').modal('hide');
					alert('Thành công');
					$('#tbData').load(' #tbData');
					//
					

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