@extends('Layout.user.master')
@section('title')
	Đặt bàn
@stop
@section('body')
<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(/images/background/bg3.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span style="font-size:90px" class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Món đã đặt
						</span>
	
							<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-30" data-appear="fadeInUp">
								
							</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container2">
		@include('Layout.user.error')
		@if(Cart::count() != 0)
	<form method="POST" action="{{ route('editCart') }}">
		{{ csrf_field() }}
			<table class="table table-hover" id="tbData">
				<tr>
					<th>Tên</th>
					<th>Giá</th>
					<th>Mô tả </th>
					<th>Số lượng</th>
					<th>Tổng tiền / 1 sản phẩm</th>					
					<th>Thao tác</th>
				</tr>
				@foreach($cart as $item)
					<tr >
					<td>{{ $item->name }}</td>
					<input type = "hidden" id="Price" value="{{ $item->price }}">
					<td id="price{{ $item->id }}" value = "{{ $item->price }}">{{ $item->price }}</td>
					<td>{!! nl2br($item->options->description) !!}</td>
					<input type="hidden" name="rowId[]" id="rowId" class="rowId" value="{{ $item->rowId }}" >
					<td><input type="number" value="{{ $item->qty }}" data = "{{ $item->id }}" data-rowId ="{{ $item->rowId }}" class="qty" id="qty" name="qty[]" min ="1" max="50" step="1" style='width:100%'></td>
					<td class="dongtien"><input class="subtotal" type="text" id="total{{$item->id}}" value="{{ $item->qty*$item->price }}" readonly></td>
					<td><button type="button" class="btn3 flex-c-m size16 txt11 trans-0-4 m-10 delete" name = "delete" data-url = "{{ route("F_menu.destroy",$item->rowId) }}" style = "width:80px;height:40px" >Xóa</button></td>
				</tr>
				@endforeach
				<tr><td colspan="4"><h2>Tổng tất cả</h2></td><td id="Fulltotal"></td></tr>
				<tr><td><button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">Chọn bàn</button></td><td><a href="{{ route('F_menu.index') }}"><button type = "button" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10"> Thêm sản phẩm...</button></a></td></tr>
				
			</table>
		
	</form>	
	@else
		<h1>Bạn chưa chọn trước sản phẩm nào !</h1>
		<a href="{{ route('F_menu.index') }}"><button type = "button" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10"> Chọn sản phẩm</button></a>	
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
							location.reload();
							//$('.container2').load(' .container2');
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
				$('.qty').click(function(){

					// Tìm tới đúng phần tử class muốn lấy giá trị
					let parent = $(this).parent().find('.qty');
					let qty = parseInt(parent.val());
				//	let qty = $(this).val();ass
					let rowId = $(this).attr('data-rowId');
					$.ajax({
						type:"POST",
						url : '{{ route('realTimeCart') }}',
						data : {qty:qty,rowId:rowId},
						success:function(data)
						{
							console.log(data);
						},
						error:function(er){
							console.log(er);
						}
					})
				})
			});
		</script>
	
@stop