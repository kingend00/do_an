<?php $__env->startSection('title'); ?>
	Nhân viên
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
										<h2>Tài khoản Nhân viên</h2>
										<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" ><i class="notika-icon notika-checked"></i> Thêm</button>
										
									</div>
								</div>
							</div>
						</div>
	
	<div class="bsc-tbl-hvr">
		<table class=" table table-hover" id="tbData">
		<thead>
			<tr>
			<th>Email</th>
			<th>Tên chủ khoản</th>			
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th colspan="2">Thao tác</th>
		</tr>
		</thead>
		<tbody>
			
			<?php if(isset($data)): ?>
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td> <?php echo e($value->email); ?> </td>
					<td> <?php echo e($value->name); ?> </td>
					<td> <?php echo e($value->phone); ?> </td>
					<td> <?php echo e($value->address); ?> </td>
					<td> <button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="<?php echo e(route('B_user.show',$value->user_id)); ?>" ><i class = "glyphicon glyphicon-cog"></i> Edit</button></td>
					<td> <button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="<?php echo e(route('B_user.destroy',$value->user_id)); ?>" ><i class="notika-icon notika-close"></i>  Xóa</button></td>

				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
			
		</tbody>


	</table>


	</div>
</div>

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
							
							<?php echo Form::hidden('Update_Id','',['id' =>'Update_Id','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true','readonly' => 'true']); ?>

						</div>
						<div class="form-group">
								<?php echo Form::label('Email','Email',['class' => 'control-label']); ?>

								<?php echo Form::text('Update_Email','',['id' =>'Update_Email','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']); ?>

							</div>
							<div class="form-group">
								<?php echo Form::label('hihi','Password',['class' => 'control-label']); ?>

								<?php echo Form::text('Update_Password','',['id' =>'Update_Password','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

							</div>
							<div class="form-group">
								<?php echo Form::label('Address','Address',['class' => 'control-label']); ?>

								<?php echo Form::text('Update_Address','',['id' =>'Update_Address','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']); ?>

							</div>
							<div class="form-group">
								<?php echo Form::label('Name','Name',['class' => 'control-label']); ?>

								<?php echo Form::text('Update_Name','',['id' =>'Update_Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

							</div>
							
							<div class="form-group">
								<?php echo Form::label('Phone','Phone',['class' => 'control-label']); ?>

								<?php echo Form::text('Update_Phone','',['id' =>'Update_Phone','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

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

<!-- FORM ADD -->
<div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>	
            </div>
             <?php echo Form::open(['id'=>'form_add','route'=>'B_user.store','method'=>'POST']); ?>

                        
            <div class="modal-body">
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						<?php echo Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Nhập Email đăng kí','required' => 'true']); ?>

							</div>
					</div>
					<div class="form-group ic-cmp-int">
							<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
						<div class="nk-int-st">
								<input id="Password" type="Password" class="form-control" placeholder = "Nhập mật khẩu" name="Password" required>
							</div>
					</div>
					
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						<?php echo Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Nhập địa chỉ','required' => 'true']); ?>

					</div>
				</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						<?php echo Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Nhập tên chủ khoản', 'required' => 'true']); ?>

					</div>
				</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						<?php echo Form::text('Phone','',['id' =>'Phone','class' => 'form-control','placeholder' => 'Nhập số điện thoại', 'required' => 'true']); ?>

					</div>						
				</div>                             
            </div>
            <div class="modal-footer">
                
                <button class="btn btn-default " type="submit">Save changes</button>
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

		// show thông tin tài khoản
		var url = null;
		$('.btn-edit').click(function(){
			 url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				//dataType:'json',
				url : url,
				success:function(response){
					$('#Update_Id').val(response.data[0].user_id);
					$('#Update_Password').val(response.data[0].password);
					$('#Update_Address').val(response.data[0].address);
					$('#Update_Name').val(response.data[0].name)
					$('#Update_Email').val(response.data[0].email);
					$('#Update_Phone').val(response.data[0].phone);
					
				},
				error:function(eror){
					alert('Đã có lỗi xảy ra !!!');
				}
			});
		});


		$('.btn-destroy').click(function(){
			var url = $(this).attr('data-url');
			
			if(confirm('Bạn có chắc chắn muốn xóa ?'))
			{
				$.ajax({
				type:'DELETE',
				url:url,
				//data:{id:id},
				//dataType:'html',
				success:function(response){
					$('#tbData').load(' #tbData');
					alert(response);					
					

				},
				error:function(eror){
					console.log(eror);
				}
				});
			}
		});

		//var url2 = $('.btn-edit').attr('data-url');
		$('#form_update').on('submit',function(e){
			e.preventDefault();
			//var url = document.getElementById('id');
			var id = $('#Update_Id').val();
			$.ajax({
				type:'PUT',
				url:url,
				data:$('#form_update').serialize(),							
				success:function(data){
					alert(data);
					$('#ModalUpdate').modal('hide');
					$('#tbData').load(' #tbData');					
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