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
                    <th>Thao tác</th>
                    
                </tr>
                </thead>
                <tbody>
                    @if (isset($data))
                        @foreach ($data as $element)
                            <tr>
                                <td> {{ $element->name }}</td>
                                <td> {{ $element->email }}</td>
                                <td> {{ $element->phone }}</td>
                                <td> {{ $element->type }}</td>
                            <td><button type="button" class="btn btn-teal teal-icon-notika btn-edit" data-toggle="modal" data-target="#ModalShow" data-url="{{ route('F_contact.show',$element->feedback_id) }}" ><i class = "glyphicon glyphicon-cog"></i> Xem</button>
                                <button type="button" class="btn btn-danger danger-icon-notika btn-destroy" data-url="{{ route('F_contact.destroy',$element->feedback_id) }}"><i class="notika-icon notika-close"></i> Xóa</button></td>
                                
                            </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            
            
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
$('.btn-edit').click(function(){
        var url = $(this).attr('data-url');

        $.ajax({
            type:"GET",
            url : url,
            success:function(data){
                //$('#tbData').load(' #tbData');
                $('#contentDetails').html(data);
                
            },
            error:function(er){
                console.log(er);
            }
        });
    });
   $(document).ready(function(){
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
   });
</script>
@stop