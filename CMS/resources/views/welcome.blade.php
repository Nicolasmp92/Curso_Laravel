
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FrontEnd</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cssFancybox/jquery.fancybox.css') }}">

    <script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/animatescroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.js') }}"></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>

	<div class="container-fluid">
        @include('frontend.menu')
        @yield('content')
    </div>





<script src="js/script.js"></script>

</body>
</html>


