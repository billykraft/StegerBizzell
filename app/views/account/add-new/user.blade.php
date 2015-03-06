@extends('layouts.account')

@section('content')


<div class="content col-md-9">
    <section>

<div class="well account-head">
<h3 class="text-center">{{ $pageTitle }}</h3>
</div>
<div class="col-md-12">
<div class="login-form col-md-12">
{{ Form::open(['action' => 'UsersController@store']) }}
        <div class="form-group">
            {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name') )}}
            {{ $errors->first('first_name', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name') )}}
            {{ $errors->first('last_name', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email Address') )}}
            {{ $errors->first('email', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password') )}}
            {{ $errors->first('password', '<span class=alert-danger>:message</span>') }}
        </div>
<!--         <div class="form-group">
        	{{ Form::select('Users_Permissions_id', array('2' => 'Editor', '3' => 'Basic User'), null, array('class' => 'form-control')) }}
            {{ $errors->first('Users_Permissions_id', '<span class=alert-danger>:message</span>') }}
        </div> -->
        <div class="submit">
        {{Form::submit('Create New User &raquo;', ['class' => 'btn btn-success zennia-btn pad25', 'style' => 'width: 100%;'])}}
            <br/><br/>
            <a href="{{ url('account/users') }}" class='btn btn-danger zennia-btn pad25'>Cancel</a>
        </div>
    {{ Form::close() }}
</div>
</div>
    </section>
</div>

@stop