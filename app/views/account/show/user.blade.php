@extends('layouts.account')

@section('content')


<div class="content col-md-9">

    <section>
<div class="bread-back">
    <a href="{{ url('/account/users')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Users</a>
    <span>&raquo;</span>
    <a href="#">{{ $pageTitle}}</a>
</div>

<div class="well account-head">
<h3>{{ $pageTitle }}</h3>
</div>

@foreach($users as $user)
			@if( $user->user_id != Auth::user()->user_id )
				<a type="button" href="{{url('/account/users')}}/{{ $user->user_id}}/delete" class="btn btn-danger btn-md pull-right margins15 dash-btn" onclick="return confirm('Are you sure you would like to delete this user?');"><span class="glyphicon glyphicon-remove"></span> Delete User</a>
			@else
				<a type="button" href="{{url('/account/users')}}/{{ $user->user_id}}/edit" class="btn btn-info btn-md pull-right margins15 dash-btn"><span class="glyphicon glyphicon-edit"></span> Edit User</a>
			@endif
@endforeach

<br class="clear" />

@foreach($users as $user)

<div class="table-responsive">
  <table class="table table-bordered table-striped table-responsive">
	<tr>
		<td>First Name</td>
		<td>{{$user->first_name}}</td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td>{{$user->last_name}}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{$user->email}}</td>
	</tr>
	<tr>
		<td>Created At</td>
		<td>{{ date("m/d/y g:ia",strtotime($user->created_at)) }}</td>
	</tr>
  </table>
</div>
@endforeach


    </section>
</div>


@stop