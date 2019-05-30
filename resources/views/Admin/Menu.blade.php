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
			<th>Tên món</th>
			<th>Mô tả</th>
			<th>giá</th>
			<th>Loại món</th>
			<th>Ảnh hiển thị</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
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
             {!! Form::open(['id'=>'form_update','route'=>'B_menu.updateMenu','method'=>'POST','files'=>true])!!}
             
             
            <div class="modal-body">
            			<div class="form-group">
							{!! Form::hidden('Id','',['id' =>'Id','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						
							<div class="form-group ic-cmp-int">
						
									<div class="form-ic-cmp">{!! Form::label('Name','Name',['class' => 'control-label']) !!}</div>
										<div class="nk-int-st">
												{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
											</div>
							</div>
						
							<div class="form-group ic-cmp-int">
							
									<div class="form-ic-cmp">{!! Form::label('Name','Description',['class' => 'control-label']) !!}</div>
										<div class="nk-int-st">
												{!! Form::text('Description','',['id' =>'Description','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
							</div>
							</div>
	
							<div class="form-group ic-cmp-int">
							
									<div class="form-ic-cmp">{!! Form::label('Name','Price',['class' => 'control-label']) !!}</div>
										<div class="nk-int-st">
											{!! Form::text('Price','',['id' =>'Price','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
											</div>
							</div>
						<div class="form-group">
							{!! Form::label('category_id','Danh mục',['class' => 'control-label']) !!}
							<select id="Category_id" name="Category_id">
								@if (isset($nameMenushareAll))
									@foreach ($nameMenushareAll as $element)
									<option value="{{ $element->category_id }}">{{ $element->name }}</option>	
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Image',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::file('Image','',['id' =>'Image','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
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
<div class="modal fade " id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             {!! Form::open(['id'=>'form_add','route'=>'B_menu.store','method'=>'POST','files' => true])!!}                       
            <div class="modal-body">

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Name',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::text('Name_Add','',['id' =>'Name_Add','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
										</div>
						</div>
					
						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Description',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::text('Description_Add','',['id' =>'Description_Add','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
						</div>
						</div>

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Price',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
										{!! Form::text('Price_Add','',['id' =>'Price_Add','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
										</div>
						</div>

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Category',['class' => 'control-label']) !!}</div>
								<select name="Category_id_Add" id="Category_id_Add">
								@foreach (\App\Model\M_Category::all() as $item)
								<option value="{{ $item->category_id }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group ic-cmp-int">
						
								<div class="form-ic-cmp">{!! Form::label('Name','Image',['class' => 'control-label']) !!}</div>
									<div class="nk-int-st">
											{!! Form::file('Image_Add','',['id' =>'Image_Add','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
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
	
	$(document).ready(function(){
		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});
		$('select').selectpicker();
		$('#tbData').DataTable({
				processing: true,
        		serverSide: true,
				ajax:'{!!  route('B_menu.getData',$category_id) !!}',
				columns :[
					{data:'menu_id',"visible": false,
                "searchable": false},
					{data:'name'},
					{data:'description'},
					{data:'price'},
					{data:'category_name'},
					{data:'image'},
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
					$('#Id').val(response.data[0].menu_id);
					$('#Name').val(response.data[0].name);
					$('#Description').val(response.data[0].description);
					$('#Price').val(response.data[0].price);
					$('#Category_id').val(response.data[0].category_id);
					$('#Image').val(response.data[0].image);
					$('select').selectpicker('refresh');					
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
					alert(response);
					$('#tbData').DataTable().ajax.reload();	

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