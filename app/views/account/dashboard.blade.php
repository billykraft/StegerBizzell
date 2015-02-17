@extends('layouts.account')

@section('content')


<div class="content col-md-9">
    <section>

		<div class="well account-head">
			<h3 class="text-center">{{ $pageTitle }}</h3>
		</div>


		<br class="clear" />

		<div class="well white-well">

			<div class="col-md-6 dash-data dash-1">
				<h4><i class="glyphicon glyphicon-user"></i> Users</h4>
				<h2>{{ $userCount }}</h2>
			</div>

			<br class="clear"/>
		</div>

    </section>
</div>

@if (Session::get('flash_message'))
<div class="alert alert-success alert-dismissible" style="width:100%;height:7%;position:absolute;top:93%">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> {{ Session::get('flash_message') }}</div>
@endif

@stop