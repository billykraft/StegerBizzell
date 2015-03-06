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

@if(Auth::check())
<script src="{{ url('js/uploader.js'); }}"></script>
@endif

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
                <li><a href="{{ url('/services/roads-and-bridges') }}">{{ vizualize::unique_text("roadsNbridges") }}</a></li>
                <li><a href="{{ url('/services/utility-design') }}">{{ vizualize::unique_text("utilityDesign") }}</a></li>
                <li><a href="{{ url('/services/land-development') }}">{{ vizualize::unique_text("landDev") }}</a></li>
                <li><a href="{{ url('/services/land-surveying') }}">{{ vizualize::unique_text("landSurv") }}</a></li>
              </ul>
            </li>
            <li><a href="{{ url('/projects') }}">Projects</a></li>
            <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
            @if (Auth::check())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">{{ Auth::user()->first_name }}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ url('account/dashboard'); }}"><i class="glyphicon glyphicon-cog"></i>Dashboard</a></li>
                  <li class="divider"></li>
                  <li class="last"><a href="{{ url('/logout'); }}"><i class="glyphicon glyphicon-off"></i>Logout</a></li>
                </ul>
              </li>
              <div class="logged-in-view">
                <ul>
                  <li><a id="editableCancelButton" name="editableIcon" onclick="editableToggleEdit();" style="display:none;float:right" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</a></li>
                  <li><a id="editableSaveButton" name="editableIcon" onclick="editableSubmitAll();" style="display:none;margin-right:15px;float:right" class="btn btn-primary"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Publish</a></li>
                  <li><a id="editableEditButton" onclick="editableToggleEdit();" class="btn btn-info" style="margin-right:15px;float:right"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Page</a></li>
                </ul>
              </div>
            @else
              <li><a href="{{url('/login')}}">Login <i class="fa fa-lock"></i></a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="page-wrap">
	<h2 class="page-header">{{ $pageTitle }}
</div>

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
          <li><a href="{{ url('/services/roads-and-bridges') }}">{{ vizualize::unique_text("roadsNbridges") }}</a></li>
          <li><a href="{{ url('/services/utility-design') }}">{{ vizualize::unique_text("utilityDesign") }}</a></li>
          <li><a href="{{ url('/services/land-development') }}">{{ vizualize::unique_text("landDev") }}</a></li>
          <li><a href="{{ url('/services/land-surveying') }}">{{ vizualize::unique_text("landSurv") }}</a></li>
        </ul>
  </div>

  <div class="col-md-3">
      &nbsp;
  </div>

  <div class="col-md-3">
      <h4>Contact</h4>
      <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> &nbsp; {{ vizualize::unique_text("phone") }}</p>
      <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> &nbsp; {{ vizualize::unique_text("addr1") }}<br/>
        <span style="margin-left:22px;">{{ vizualize::unique_text("addr2") }}</span>
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

@if(Auth::check())
<script src="{{ url('js/vizual.js'); }}"></script>
@endif
