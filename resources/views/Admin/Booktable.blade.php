@extends('Layout.admin.master')
@section('title')
	Đơn đặt bàn
@stop
@section('body')
<div class="container">
	<div class="row">


		
		<fieldset class="form-group">
			<legend  style="width:auto;border:1px" ><b>Xem các bàn đã được đặt</b></legend>
				<form action="" method="POST" id="form">
						<div class="col-sm-2"></div>
						<div class="col-sm-3">
							<div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
									
								
									<div class="input-group date nk-int-st">
									<span class="input-group-addon"></span>
								{!! Form::text('date','',['id' =>'date','class' => 'form-control Date','placeholder' => 'Chọn ngày', 'required' => 'true','data-date-format'=>'yyyy-mm-dd','readonly'=>true]) !!}
								</div>
							</div>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-3">
								<div style="margin-bottom:20px">
														
										<select name="seat" id="seat" >
																					
											@if(isset($TypeSeat))
											<option value ="">Chọn loại bàn</option>							
												@foreach($TypeSeat as $seat)
													<option value ="{{$seat->type}}">{{ $seat->type }} người</option>
												@endforeach
											@else
												<option>Không tồn tại loại nào</option>									
											@endif						
										</select>
								</div>
						</div>
						<div class="col-sm-2"></div>
					</form>
		</fieldset>
		<div id="test"></div><br><br>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Đơn đặt bàn <?php 
											date_default_timezone_set('Asia/Ho_Chi_Minh');
											echo date('Y-m-d - H:i:s',time()); ?></h2>
										
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
             {!! Form::open(['id'=>'form_update','method'=>'POST'])!!}
             
             {{ method_field('PUT') }}
            <div class="modal-body">
            			<div class="form-group">
							
							
							{!! Form::hidden('Update_Id','',['id' =>'Update_Id','class' => 'form-control', 'required' => 'true','readonly' => 'true']) !!}
							{!! Form::hidden('Update_User','',['id' =>'Update_User','class' => 'form-control', 'required' => 'true','readonly' => 'true']) !!}
							{!! Form::hidden('Update_Number_Seat','',['id' =>'Update_Number_Seat','class' => 'form-control', 'required' => 'true','readonly' => 'true']) !!}
							{!! Form::hidden('Time_Check','',['id' =>'Time_Check','class' => 'form-control', 'required' => 'true','readonly' => 'true']) !!}
					
						
						</div>
						<div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
						
								<div class="form-ic-cmp">Ngày đặt</div>
									<div class="input-group date nk-int-st">
									<span class="input-group-addon"></span>
								{!! Form::text('Update_Date','',['id' =>'Update_Date','class' => 'form-control Date','placeholder' => 'Nhập Date', 'required' => 'true','data-date-format'=>'yyyy-mm-dd','readonly'=>true]) !!}
							</div>
						</div>
							
								{!! Form::label('hihi','Thời gian đặt',['class' => 'control-label']) !!}
								
                                    <select id = "Update_Time" name = "Update_Time">
											<option>Chọn giờ</option>
											<option>10:00</option>
										
											<option>11:00</option>
											
											<option>12:00</option>
											
											<option>13:00</option>
											
											<option>14:00</option>
											
											<option>15:00</option>
											
											<option>16:00</option>
											
											<option>17:00</option>
											
											<option>18:00</option>
											
											<option>19:00</option>
	
											<option>20:00</option>
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
					<div style="margin-bottom:20px">
							<div class="form-ic-cmp"><i class="notika-icon notika-edit"></i></div>					
							<select name="Type_seat" id="Type_seat" >
																		
								@if(isset($TypeSeat))
								<option value ="">Chọn loại bàn</option>							
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
							<option> Chọn thời gian</option>
										<option>10:00</option>
										
										<option>11:00</option>
										
										<option>12:00</option>
										
										<option>13:00</option>
										
										<option>14:00</option>
										
										<option>15:00</option>
										
										<option>16:00</option>
										
										<option>17:00</option>
										
										<option>18:00</option>
										
										<option>19:00</option>

										<option>20:00</option>
										<option>21:00</option>

										
						</select>		
					</div>	
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
				<div class="form-group nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:30px;">
						
						<div class="form-ic-cmp"><i class="notika-icon notika-calendar"></i></div>
							<div class="input-group date nk-int-st" id="Picker">
							<span class="input-group-addon"></span>
						{!! Form::text('Date','',['id' =>'Date','class' => 'form-control Date','placeholder' => 'Nhập Date', 'required' => 'true','data-date-format'=>'yyyy-mm-dd','readonly'=>true]) !!}
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
		//$(".Date").datepicker("option", "dateFormat", "yy-mm-dd");
		 //$('#Picker').datepicker({format: 'dd/mm/yyyy'});

		 $('.Date').datepicker();
		 $('#Update_Date').datepicker();
		$('select').selectpicker();

		$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});		
			$('#seat').change(function(){
				$.ajax({
					type:"POST",
					url : "{{ route('F_seat.showTime_Seat') }}",
					data : $('#form').serialize(),
					
					success:function(data)
					{

						$('#test').html('');
						console.log(data);
						let shiftObj = JSON.parse(data);
						console.log(shiftObj);



						var instance = new TimeTable({

							// Beginning Time
							startTime: "10:00",

							// Ending Time
							endTime: "22:00",

							// Time to divide(minute)
							divTime: "30",

							// Time Table
							shift: shiftObj,

							// Other options
							option: {

							// workTime include time not displaying
							workTime: true,

							// bg color
							bgcolor: ["#00FFFF"],

							// {index :  name, : index: name,,..}
							// selectBox index and shift index should be same
							// Give randome if shift index was not in selectBox index
								
							}

							});
							instance.init("#test");
						
					},
					error:function(er)
					{
						console.log(er);
					}

				});

			});





			$('#tbData').DataTable({
				processing: true,
        		serverSide: true,
				ajax:'{!!  route('B_booktable.getData') !!}',
				columns :[
					{data:'booktable_id'},
					{data:'number_seat'},
					{data:'email'},
					{data:'name'},
					{data:'phone'},
					{data:'date'},
					{data:'time'},
					{data:'status'},
					{data:'total'},
					{data:'btn-edit'},
					{data:'btn-details'}
				]
			}).order( [ 0, 'desc' ] )
				.draw();
			
				$(document).on('change','#Time',function(){
					var value2 = $('#Time').val();
				if(value2 == "21:00")
					alert('Cửa hàng chỉ mở cửa đến 22h, Chú ý duyệt bàn !');

				});



			var url = null;
		// show thông tin tài khoản
		$(document).on('click','.btn-edit',function(){
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
					$('#Update_User').val(response.data[0].email);
					$('#Update_Number_Seat').val(response.data[0].number_seat);
					$('#Time_Check').val(response.data[0].time);
					$('select').selectpicker('refresh');
					
					
				},
				error:function(eror){
					console.log(eror);
				}
			});
		});
		$(document).on('click','.btn-details',function(){
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
					if(data == "true")
						Mynotify('Cập nhật thành công','success',1800);
					else
						Mynotify(data,'danger');

					$('#ModalUpdate').modal('hide');
					$('#tbData').DataTable().ajax.reload();	
					console.log(data);
					

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