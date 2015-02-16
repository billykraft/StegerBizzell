@extends('layouts.account')

@section('content')


<div class="content col-md-9">

    <section>

<div class="well account-head">
<h3 class="text-center">{{ $pageTitle }}</h3>
</div>

      <a type="button" class="btn btn-success btn-md pull-right margins15 dash-btn" href="{{url('/account/users/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
        Add New User
      </a>

<div class="table-responsive">
  <table class="table table-striped">
	<thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
@foreach($users as $u)
	<tr>
		<td>{{$u->first_name}}</td>
		<td>{{$u->last_name}}</td>
		<td>{{$u->email}}</td>
		<td><a href="{{url('/')}}/account/users/{{$u->user_id}}" class="btn btn-default btn-xs">View Profile &raquo;</a></td>
	</tr>
@endforeach
  </table>
</div>
</div>


    </section>
</div>

@if (Session::get('flash_message'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> {{ Session::get('flash_message') }}</div>
@endif

@stop