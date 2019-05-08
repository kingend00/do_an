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
	
	<div class="table-responsive">
			<table class="table table-striped" id="tbData" >
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
			<th>Thao tác</th>
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
                <td> <button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route('B_booktable.show',$value->booktable_id) }}" ><i class = "glyphicon glyphicon-cog"></i> Cập nhật</button>
					<button type="button" class="btn btn-danger danger-icon-notika btn-details" data-toggle="modal" data-target="#ModalDetails"  data-url = "{{ route('B_booktable.showDetails',$value->booktable_id) }}"><i class="notika-icon notika-close"></i>  Chi tiết</button></td>

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
							
							{!! Form::hidden('Update_Id','',['id' =>'Update_Id','class' => 'form-control', 'required' => 'true','readonly' => 'true']) !!}
						</div>
						<div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
						
								<div class="form-ic-cmp">Ngày đặt</div>
									<div class="input-group date nk-int-st">
									<span class="input-group-addon"></span>
								{!! Form::text('Update_Date','',['id' =>'Update_Date','class' => 'form-control Date','placeholder' => 'Nhập Date', 'required' => 'true']) !!}
							</div>
						</div>
							
								{!! Form::label('hihi','Thời gian đặt',['class' => 'control-label']) !!}
								
                                    <select id = "Update_Time" name = "Update_Time">
										<option>10:00</option>
										<option>10:30</option>
										<option>11:00</option>
										<option>11:30</option>
										<option>12:00</option>
										<option>12:30</option>
										<option>13:00</option>
										<option>13:30</option>
										<option>14:00</option>
										<option>14:30</option>
										<option>15:00</option>
										<option>15:30</option>
										<option>16:00</option>
										<option>16:30</option>
										<option>17:00</option>
										<option>17:30</option>
										<option>18:00</option>
									</select>
									
								
							<div class="form-group">
								<br>
								{!! Form::label('status','Trạng thái',['class' => 'control-label']) !!}
								<select id = "Update_Status" name = "Update_Status">
										<option value="wait">Wait</option>
										<option value="using">Using</option>
										<option value="success">Success</option>
										<option value="delete">Delete</option>
									
									</select>
								
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

<!-- Modal Details -->
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


<!-- Modal ADD -->
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
						{!! Form::text('Email','',['id' =>'Email','class' => 'form-control','placeholder' => 'Nhập Email ','required' => 'true']) !!}
							</div>
					</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-support"></i></div>
							<div class="nk-int-st">
						{!! Form::text('Name','',['id' =>'Name','class' => 'form-control','placeholder' => 'Nhập name', 'required' => 'true']) !!}
					</div>
				</div>
					<div class="form-group ic-cmp-int">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-phone"></i></div>
							<div class="nk-int-st">
						{!! Form::text('Phone','',['id' =>'Phone','class' => 'form-control','placeholder' => 'Nhập phone','required' => 'true']) !!}
					</div>
				</div>
				<div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-calendar"></i></div>
							<div class="input-group date nk-int-st">
							<span class="input-group-addon"></span>
						{!! Form::text('Date','',['id' =>'Date','class' => 'form-control Date','placeholder' => 'Nhập Date', 'required' => 'true']) !!}
					</div>
				</div>
				<div style="margin-bottom:20px">
						<div class="form-ic-cmp"><i class="notika-icon notika-edit"></i></div>
						
						<select name="Type_seat" id="Type_seat">
								<option value="">Chọn loại bàn</option>										
							@if(isset($TypeSeat))								
								@foreach($TypeSeat as $seat)
									<option value ="{{$seat->type}}">{{ $seat->type }} người</option>
								@endforeach
							@else
								<option>Không tồn tại loại nào</option>									
							@endif						
						</select>
				</div>
				
				<div style="margin-bottom:20px">		
					
						<div id="number">

						</div>
				</div>
				<div style="margin-bottom:20px">
					<div class="form-ic-cmp"><i class="notika-icon notika-edit"></i></div>
					<select id = "Time" name = "Time">
						<option>10:00</option>
						<option>10:30</option>
						<option>11:00</option>
						<option>11:30</option>
						<option>12:00</option>
						<option>12:30</option>
						<option>13:00</option>
						<option>13:30</option>
						<option>14:00</option>
						<option>14:30</option>
						<option>15:00</option>
						<option>15:30</option>
						<option>16:00</option>
						<option>16:30</option>
						<option>17:00</option>
						<option>17:30</option>
						<option>18:00</option>
					</select>		
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
	var url = null;
		// show thông tin tài khoản
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
					$('#Update_Time').val(response.data[0].time);
					$('select').selectpicker('refresh');
					
					
				},
				error:function(eror){
					console.log(eror);
				}
			});
		});
	$(document).ready(function(){
		//$(".Date").datepicker("option", "dateFormat", "yy-mm-dd");
		 
     
      	
		$('select').selectpicker();
		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});
		$("#tbData").DataTable();


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
					console.log(er);
				}

			});
		});
		$('#Type_seat').change(function(){
				var value = $(this).val();
				
				$.ajax({
					type:"GET",
					url:'B_booktable/'+value+'/edit',
					
					success:function(res){
						var html = '';
						html += "<select name = 'Number_seat' id = 'Number_seat' class = 'TypeSeat' >";
						html += "<option>Chọn số bàn</option>";
						$.each(res,function(key,value){
							$.each(value,function(number2,type){
								$.each(type,function(key2,value2){
									html += '<option value ='+value2+'>';
									html += value2;
									html+='</option>';
								});
							});
						});
						html += "</select>";						
						$('#number').html(html);
						$('#Number_seat').selectpicker('refresh');						
						//console.log(res);
						
						
					},
					error:function(er){
						console.log(er);
					}
				});
				
			});
			

	});
</script>

@stop