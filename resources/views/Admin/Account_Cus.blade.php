@extends('Layout.admin.master')
@section('title')
	Khách hàng
@stop
@section('body')
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
	
 <div class="table-responsive">
		<table class="table table-striped" id="tbData" >
		<thead>
			<tr>
			<th></th>
			<th>Email</th>
			<th>Tên chủ khoản</th>		
			<th>Số điện thoại</th>
			<th>Điểm</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		</thead>
		
	</table>
<div class="modal fade" id="ModalUpdate" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             {!! Form::open(['id'=>'form_update','method'=>'POST'])!!}
             
             {{ method_field('PUT') }}
            <div class="modal-body">
            			<div class="form-group">
							{!! Form::hidden('Id','',['id' =>'Id']) !!}
						</div>
						<div class="form-group ic-cmp-int">
									
								<div class="form-ic-cmp"><i class="notika-icon notika-edit"></i></div>
									<div class="nk-int-st">
											<input id="resetPassword" type="Password" class="form-control" placeholder = "Nhập mật khẩu" name="resetPassword" required>
							</div>						
						</div> 
				                                 
            </div>
            <div class="modal-footer">
                {{-- {!!  Form::submit('Save changes',null,['name' => 'hihi','class'=>'btn btn-default waves-effect']) !!} --}}
                <button class="btn btn-default " type="submit">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
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
             {!! Form::open(['id'=>'form_add','route'=>'B_user.store','method'=>'POST'])!!}
             
             
            <div class="modal-body">
						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
									<div class="nk-int-st">
								{!! Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Nhập Email đăng kí','required' => 'true']) !!}
									</div>
							</div>
							<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp"><i class="notika-icon notika-edit"></i></div>
								<div class="nk-int-st">
										<input id="Password" type="Password" class="form-control" placeholder = "Nhập mật khẩu" name="Password" required>
									</div>
							</div>
							<div class="form-group ic-cmp-int">
						
									<div class="form-ic-cmp"><i class="notika-icon notika-support"></i></div>
										<div class="nk-int-st">
									{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Nhập tên chủ khoản', 'required' => 'true']) !!}
								</div>
							</div>
								<div class="form-group ic-cmp-int">
									
									<div class="form-ic-cmp"><i class="notika-icon notika-phone"></i></div>
										<div class="nk-int-st">
									{!! Form::text('Phone','',['id' =>'Phone','class' => 'form-control','placeholder' => 'Nhập số điện thoại', 'required' => 'true']) !!}
								</div>						
							</div>  
				                                 
            </div>
            <div class="modal-footer">
                {{-- {!!  Form::submit('Save changes',null,['name' => 'hihi','class'=>'btn btn-default waves-effect']) !!} --}}
                <button class="btn btn-default " type="submit">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
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
			$('#tbData').DataTable({
				processing: true,
        		serverSide: true,
				ajax:'{!!  route('B_user.getData',4) !!}',
				columns :[
					{data:'user_id',"visible": false,
                "searchable": false},
					{data:'email'},
					{data:'name'},
					{data:'phone'},
					{data:'point'},
					{data:'btn-edit'},
					{data:'btn-destroy'}
				]
			});
			var url = null;
			$(document).on('click','.btn-edit',function(){
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
			//var id = $('#Id').val();
			$.ajax({
				type:'PUT',
				url:url,
				data:$('#form_update').serialize(),
				
				
				success:function(data){

						$('#ModalUpdate').modal('hide');
						Mynotify('Reset Password thành công','success');
						$('#tbData').DataTable().ajax.reload();	
				},
				error:function(er){
					console.log(er);
				}

			});
		});
		
	});
</script>

@stop