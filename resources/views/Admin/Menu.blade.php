@extends('Layout.admin.master')
@section('title')
	Thực đơn
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
										<h2>Thực đơn</h2>
										<button type="button" class="btn btn-danger btn-add" data-toggle="modal" data-target="#ModalAdd">Thêm</button>
										
									</div>
								</div>
							</div>
						</div>
	
	<div class="bsc-tbl-hvr">
		<table class=" table table-hover" id="tbData" >
		<thead>
			<tr>
			<th>Tên món</th>
			<th>Mô tả</th>
			<th>giá</th>
			<th>Loại món</th>
			<th>Ảnh hiển thị</th>
			
		</tr>
		</thead>
		<tbody>
			@if (isset($menu))
				@foreach ($menu as $element)
					<tr>
						<td> {{ $element->name }}</td>
						<td> {{ $element->description }}</td>
						<td> {{ $element->price }}</td>
						<td> {{ $element->type }}</td>
						<td> {{ $element->image }}</td>
						<td><button type="button" class="btn btn-danger btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('menu.show',$element->id) }}" >Edit</button></td>
						<td><button type="button" class="btn btn-danger btn-destroy" value="{{$element->id }}">Xóa</button></td>
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
							{!! Form::hidden('Id','',['id' =>'Id','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						<div class="form-group">
							{!! Form::label('Name','Name',['class' => 'control-label']) !!}
							{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Description','Description',['class' => 'control-label']) !!}
							{!! Form::text('Description','',['id' =>'Description','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Price','Price',['class' => 'control-label']) !!}
							{!! Form::text('Price','',['id' =>'Price','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Type','Type',['class' => 'control-label']) !!}
							{!! Form::text('Type','',['id' =>'Type','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Image','Image',['class' => 'control-label']) !!}
							{!! Form::text('Image','',['id' =>'Image','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             {!! Form::open(['id'=>'form_add','route'=>'menu.store','method'=>'POST'])!!}                       
            <div class="modal-body">

						<div class="form-group">
							{!! Form::label('Name','Name',['class' => 'control-label']) !!}
							{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Description','Description',['class' => 'control-label']) !!}
							{!! Form::text('Description','',['id' =>'Description','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Price','Price',['class' => 'control-label']) !!}
							{!! Form::text('Price','',['id' =>'Price','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Type','Type',['class' => 'control-label']) !!}
							{!! Form::text('Type','',['id' =>'Type','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Image','Image',['class' => 'control-label']) !!}
							{!! Form::text('Image','',['id' =>'Image','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
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
	
	$(document).ready(function(){
		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});

		// show thông tin tài khoản
		$('.btn-edit').click(function(){
			var url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				//dataType:'json',
				url : url,
				success:function(response){
					$('#Id').val(response.data.id);
					$('#Name').val(response.data.name);
					$('#Description').val(response.data.description);
					$('#Price').val(response.data.price);
					$('#Type').val(response.data.type);
					$('#Image').val(response.data.image);					
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
				url:'/menu/'+id,
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
				url:'/menu/'+id,
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