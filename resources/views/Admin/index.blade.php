@extends('Layout.admin.master')
@section('title')
Quản trị

@stop
@section('body')
	
    <h1>Something in here , thinking...</h1>
    <script>
      
            var activeurl = window.location;
          $('a[href="'+activeurl+'"]').parent('li').addClass('active');
          
    </script>
@stop