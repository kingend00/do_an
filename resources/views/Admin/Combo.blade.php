@extends('Layout.admin.master')
@section('title')
	Combo
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
										<h2>Combo</h2>
										<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" ><i class="notika-icon notika-checked"></i> Thêm</button>
										
									</div>
								</div>
							</div>
						</div>
	
	<div class="table-responsive">
		<table class="table table-striped" id="tbData" >
		<thead>
			<tr>
			<th>Tên combo</th>
			<th>Giảm giá</th>
			<th>Loại</th>
			<th>Ảnh</th>
			<th>Giá</th>
			<th>Thao tác</th>
			
		</tr>
		</thead>
		<tbody>
			@if (isset($data))
				@foreach ($data as $element)
					<tr>
						<td> {{ $element->name }}</td>
						<td> {{ $element->discount }}</td>
						<td> {{ $element->type }}</td>
						<td> {{ $element->image}}</td>
						<td> {{ $element->price }}</td>
						<td><button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('B_combo.show',$element->combo_id) }}" ><i class = "glyphicon glyphicon-cog"></i> Edit</button>
						<button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="{{route('B_combo.destroy',$element->combo_id) }}"><i class="notika-icon notika-close"></i> Xóa</button>
						<button type="button" class="btn btn-danger danger-icon-notika btn-details" data-toggle="modal" data-target="#ModalDetails" data-url="{{route('B_combo.showDetails',$element->combo_id) }}"><i class="notika-icon notika-close"></i> Chi tiết </button></td>
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
						
							<div class="form-group ic-cmp-int">
						
									<div class="form-ic-cmp">{!! Form::label('Name','Tên combo',['class' => 'control-label']) !!}</div>
										<div class="nk-int-st">
												{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
											</div>
							</div>
							<div class="bootstrap-select">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Thành phần',['class' => 'control-label']) !!}</div>
                                <select id="Details" name="Details[]" multiple >
                                        @if (isset($val))
                                            @foreach ($val as $element)
                                            
                                            <option value="{{ $element->menu_id }}">{{ $element->name }}</option>	
                                            @endforeach
                                        @endif
                                    </select>
                        </div>
						
							<div class="form-group ic-cmp-int">
							
									<div class="form-ic-cmp">{!! Form::label('Name','Giảm giá',['class' => 'control-label']) !!}</div>
										<div class="nk-int-st">
												{!! Form::text('Discount','',['id' =>'Discount','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
							</div>
							</div>
	
							<div class="form-group ic-cmp-int">
							
									<div class="form-ic-cmp">{!! Form::label('Name','Loại',['class' => 'control-label']) !!}</div>
										<div class="nk-int-st">
											{!! Form::text('Type','',['id' =>'Type','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
											</div>
                            </div>
                            <div class="form-group ic-cmp-int">
							
									<div class="form-ic-cmp">{!! Form::label('Name','Ảnh',['class' => 'control-label']) !!}</div>
										<div class="nk-int-st">
											{!! Form::text('Image','',['id' =>'Image','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
											</div>
							</div>
						
						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Số lượng',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::text('Quantity','',['id' =>'Quantity','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
										</div>
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


<div class="modal fade" id="ModalDetails" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>	
            </div>
			<div class="modal-body" id="contentDetails">
				
			</div>                           
            
            <div class="modal-footer">
 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    	</div>
     </div>
</div>


<div class="modal fade " id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             {!! Form::open(['id'=>'form_add','route'=>'B_combo.store','method'=>'POST'])!!}                       
            <div class="modal-body">

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Tên combo',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::text('Name_Add','',['id' =>'Name_Add','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
										</div>
						</div>
                        <div class="bootstrap-select">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Thêm thành phần',['class' => 'control-label']) !!}</div>
                                <select id="Details_Add" name="Details_Add[]" multiple >
                                        @if (isset($val))
                                            @foreach ($val as $element)
                                            
                                            <option value="{{ $element->menu_id }}">{{ $element->name }}</option>	
                                            @endforeach
                                        @endif
                                    </select>
                        </div>
                        <div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Số lượng',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::text('Quantity_Add','',['id' =>'Quantity_Add','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						</div>
						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Giảm giá',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::text('Discount_Add','',['id' =>'Discount_Add','class' => 'form-control','placeholder' => 'Enter here']) !!}
						</div>
						</div>

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Loại',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
										{!! Form::text('Type_Add','',['id' =>'Type_Add','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
										</div>
                        </div>
                       


						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Ảnh',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::text('Image_Add','',['id' =>'Image_Add','class' => 'form-control','placeholder' => 'Enter here']) !!}
										</div>
                        </div>
                       
				                                 
            </div>
            <div class="modal-footer">
                {{-- {!!  Form::submit('Save changes',null,['name' => 'hihi','class'=>'btn btn-default waves-effect']) !!} --}}
                <button class="btn btn-default" type="submit">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



<script type="text/javascript">
	// show thông tin tài khoản
	var url = null;
		$('.btn-edit').click(function(){
			url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				//dataType:'json',
				url : url,
				success:function(response){
					var quantity = '';
					var id_menu = new Array();
					$.each(response,function(key,value){
						$.each(value,function(key2,value2){
							id_menu.push(value2.id_menu); 
							quantity += ","+value2.quantity;
						});
					});	
					var quantity2 = quantity.substring(1,quantity.lenght);
					
					
					$('#Id').val(response.data[0].combo_id);
					$('#Name').val(response.data[0].name);
					$('#Details').selectpicker('val',id_menu);
					$('#Discount').val(response.data[0].discount);
					$('#Type').val(response.data[0].type);
					$('#Image').val(response.data[0].image);
					$('#Quantity').val(quantity2);										
					
				},
				error:function(eror){
					console.log(eror);
				}
			});
		});
		$('.btn-details').click(function(){
			var url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				url :url,
				success:function(data)
				{
					//$('#contentDetails').load (' #contentDetails');
					$('#contentDetails').html(data);					
				},
				error:function(er)
				{
					console.log(er);
				}
			});
			
		});
	$(document).ready(function(){
		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});
        
		$('select').selectpicker();
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
				$('#tbData').load(' #tbData');
			}
		});


		$('#form_update').on('submit',function(e){
			e.preventDefault();
			//var url = document.getElementById('id');
			
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

@stop