@if(count($errors) > 0)
	<div class="alert alert-danger error-alert maxping">
			<button type="button"  style="color:white" class="close" data-dismiss="alert" aria-label="Close"><h1 style="color:white"><strong><span><i class="notika-icon notika-close" style="color:white"></i></span></strong></h1></button>
	           
			<h2>Đã có lỗi xảy ra </h2>
			<ul>
				@foreach($errors->all() as $error)
					<li><h5>{{$error}}</h5></li>
				@endforeach
			</ul>
		  
		
	</div>
   @endif

   @if (Session::has('error')) 
   		<div class="alert alert-danger error-alert maxping"> 
		   <h4>{{ Session::get('error') }}</h4>
	    </div>
   @endif
   @if (Session::has('success')) 
   <div class="alert alert-success error-alert maxping"> 
		   <h4>{{ Session::get('success') }}</h4>
	</div>       
@endif