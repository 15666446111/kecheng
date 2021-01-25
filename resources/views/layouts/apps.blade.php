<!DOCTYPE HTML>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv=Content-Type content=text/html; charset=utf-8 />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}?t={{ time() }}">

	<link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	
	@yield('css')

</head>


<body>

	@yield('content')

	<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="{{ mix('js/app.js') }}?t={{ time() }}"></script>

	@yield('scripts')
</body>

</html>