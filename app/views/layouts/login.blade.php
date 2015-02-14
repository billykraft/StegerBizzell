<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	

<title>Steger Bizzell</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="icon" type="image/png" href="{{ url('/favicon.png'); }}">

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap/bootstrap.min.css'); }}">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css'); }}">


<!-- Javascript -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ url('/js/bootstrap/bootstrap.min.js'); }}"></script>
<script src="{{ url('/js/custom.js'); }}"></script>

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

   <!-- Google Analytics
   		
	(insert script here)

	End Google Analytics -->

</head>

<body id="login-body">


@yield('content')


</body>
</html>