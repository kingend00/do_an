@extends('Layout.admin.master')
@section('title')
	Quản lý
@stop
@section('body')
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
			<th>Email</th>
			<th>Password</th>
			<th>Tên chủ khoản</th>			
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Quyền</th>
			<th>Thao tác</th>
		</tr>
		</thead>
		<tbody>
			
			@if(isset($data))
				@foreach ($data as $value)
				<tr>
					<td> {{$value->email}} </td>
					<td> {{$value->password}} </td>
					<td> {{$value->name}} </td>					
					<td> {{$value->phone}} </td>
					<td> {{$value->address}} </td>
					<td> {{$value->roles}} </td>
					<td> <button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('B_user.show',$value->user_id) }}" ><i class = "glyphicon glyphicon-cog"></i> Edit</button>
					 <button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="{{ route('B_user.destroy',$value->user_id) }}"><i class="notika-icon notika-close"></i> Xóa</button></td>
				</tr>
				@endforeach
			@endif
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
             {!! Form::open(['id'=>'form_update','method'=>'POST'])!!}
             
             {{ method_field('PUT') }}
            <div class="modal-body">
            			<div class="form-group">
							{!! Form::hidden('Id','',['id' =>'Id']) !!}
						</div>
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
								
								<div class="form-ic-cmp"><i class="notika-icon notika-map"></i></div>
									<div class="nk-int-st">
								{!! Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Nhập địa chỉ','required' => 'true']) !!}
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
<!-- End MODAL UPDATE -->
<div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             {!! Form::open(['id'=>'form_add','route'=>'B_user.store','method'=>'POST'])!!}
             
             
            <div class="modal-body">
						<input type="hidden" name="Roles" id="Roles" class="Roles" value="2">
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
								
								<div class="form-ic-cmp"><i class="notika-icon notika-map"></i></div>
									<div class="nk-int-st">
								{!! Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Nhập địa chỉ','required' => 'true']) !!}
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
<script type="text/javascript">
	var url = null;
		// show thông tin tài khoản
		$('.btn-edit').click(function(){
			 url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				//dataType:'json',
				url : url,
				success:function(response){
					$('#Id').val(response.data[0].id);
					$('#Password').val(response.data[0].password);
					$('#Address').val(response.data[0].address);
					$('#Name').val(response.data[0].name);
					$('#Email').val(response.data[0].email);
					$('#Phone').val(response.data[0].phone);
					
				},
				error:function(eror){
					console.log(eror);
				}
			});
		});
	$(document).ready(function(){
		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});
			$("#tbData").DataTable();
			


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


@stop