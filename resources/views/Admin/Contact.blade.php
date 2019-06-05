@extends('Layout.admin.master')
@section('title')
    Phản hồi
@stop
@section('body')
<div class = "container">
        <div class="table-responsive">
                <table class="table table-striped" id="tbData" >
                <thead>
                    <tr>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Xóa</th>
                    
                </tr>
                </thead>
               
            
            
            </table>
            
    </div>

</div>

<div class="modal fade" id="ModalShow" role="dialog">
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
<script type="text/javascript">

   $(document).ready(function(){
    $.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
			});


    $('#tbData').DataTable({
				processing: true,
        		serverSide: true,
				ajax:'{!!  route('B_contact.getDataContact') !!}',
				columns :[
					{data:'name'},
					{data:'email'},
					{data:'phone'},
					{data:'type'},
					{data:'btn-edit'},
					{data:'btn-destroy'}
					
				]
			});
            $(document).on('click','.btn-edit',function(){
                var url = $(this).attr('data-url');

                $.ajax({
                    type:"GET",
                    url : url,
                    success:function(data){
                        //$('#tbData').load(' #tbData');
                        $('#tbData').DataTable().ajax.reload();
                        $('#contentDetails').html(data);
                       
                    },
                    error:function(er){
                        console.log(er);
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
					Mynotify(response,'success');
					$('#tbData').DataTable().ajax.reload();

				},
				error:function(eror){
					console.log(eror);
				}
				});
				//$('#tbData').load(' #tbData');
			}
		}); 
   });
</script>
@stop