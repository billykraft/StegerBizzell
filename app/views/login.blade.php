@extends('layouts.login')

@section('content')

<div class="col-md-4">
    &nbsp;
</div>
<div class="col-md-4 login-form">
    <h2 class="text-center login-logo"><a href="{{url('/')}}"><img src="{{ url('/img/logo.png') }}" /></a></h2>
{{ Form::open(['route' => 'account.sessions.store']) }}

    <div class="form-group">
        {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email Address') )}}
    </div>
    <div class="form-group">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password') )}}
    </div>

    <!--div class="checkbox">
        <label>
            <input type="checkbox"> Remember me
        </label>
    </div-->
    <div class="submit">
        {{Form::submit('Login', ['class' => 'btn btn-lg btn-primary cedar-btn', 'style' => 'width:100%; padding:20px;'])}}

    </div>
{{ Form::close() }}
</div>

<div class="col-md-4">
    &nbsp;
</div>

@stop
