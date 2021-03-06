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
										<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" ><i class="notika-icon notika-checked"></i> Thêm</button>
										
									</div>
								</div>
							</div>
						</div>
	
	<div class="table-responsive">
		<table class="table table-striped" id="tbData" >
		<thead>
			<tr>
			<th></th>
			<th>Email</th>
			<th>Tên chủ khoản</th>			
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		</thead>
		


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
						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
									<div class="nk-int-st">
							
								<input type="text" id="Update_Email" name="Update_Email" class="form-control"  readonly required>
									</div>
							</div>
							<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp"><i class="notika-icon notika-edit"></i></div>
								<div class="nk-int-st">
										<input id="Update_Password" type="Password" class="form-control" placeholder = "Nhập mật khẩu" name="Update_Password" required>
									</div>
							</div>
							
							<div class="form-group ic-cmp-int">
								
								<div class="form-ic-cmp"><i class="notika-icon notika-map"></i></div>
									<div class="nk-int-st">
								<?php echo Form::text('Update_Address','',['id' =>'Update_Address','class' => 'form-control','placeholder' => 'Nhập địa chỉ','required' => 'true']); ?>

							</div>
						</div>
							<div class="form-group ic-cmp-int">
								
								<div class="form-ic-cmp"><i class="notika-icon notika-support"></i></div>
									<div class="nk-int-st">
								<?php echo Form::text('Update_Name','',['id' =>'Update_Name','class' => 'form-control','placeholder' => 'Nhập tên chủ khoản', 'required' => 'true']); ?>

							</div>
						</div>
							<div class="form-group ic-cmp-int">
								
								<div class="form-ic-cmp"><i class="notika-icon notika-phone"></i></div>
									<div class="nk-int-st">
								<?php echo Form::text('Update_Phone','',['id' =>'Update_Phone','class' => 'form-control','placeholder' => 'Nhập số điện thoại', 'required' => 'true']); ?>

							</div>						
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
						<input type="hidden" name="Roles" id="Roles" class="Roles" value="2">
						<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
									<div class="nk-int-st">
								<?php echo Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Nhập Email đăng kí','required' => 'true']); ?>

									</div>
							</div>
							<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp"><i class="notika-icon notika-edit"></i></div>
								<div class="nk-int-st">
										<input id="Password" type="Password" class="form-control" placeholder = "Nhập mật khẩu" name="Password" required>
									</div>
							</div>
							
							<div class="form-group ic-cmp-int">
								
								<div class="form-ic-cmp"><i class="notika-icon notika-map"></i></div>
									<div class="nk-int-st">
								<?php echo Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Nhập địa chỉ','required' => 'true']); ?>

							</div>
						</div>
							<div class="form-group ic-cmp-int">
								
								<div class="form-ic-cmp"><i class="notika-icon notika-support"></i></div>
									<div class="nk-int-st">
								<?php echo Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Nhập tên chủ khoản', 'required' => 'true']); ?>

							</div>
						</div>
							<div class="form-group ic-cmp-int">
								
								<div class="form-ic-cmp"><i class="notika-icon notika-phone"></i></div>
									<div class="nk-int-st">
								<?php echo Form::text('Phone','',['id' =>'Phone','class' => 'form-control','placeholder' => 'Nhập số điện thoại', 'required' => 'true']); ?>

							</div>						
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
			$('#tbData').DataTable({
				processing: true,
        		serverSide: true,
				ajax:'<?php echo route('B_user.getData',2); ?>',
				columns :[
					{data:'user_id',"visible": false,
                "searchable": false},
					{data:'email'},
					{data:'name'},
					{data:'phone'},
					{data:'address'},
					{data:'btn-edit'},
					{data:'btn-destroy'}
				]
			});
			

			var url = null;
		// show thông tin tài khoản
		$(document).on('click','.btn-edit',function(){
			 url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				//dataType:'json',
				url : url,
				success:function(response){
					$('#Id').val(response.data[0].id);
					$('#Update_Password').val(response.data[0].password);
					$('#Update_Address').val(response.data[0].address);
					$('#Update_Name').val(response.data[0].name);
					$('#Update_Email').val(response.data[0].email);
					$('#Update_Phone').val(response.data[0].phone);
					
				},
				error:function(eror){
					console.log(eror);
				}
			});
		});
		$(document).on('click','.btn-destroy',function(){
			var url = $(this).attr('data-url');
			
			if(confirm('Bạn có chắc chắn muốn xóa ?'))
			{
				$.ajax({
				type:'DELETE',
				url:url,
				//data:{id:id},
				dataType:'html',
				success:function(response){
					Mynotify(response,'success');
					$('#tbData').DataTable().ajax.reload();	

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
					Mynotify('Cập nhật thành công','success');
					$('#ModalUpdate').modal('hide');
					
					$('#tbData').DataTable().ajax.reload();	
					//
					

				},
				error:function(er){
					var errors = er.responseJSON;
							var errorShow = '';
							$.each(errors.errors,function(key,value){
								errorShow += value;
							});
							alert(errorShow);
				}

			});
		});

	});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>