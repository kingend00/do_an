@if(count($errors) > 0)
	<div class="notification-demo">
		<textarea class="alert alert-danger error-alert hihi" data-type="inverse" data-from="top" data-align="center">           
			<h2>Đã có lỗi xảy ra </h2>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		  
		</textarea>
	</div>
   @endif

   @if (Session::has('error')) 
   		<div class="alert alert-danger error-alert"> 
		   {{ Session::get('error') }}
	    </div>
   @endif
   @if (Session::has('success')) 
   <div class="alert alert-success error-alert"> 
		   {{ Session::get('success') }}
	   </div>       
@endif