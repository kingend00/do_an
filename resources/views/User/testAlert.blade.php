




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('public/admin/css/notification/notification.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/font-awesome.min.css') }}">
    <script src="{{ URL::asset('public/js/jquerynew.min.js') }}"></script>
</head>
<body>
        <div class="notification-demo">
        <button type="button" class="btn btn-info waves-effect" data-type="inverse" data-from="top" data-align="center">Top Center</button>
        </div>
        <script src="{{URL::asset('public/admin/js/notification/bootstrap-growl.min.js')}}"></script>
        <script src="{{URL::asset('public/admin/js/notification/notification-active.js')}}"></script>
</body>
</html>