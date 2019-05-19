<?php $__env->startSection('title'); ?>
	Danh mục bàn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container">
	<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn" style="padding-bottom: 20px">
										<h2>Danh mục bàn</h2>
									<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" data-url = "<?php echo e(route('B_Seat.AutoIncrement')); ?>" ><i class="notika-icon notika-checked"></i> Thêm</button></button><br>								
									</div>
								</div>
							</div>
						</div>

	
	
		<div class="table-responsive">
		<table class="table table-striped" id="tbData" >
			<thead>
				<th>Số bàn</th>
				<th>Loại bàn</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</thead>
			
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
							<?php echo Form::hidden('Id','',['id' =>'Id']); ?>

						</div>
						<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp"><?php echo Form::label('Type','Type',['class' => 'control-label']); ?></div>
							<select id="Type" name="Type">
								<?php if(isset($val)): ?>
									<?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($element->type); ?>"><?php echo e($element->type); ?></option>	
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</select>
						</div>

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp"><?php echo Form::label('Number','Number',['class' => 'control-label']); ?></div>
									<div class="nk-int-st">
										<?php echo Form::text('Number','',['id' =>'Number','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

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


<div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             <?php echo Form::open(['id'=>'form_add','route'=>'B_seat.store','method'=>'POST']); ?>

             
             
            <div class="modal-body">

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp"><?php echo Form::label('Number','Type',['class' => 'control-label']); ?></div>
								<div class="nk-int-st">
									<?php echo Form::text('Type','',['id' =>'Type','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

									
								</div>
						</div>
						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp"><?php echo Form::label('Number','Number',['class' => 'control-label']); ?></div>
									<div class="nk-int-st">
											<?php echo Form::text('NumberAdd','',['id' =>'NumberAdd','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true','readonly' => 'true']); ?>

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
				ajax:'<?php echo route('B_seat.getData',$type); ?>',
				columns :[
					{data:'number_seat'},
					{data:'type'},
					{data:'btn-edit'},
					{data:'btn-destroy'}
				]
			});

		var url = null;
		$(document).on('click','.btn-edit',function(){
			url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				url : url,
				success:function(response){
					$('#Type').val(response.data[0].type);
					//$('#Type').val(response.data.type);
					$('#Number').val(response.data[0].number_seat);
					console.log($('#Type').val());
					console.log($('#Number').val());
					$('select').selectpicker('refresh');
					

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
					//console.log(data);
					$('#ModalUpdate').modal('hide');
					alert('Cập nhật thành công');
					$('#tbData').DataTable().ajax.reload();				
				},
				error:function(er){
					console.log(er);
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
				
				success:function(response){
					alert(response);
					$('#tbData').DataTable().ajax.reload();	

				},
				error:function(eror){
					console.log(eror);
				}
				});
			}
			
			
		});
		
		$('.btn-add').click(function(){
			var url = $(this).attr('data-url');
			$.ajax({
				type:'GET',
				url:url,
				success:function(response){
					var val = response.data[0].number_seat;
					val = val+1;
					$('#NumberAdd').val(val);
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