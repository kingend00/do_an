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
			<table class="table table-hover">
				<tr>
					<th>Tên</th>
					<th>Giá</th>
					<th>Mô tả </th>
					<th>Số lượng</th>
					
					<th>Thao tác</th>
				</tr>
				@foreach($cart as $item)
					<tr>
					<td>{{ $item->name }}</td>
					<input type = "hidden" id="Price" value="{{ $item->price }}">
					<td>{{ $item->price }}</td>
					<td>{{ $item->options->description }}</td>
					<input type="hidden" name="rowId[]" id="rowId" class="rowId" value="{{ $item->rowId }}">
					{{-- <td><button type = "button" class="up"" style="background-color:green">Tăng</button></td> --}}
					<td><input type="number" value="{{ $item->qty }}" class="qty" id="qty" name="qty[]" min ="1" max="100" step="1" style='width:100%'></td>
					{{-- <td><button type = "button" class="btn btn-default down" style="background-color:green">Giảm</button></td>	
										 --}}
					
					<td><button type="button" class = "btn btn-default delete" name = "delete" data-url = "{{ route("F_menu.destroy",$item->rowId) }}" style="background-color:green">Xóa</button></td>
				</tr>
				@endforeach
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


				$('.up').click(function(){
				var gt = $('.qty').val();
				$('.qty').val(++gt);	
					
				});
				$('.down').click(function(){
				var gt = $('.qty').val();
				$('.qty').val(gt-1);	
					
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
				// $('#qty').click(function(){
				// 	var price = Number($('#Price').val());
				// 	var amount = Number($('.qty').val());
				// 	$('.total').html(price*amount);
					

				// });
			});
		</script>
	
@stop