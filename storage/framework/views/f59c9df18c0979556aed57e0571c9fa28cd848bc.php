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
									<button type="button" class="btn btn-danger btn-add" data-toggle="modal" data-target="#ModalAdd" data-url = "<?php echo e(route('B_Seat.AutoIncrement')); ?>" >Thêm</button>	<br>								
									</div>
								</div>
							</div>
						</div>
	<?php if(isset($val)): ?>
			<?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a href="<?php echo e(route('B_seat.showType',$element->type)); ?>"><button class="btn btn-submit"><?php echo e($element->type); ?></button></a>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<a href="<?php echo e(route('B_seat.showType','All')); ?>"><button class="btn btn-danger">Show All</button></a>
		<?php endif; ?>
	
	<div class="bsc-tbl-hvr">
		<table class=" table table-hover" id="tbData">
			<th>Số bàn</th>
			<th>Loại bàn</th>
			<th colspan="2">Thao tác</th>
			<?php if(isset($data)): ?>
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($element->number_seat); ?></td>
						<td><?php echo e($element->type); ?></td>
						<td><button type="button" class="btn btn-danger btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="<?php echo e(route('B_seat.show',$element->number_seat)); ?>" >Edit</button></td>
						<td><button type="button" class="btn btn-danger btn-destroy" data-url="<?php echo e(route('B_seat.destroy',$element->number_seat)); ?>"">Xóa</button></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
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
						<div class="form-control">
							<?php echo Form::label('Type','Type',['class' => 'control-label']); ?>

							<select id="Type" name="Type">
								<?php if(isset($val)): ?>
									<?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($element->type); ?>"><?php echo e($element->type); ?></option>	
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</select>
						</div>
						<div class="form-group">
							<?php echo Form::label('Number','Number',['class' => 'control-label']); ?>

							<?php echo Form::text('Number','',['id' =>'Number','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

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

						<div class="form-group">
							<?php echo Form::label('Type','Type',['class' => 'control-label']); ?>

							<?php echo Form::text('Type','',['id' =>'Type','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']); ?>

						</div>
						<div class="form-group">
							<?php echo Form::label('Number','Number',['class' => 'control-label']); ?>

							<?php echo Form::text('NumberAdd','',['id' =>'NumberAdd','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true','readonly' => 'true']); ?>

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


/*		$('.cb').click(function(){
			var vl = $(this).val();
			$.ajax({
				type:'GET',
				url: '/seat/showType/'+vl,
				
				success:function(response){
					var data = response;
					var giatri = '<table class=" table table-hover" id="tbData" >';
						giatri += '<th>Loại bàn </th>';
						giatri += '<th>Số bàn </th>';
						giatri += '<th colspan = "2"> Thao tác</th>';
					$.each(data,function(index,value){
						$.each(value,function(index2,value2){
							
							giatri += '<tr>';
							giatri += '<td>'+value2.type+'</td>';
							giatri += '<td>'+value2.number+'</td>';
							giatri += '<td> <button type="button" class="btn btn-danger btn-destroy" value='+value2.id+'>Xóa</button></td>';
							giatri += '<td><button type="button" class="btn btn-danger btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="/seat/'+value2.id+'">Edit</button></td>'; 
							giatri += '</tr>';
							
						});
					});
					giatri += '</table>';
					$('.bsc-tbl-hvr').html(giatri);
					//$('#tbData').load(' #tbData');
					
				},
				error:function(error){
					console.log(error);
				}
			});
		});*/
		var url = null;
		$('.btn-edit').click(function(){
			 url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				url : url,
				success:function(response){
					$('#Id').val(response.data[0].type);
					//$('#Type').val(response.data.type);
					$('#Number').val(response.data[0].number_seat);
					
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
					console.log(data);

					$('#ModalUpdate').modal('hide');
					alert('Cập nhật thành công');
					$('#tbData').load(' #tbData');
					//
					

				},
				error:function(er){
					console.log(er);
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