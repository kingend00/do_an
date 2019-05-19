@extends('Layout.admin.master')
@section('title')
    Sự kiện
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
										<h2>Danh mục sự kiện/tin tức</h2>
									<button type="button" class="btn btn-lightblue lightblue-icon-notika btn-add" data-toggle="modal" data-target="#ModalAdd" data-url = "{{ route('B_Seat.AutoIncrement') }}" ><i class="notika-icon notika-checked"></i> Thêm</button></button><br>								
									</div>
								</div>
							</div>
						</div>

	
	
		<div class="table-responsive">
		<table class="table table-striped" id="tbData" >
			<thead>
                <th></th>
				<th>Tiêu đề</th>
				<th>Ảnh</th>
				<th>Sửa/Xem</th>
				<th>Xóa</th>
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
                 {!! Form::open(['id'=>'form_update','route' => 'B_news.UpdateNews','method'=>'POST','files'=>true])!!}
                 
                 
                <div class="modal-body">
                            <div class="form-group">
                                {!! Form::hidden('Id','',['id' =>'Id']) !!}
                            </div>
                           
                            <div class="form-group ic-cmp-int">
                            
                                    <div class="form-ic-cmp">{!! Form::label('Number','Tiêu đề',['class' => 'control-label']) !!}</div>
                                        <div class="nk-int-st">
                                            {!! Form::text('Title','',['id' =>'Title','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
                                        </div>
                            </div>
    
                            <div class="form-group ic-cmp-int">
                            
                                    <div class="form-ic-cmp">{!! Form::label('Number','Ảnh',['class' => 'control-label']) !!}</div>
                                        <div class="nk-int-st">
                                            {!! Form::file('Image','',['id' =>'Image','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
                                        </div>
                            </div>

                            <div class="form-group ic-cmp-int">
                            
                                    <div class="form-ic-cmp">{!! Form::label('Number','Nội dung',['class' => 'control-label']) !!}</div>
                                        <div class="nk-int-st">
                                                <textarea name="Content" id="Content" rows = 8 columns = 30 class="form-control"></textarea> 
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



    <div class="modal fade" id="ModalAdd" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                     {!! Form::open(['id'=>'form_add','route'=>'B_news.store','method'=>'POST','files'=>true])!!}
                     
                     
                    <div class="modal-body">
        
                               
                            <div class="form-group ic-cmp-int">
                            
                                    <div class="form-ic-cmp">{!! Form::label('Number','Tiêu đề',['class' => 'control-label']) !!}</div>
                                        <div class="nk-int-st">
                                            {!! Form::text('Title','',['id' =>'Title','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
                                        </div>
                            </div>
    
                            <div class="form-group ic-cmp-int">
                            
                                    <div class="form-ic-cmp">{!! Form::label('Number','Ảnh',['class' => 'control-label']) !!}</div>
                                        <div class="nk-int-st">
                                            {!! Form::file('Image','',['id' =>'Image','class' => 'form-control','placeholder' => 'Enter here', 'required' => 'true']) !!}
                                        </div>
                            </div>

                            <div class="form-group ic-cmp-int">
                            
                                    <div class="form-ic-cmp">{!! Form::label('Number','Nội dung',['class' => 'control-label']) !!}</div>
                                        <div class="nk-int-st">
                                            <textarea name="Content" id="Content" rows = 8 columns = 25 class="form-control"></textarea> 
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
    $(document).ready(function(){
       // $('#summernote').html(null);
        //$('#summernote').summernote('code',null);
        $.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});
            $('#tbData').DataTable({
				processing: true,
        		serverSide: true,
				ajax:'{!!  route('B_news.getDataNews') !!}',
				columns :[
                    {data:'news_id',"visible": false,
                "searchable": false},
					{data:'title'},
					{data:'image'},
					{data:'btn-edit'},
					{data:'btn-destroy'}
				]
			});
            $(document).on('click','.btn-edit',function(){
			url = $(this).attr('data-url');

			$.ajax({
				type:'GET',
				url : url,
				success:function(response){
					$('#Id').val(response.data[0].news_id);
					$('#Title').val(response.data[0].title);
					$('#Content').val(response.data[0].content);
					
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