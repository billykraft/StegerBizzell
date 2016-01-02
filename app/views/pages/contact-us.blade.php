@extends('layouts.pages')

@section('content')

<div class="page-main">

	<div class="wrap">

	<div class="col-md-6">

	<p><asdf id="addr1">1978 S. Austin Avenue</asdf><br>
	<asdf id="addr2">Georgetown, TX 78626</asdf></p>

	<!--p>phone: 512.930.9412<br>
	fax: 512.930.9416</p-->
	<p>phone: <asdf id="phone" class="vizual-unique-txt" note="dark">{{ vizualize::unique_text("phone") }}</asdf></p>

		<!--h3>Guiding Principles</h3-->
		<!--div>
			<p>We will be honest and forthright in all endeavors.</p>
			<p>We will create straightforward, economical solutions to problems.</p>
			<p>We will use the latest proven technologies.</p>
			<p>We will keep clients informed during all phases of projects.</p>
		</div-->

		<h3 id='prins' class="vizual-unique-txt" note="dark">{{ vizualize::unique_text("prins") }}</h3>
		<div id="prins_content" class='vizual-unique-txt' note='dark'>
			{{ vizualize::unique_text("prins_content") }}
		</div>

	</div>

	<div class="col-md-6">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3433.2944918316807!2d-97.67920300000002!3d30.625657000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644d66054a99617%3A0x5647f8822ecaf73e!2s1978+S+Austin+Ave%2C+Georgetown%2C+TX+78626!5e0!3m2!1sen!2sus!4v1423878726375" width="100%" height="450" frameborder="0" style="border:0"></iframe>

	</div>

<br class="clear" />


	</div>
</div> <!-- /main -->

@stop
