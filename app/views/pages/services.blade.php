@extends('layouts.pages')

@section('content')

<div class="page-main">

	<div class="wrap">
	<asdf id="service_desc" class="vizual-unique-txt" note="dark">
		{{ vizualize::unique_text("service_desc") }}
	</asdf>

<div class="col-md-3">
	<h4><a href="{{ url('/services/roads-and-bridges') }}">
		<asdf id="roadsNbridges" class="vizual-unique-txt vizual-noclick" note="dark">
			{{ vizualize::unique_text("roadsNbridges") }}
		</asdf> &raquo;
	</a><h4>
</div>

<div class="col-md-3">
	<h4><a href="{{ url('/services/utility-design') }}">
		<asdf id="utilityDesign" class="vizual-unique-txt vizual-noclick" note="dark">
			{{ vizualize::unique_text("utilityDesign") }}
		</asdf> &raquo;
	</a><h4>
</div>

<div class="col-md-3">
	<h4><a href="{{ url('/services/land-development') }}">
		<asdf id="landDev" class="vizual-unique-txt vizual-noclick" note="dark">
			{{ vizualize::unique_text("landDev") }}
		</asdf> &raquo;
	</a><h4>
</div>

<div class="col-md-3">
	<h4><a href="{{ url('/services/land-surveying') }}">
		<asdf id="landSurv" class="vizual-unique-txt vizual-noclick" note="dark">
			{{ vizualize::unique_text("landSurv") }}
		</asdf> &raquo;
	</a><h4>
</div>


<br class="clear" />
	</div>
</div> <!-- /main -->

@stop