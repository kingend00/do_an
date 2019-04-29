@extends('Layout.admin.master')
@section('title')
	Nhân viên
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
										<h2>Tài khoản Nhân viên</h2>
										<button type="button" class="btn btn-danger btn-add" data-toggle="modal" data-target="#ModalAdd" >Thêm</button>
										
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
			
			@if(isset($data))
				@foreach ($data as $value)
				<tr>
					<td> {{$value->email}} </td>
					<td> {{$value->name}} </td>
					<td> {{$value->phone}} </td>
					<td> {{$value->address}} </td>
					<td> <button type="button" class="btn btn-danger btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('B_user.show',$value->user_id) }}" >Edit</button></td>
					<td> <button type="button" class="btn btn-danger btn-destroy" value="{{$value->user_id }}">Xóa</button></td>

				</tr>
				@endforeach
			@endif
			
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
             {!! Form::open(['id'=>'form_update','method'=>'POST'])!!}
             
             {{ method_field('PUT') }}
            <div class="modal-body">
            			<div class="form-group">
							
							{!! Form::hidden('Update_Id','',['id' =>'Update_Id','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
								{!! Form::label('Email','Email',['class' => 'control-label']) !!}
								{!! Form::text('Update_Email','',['id' =>'Update_Email','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('hihi','Password',['class' => 'control-label']) !!}
								{!! Form::text('Update_Password','',['id' =>'Update_Password','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('Address','Address',['class' => 'control-label']) !!}
								{!! Form::text('Update_Address','',['id' =>'Update_Address','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('Name','Name',['class' => 'control-label']) !!}
								{!! Form::text('Update_Name','',['id' =>'Update_Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
							</div>
							
							<div class="form-group">
								{!! Form::label('Phone','Phone',['class' => 'control-label']) !!}
								{!! Form::text('Update_Phone','',['id' =>'Update_Phone','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
							</div>
						
				                                 
            </div>
            <div class="modal-footer">
                {{-- {!!  Form::submit('Save changes',null,['name' => 'hihi','class'=>'btn btn-default waves-effect']) !!} --}}
			<button class="btn btn-default " type="submit">Save</button>
			<button class="btn btn-default " class="test">Click</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
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
             {!! Form::open(['id'=>'form_add','route'=>'B_user.store','method'=>'POST'])!!}
                        
            <div class="modal-body">
					<div class="form-group">
						{!! Form::label('Email','Email',['class' => 'control-label']) !!}
						{!! Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('hihi','Password',['class' => 'control-label']) !!}
						{!! Form::text('Password','',['id' =>'Password','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('Address','Address',['class' => 'control-label']) !!}
						{!! Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('Name','Name',['class' => 'control-label']) !!}
						{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Phone','Phone',['class' => 'control-label']) !!}
						{!! Form::text('Phone','',['id' =>'Phone','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
					</div>						
				                                 
            </div>
            <div class="modal-footer">
                {{-- {!!  Form::submit('Save changes',null,['name' => 'hihi','class'=>'btn btn-default waves-effect']) !!} --}}
                <button class="btn btn-default " type="submit">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
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
					console.log(eror);
				}
			});
		});
		$('.test').click(function(){
			var hihi = $('#Update_Name').val();
			alert('hihi');
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
					console.log(data);
					

				},
				error:function(er){
					console.log(er);
				}

			});
		});

	});
</script>

@stop