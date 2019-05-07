@extends('Layout.admin.master')
@section('title')
	Đơn đặt bàn
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
										<h2>Quản lý đơn đặt bàn</h2>
										<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" ><i class="notika-icon notika-checked"></i> Thêm</button>
										
									</div>
								</div>
							</div>
						</div>
	
	<div class="bsc-tbl-hvr">
		<table class=" table table-hover" id="tbData">
		<thead>
			<tr>
            <th>Số đơn</th>
             <th>Số bàn</th>
			<th>Email</th>
			<th>Tên khách hàng</th>			
			<th>Số điện thoại</th>
            <th>Ngày đặt</th>
            <th>Thời gian đặt</th>
            <th>Trạng thái</th>
            <th>Tổng tiền </th>
			<th colspan="2">Thao tác</th>
		</tr>
		</thead>
		<tbody>
			
			@if(isset($data))
				@foreach ($data as $value)
				<tr>
                    <td> {{$value->booktable_id}} </td>
					<td> {{$value->number_seat}} </td>
					<td> {{$value->email}} </td>
					<td> {{$value->name}} </td>
                    <td> {{$value->phone}} </td>
                    <td> {{$value->date}} </td>
                    <td> {{$value->time}} </td>
                    <td> {{$value->status}} </td>
                    <td> {{$value->total}} </td>
                <td> <button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('B_booktable.show',$value->booktable_id) }}" ><i class = "glyphicon glyphicon-cog"></i> Cập nhật</button></td>
					<td> <button type="button" class="btn btn-danger danger-icon-notika btn-details" data-url="{{ route('B_booktable.edit',$value->booktable_id) }}" ><i class="notika-icon notika-close"></i>  Chi tiết</button></td>
				<td><a href="{{ route('B_booktable.showDetails',$value->booktable_id) }}">Click</a></td>
				</tr>
                @endforeach
                <tr><td colspan = "10" align = "center">{{ $data->links() }}</td></tr>
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
							
							{!! Form::hidden('Update_Id','',['id' =>'Update_Id','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true','readonly' => 'true']) !!}
						</div>
						<div class="form-group">
								{!! Form::label('date','Ngày đặt',['class' => 'control-label']) !!}
								{!! Form::text('Update_Date','',['id' =>'Update_Date','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('hihi','Thời gian đặt',['class' => 'control-label']) !!}
								{!! Form::text('Update_Time','',['id' =>'Update_Time','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('status','Trạng thái',['class' => 'control-label']) !!}
								{!! Form::text('Update_Status','',['id' =>'Update_Status','class' => 'form-control','placeholder' => 'Enter here','required' => 'true']) !!}
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

<!-- FORM ADD -->
<div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>	
            </div>
             {!! Form::open(['id'=>'form_add','route'=>'B_booktable.store','method'=>'POST'])!!}
                        
            <div class="modal-body">
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						{!! Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Nhập Email đăng kí','required' => 'true']) !!}
							</div>
					</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						{!! Form::text('Password','',['id' =>'Password','class' => 'form-control','placeholder' => 'Nhập mật khẩu', 'required' => 'true']) !!}
					</div>
				</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						{!! Form::text('Address','',['id' =>'Address','class' => 'form-control','placeholder' => 'Nhập địa chỉ','required' => 'true']) !!}
					</div>
				</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Nhập tên chủ khoản', 'required' => 'true']) !!}
					</div>
				</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-mail"></i></div>
							<div class="nk-int-st">
						{!! Form::text('Phone','',['id' =>'Phone','class' => 'form-control','placeholder' => 'Nhập số điện thoại', 'required' => 'true']) !!}
					</div>						
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
					$('#Update_Id').val(response.data[0].booktable_id);
					$('#Update_Status').val(response.data[0].status);
					$('#Update_Date').val(response.data[0].date);
					$('#Update_Time').val(response.data[0].time)
					
				},
				error:function(eror){
					console.log(eror);
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
				//dataType:'html',
				success:function(response){
					$('#tbData').load(' #tbData');
					alert(response);					
					

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
					alert('Update thành công');
					$('#ModalUpdate').modal('hide');
					$('#tbData').load(' #tbData');
					

				},
				error:function(er){
					alert('Đã có lỗi xảy ra , vui lòng kiểm tra lại thông tin cần sửa');
				}

			});
		});

	});
</script>

@stop