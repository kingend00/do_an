@extends('Layout.admin.master')
@section('title')
	Danh mục bàn
@stop
@section('body')
<div class="container">
	<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn" style="padding-bottom: 20px">
										<h2>Danh mục bàn</h2>
										<button type="button" class="btn btn-danger btn-add" data-toggle="modal" data-target="#ModalAdd" >Thêm</button>	<br>								
									</div>
								</div>
							</div>
						</div>
	@if (isset($val))
			@foreach ($val as $element)
				<a href="{{ route('Seat.showType',$element->type) }}"><button class="btn btn-submit">{{ $element->type }}</button></a>
			@endforeach
			<a href="{{ route('Seat.showType','All') }}"><button class="btn btn-danger">Show All</button></a>
		@endif
	
	<div class="bsc-tbl-hvr">
		<table class=" table table-hover" id="tbData">
			<th>Loại bàn</th>
			<th>Số bàn</th>
			<th colspan="2">Thao tác</th>
			@if (isset($data))
				@foreach ($data as $element)
					<tr>
						<td>{{ $element->type }}</td>
						<td>{{ $element->number }}</td>
						<td><button type="button" class="btn btn-danger btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('seat.show',$element->id) }}" >Edit</button></td>
						<td><button type="button" class="btn btn-danger btn-destroy" value="{{$element->id }}">Xóa</button></td>
					</tr>
				@endforeach
			@endif
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
							{!! Form::hidden('Id','',['id' =>'Id']) !!}
						</div>
						<div class="form-control">
							{!! Form::label('Type','Type',['class' => 'control-label']) !!}
							<select id="Type" name="Type">
								@if (isset($val))
									@foreach ($val as $element)
									<option value="{{ $element->type }}">{{ $element->type }}</option>	
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							{!! Form::label('Number','Number',['class' => 'control-label']) !!}
							{!! Form::text('Number','',['id' =>'Number','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
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
             {!! Form::open(['id'=>'form_add','route'=>'seat.store','method'=>'POST'])!!}
             
             
            <div class="modal-body">

						<div class="form-group">
							{!! Form::label('Type','Type',['class' => 'control-label']) !!}
							{!! Form::text('Type','',['id' =>'Type','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Number','Number',['class' => 'control-label']) !!}
							{!! Form::text('Number','',['id' =>'Number','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
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
		$('.btn-edit').click(function(){
			var url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				url : url,
				success:function(response){
					$('#Id').val(response.data.id);
					//$('#Type').val(response.data.type);
					$('#Number').val(response.data.number);
					
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
				url:'/seat/'+id,
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
			var id = $(this).val();
			
			if(confirm('Bạn có chắc chắn muốn xóa ?'))
			{
				$.ajax({
				type:'DELETE',
				url:'/seat/'+id,
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
	});

		
</script>

@stop