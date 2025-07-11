
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FrontEnd</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/cssFancybox/jquery.fancybox.css">

	<script src="js/jquery-2.2.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.fancybox.js"></script>
	<script src="js/animatescroll.js"></script>
	<script src="js/jquery.scrollUp.js"></script>

</head>

<body>

	<div class="container-fluid">
        @include('frontend.menu')
        @yield('content')
    </div>





<script src="js/script.js"></script>

</body>
</html>


