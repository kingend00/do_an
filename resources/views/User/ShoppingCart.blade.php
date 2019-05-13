@extends('Layout.user.master')
@section('title')
	Đặt bàn
@stop
@section('body')
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image:url('../images/background/slide1.jpg');margin-bottom:30px">
		<h2 class="tit6 t-center" style="color: green">
			Pato Menu
		</h2>
	</section>

	<div class="container2">
		@include('Layout.user.error')
		@if(isset($cart))
	<form method="POST" action="{{ route('editCart') }}">
		{{ csrf_field() }}
			<table class="table table-hover" id="tbData">
				<tr>
					<th>Tên</th>
					<th>Giá</th>
					<th>Mô tả </th>
					<th>Số lượng</th>
					<th>Tổng tiền/sản phẩm</th>					
					<th>Thao tác</th>
				</tr>
				@foreach($cart as $item)
					<tr >
					<td>{{ $item->name }}</td>
					<input type = "hidden" id="Price" value="{{ $item->price }}">
					<td id="price{{ $item->id }}" value = "{{ $item->price }}">{{ $item->price }}</td>
					<td>{{ $item->options->description }}</td>
					<input type="hidden" name="rowId[]" id="rowId" class="rowId" value="{{ $item->rowId }}">
					<td><input type="number" value="{{ $item->qty }}" data = "{{ $item->id }}" class="qty" id="qty" name="qty[]" min ="1" max="100" step="1" style='width:100%'></td>
					<td class="dongtien"><input class="subtotal" type="text" id="total{{$item->id}}" value="{{ $item->qty*$item->price }}" readonly></td>
					<td><button type="button" class = "btn btn-default delete" name = "delete" data-url = "{{ route("F_menu.destroy",$item->rowId) }}" style="background-color:green">Xóa</button></td>
				</tr>
				@endforeach
				<tr><td colspan="4"><h2>Tổng tất cả</h2></td><td id="Fulltotal"></td></tr>
				<tr><td><button type="submit" class="btn btn-default" style="background-color:green">Chọn bàn</button></td></tr>
			</table>
	</form>		
		@endif
	
	</div>
		<script type="text/javascript">
			$(document).ready(function(){

				$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    }
				});

				$('.delete').click(function(){
					var url = $(this).attr('data-url');
					$.ajax({
						type:'DELETE',
						url:url,
						success:function(response){
							$('.container2').load(' .container2');
						},
						error:function(er){
							console.log(er);
						}
					});
				});
					var money = 0;
					var count2 = document.getElementsByClassName('subtotal');
					for(var i =0;i<count2.length;i++)
					{
						money += parseInt(count2[i].value);
					}
					$('#Fulltotal').html(money+"  VNĐ");

				
				$('.qty').change(function(){
					var id = $(this).attr('data');
					var data = $(this).val();
					var amount = $('#price'+id).html();
					$('#total'+id).val(data*amount);
					var money = 0;
					var count2 = document.getElementsByClassName('subtotal');
					for(var i =0;i<count2.length;i++)
					{
						money += parseInt(count2[i].value);
					}
					$('#Fulltotal').html(money+"  VNĐ");
				});

				// $('#qty').click(function(){
				// 	var price = Number($('#Price').val());
				// 	var amount = Number($('.qty').val());
				// 	$('.total').html(price*amount);
					

				// });
			});
		</script>
	
@stop