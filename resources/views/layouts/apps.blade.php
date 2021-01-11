<!DOCTYPE HTML>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv=Content-Type content=text/html; charset=utf-8 />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

     <link rel="stylesheet" href="{{ mix('css/app.css') }}?t={{ time() }}">

	@yield('css')

</head>


<body>

	@yield('content')


	<script type="text/javascript" src="{{ mix('js/app.js') }}?t={{ time() }}"></script>
	<script type="text/javascript">
		$(".lang").click(function(){
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.post( "{{ route('lang')}}", { lang: $(this).data('lang') },  function(d){
                    if(d) location.reload(); //重新刷新页面  
                }
            );
		})
	</script>
	
	<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
	@yield('scripts')
</body>

</html>