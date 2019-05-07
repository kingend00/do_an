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
									<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" data-url = "{{ route('B_Seat.AutoIncrement') }}" ><i class="notika-icon notika-checked"></i> Thêm</button></button><br>								
									</div>
								</div>
							</div>
						</div>
	@if (isset($val))
			@foreach ($val as $element)
				<a href="{{ route('B_seat.showType',$element->type) }}"><button class="btn btn-submit">{{ $element->type }}</button></a>
			@endforeach
			<a href="{{ route('B_seat.showType','All') }}"><button class="btn btn-submit">Show All</button></a>
		@endif
	
	<div class="data-table-list">
		<div class="table-responsive">
		<table class="table table-striped" id="tbData" >
			<thead>
				<th>Số bàn</th>
				<th>Loại bàn</th>
				<th colspan="2" align = "center">Thao tác</th>
			</thead>
			<tbody>
				@if (isset($data))
					@foreach ($data as $element)
						<tr>
							<td>{{ $element->number_seat }}</td>
							<td>{{ $element->type }}</td>
							<td><button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('B_seat.show',$element->number_seat) }}"><i class = "glyphicon glyphicon-cog"></i> Sửa</button></button></td>
							<td><button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="{{ route('B_seat.destroy',$element->number_seat) }}""><i class="notika-icon notika-close"></i> Xóa</button></td>
						</tr>
					@endforeach
					<tr><td colspan = "4" align = "center">{{ $data->links() }}</td></tr>
				@endif
			</tbody>
		</table>
		</div>
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
             {!! Form::open(['id'=>'form_add','route'=>'B_seat.store','method'=>'POST'])!!}
             
             
            <div class="modal-body">

						<div class="form-group">
							{!! Form::label('Type','Type',['class' => 'control-label']) !!}
							{!! Form::text('Type','',['id' =>'Type','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('Number','Number',['class' => 'control-label']) !!}
							{!! Form::text('NumberAdd','',['id' =>'NumberAdd','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true','readonly' => 'true']) !!}
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
				$('#tbData').load(' #tbData');
			}
			else
			{
				alert('Bạn đã hủy');
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

@stop