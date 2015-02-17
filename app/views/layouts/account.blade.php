<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        

<title>Steger Bizzell</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="icon" type="image/png" href="{{ url('/favicon.png'); }}">


<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap/bootstrap.min.css'); }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css'); }}">
</head>

<body>

<!-- Begin Header -->
<header class="navbar navbar-default navbar-fixed-top" role="navigation">


          <a href="{{ url('/account/dashboard'); }}" class="navbar-brand col-md-2">Steger Bizzell</a>

<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
</button>

  <nav class="container">
  	  	<nav class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle account" data-toggle="dropdown">Hello {{$thisUser->first_name . ' ' . $thisUser->last_name}} <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <!--li><a href="{{ url('account/settings'); }}"><i class="glyphicon glyphicon-cog"></i>Settings</a></li>
		            <li class="divider"></li-->
                <li><a href="{{ url('/'); }}"><i class="glyphicon glyphicon-pencil"></i>Front end</a></li>
                <li class="divider"></li>
		            <li class="last"><a href="{{ url('/logout'); }}"><i class="glyphicon glyphicon-off"></i>Logout</a></li>
		          </ul>
		        </li>
		    </ul>
  </nav>

</header>
<!-- End Header -->

<div class="col-md-2 sidebar">
<nav>
    <ul>
          <a href="{{ url('/account/dashboard'); }}"><li style="margin-top:5px;"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
          <a href="{{ url('/account/users'); }}"><li><i class="glyphicon glyphicon-user"></i>Users</li></a>
<!--           <a href="{{ url('/account/admin/analytics'); }}"><li><i class="glyphicon glyphicon-stats"></i>Analytics</li></a> -->
          <!--a href="{{ url('/account/settings'); }}"><li><i class="glyphicon glyphicon-cog"></i>Settings</li></a-->
    </ul>
</nav>
</div>



@yield('content')


</body>

<!-- Javascript -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ url('/js/bootstrap/bootstrap.min.js'); }}"></script>
<script src="{{ url('/js/bootstrap/bootstrap-datepicker.js'); }}"></script>
<script src="{{ url('/js/bootstrap/bootstrap-timepicker.min.js'); }}"></script>
<script src="{{ url('/js/custom.js'); }}"></script>


<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

   <!-- Google Analytics
      
  (insert script here)

  End Google Analytics -->

</html>

