<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	

<title>Steger Bizzell | {{$pageTitle}}</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="icon" type="image/png" href="{{ url('/favicon.png'); }}">

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap/bootstrap.min.css'); }}">
<link rel="stylesheet" type="text/css" href="{{ url('/css/push-nav.css'); }}">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css'); }}">

<!-- Font Awesome Icons -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

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

  <body id="home">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/img/logo.png') }}" style="height:60px; margin-top:-10px;" alt="Steger Bizzell" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/services') }}">Our Services</a></li>
                <li><a href="{{ url('/services/roads-and-bridges') }}">Roads & Bridges</a></li>
                <li><a href="{{ url('/services/utility-design') }}">Utility Design</a></li>
                <li><a href="{{ url('/services/land-development') }}">Land Development</a></li>
                <li><a href="{{ url('/services/land-surveying') }}">Land Surveying</a></li>
              </ul>
            </li>
            <li><a href="{{ url('/projects') }}">Projects</a></li>
            <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
            @if (Auth::check())
              <li><a href="{{url('/logout')}}">Logout <i class="fa fa-lock"></i></a></li>
            @else
              <li><a href="{{url('/login')}}">Login <i class="fa fa-lock"></i></a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


@yield('content')


<footer class="col-md-12">

<div class="container">
  <div class="col-md-3">
      <h4>About Us</h4>
        <ul>
          <li><a href="{{ url('/services') }}">Services</a></li>
          <li><a href="{{ url('/projects') }}">Projects</a></li>
          <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
        </ul>
  </div>

  <div class="col-md-3">
      <h4>Services</h4>
        <ul>
          <li><a href="{{ url('/services/roads-and-bridges') }}">Roads & Bridges</a></li>
          <li><a href="{{ url('/services/utility-design') }}">Utility Design</a></li>
          <li><a href="{{ url('/services/land-development') }}">Land Development</a></li>
          <li><a href="{{ url('/services/land-surveying') }}">Land Surveying</a></li>
        </ul>
  </div>

  <div class="col-md-3">
      &nbsp;
  </div>

  <div class="col-md-3">
      <h4>Contact</h4>
      <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> &nbsp; 512.930.9412</p>
      <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> &nbsp; 1978 S. Austin Avenue<br/>
        <span style="margin-left:22px;">Georgetown, TX 78626</span>
      </p>
  </div>


    <p class="col-md-12 copy">&copy; 2015 Steger & Bizzell Engineering, Inc.</p>
</div>

</footer>


<script>
//Allows for Push Navigation
var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
  showRightPush = document.getElementById( 'showRightPush' ),
  body = document.body;

showRightPush.onclick = function() {
  classie.toggle( this, 'active' );
  classie.toggle( body, 'cbp-spmenu-push-toleft' );
  classie.toggle( menuRight, 'cbp-spmenu-open' );
  disableOther( 'showRightPush' );

};

//jQuery - Smooth Scroll
$(function() {
$('a[href*=#]:not([href=#])').click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    if (target.length) {
      $('html,body').animate({
        scrollTop: target.offset().top
      }, 1000);
      return false;
    }
  }
});
});

</script>


</body>

</html>