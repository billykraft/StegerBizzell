@extends('layouts.account')

@section('content')


<div class="content col-md-9">

    <section>

<div class="well account-head">
<h3 class="text-center">{{ $pageTitle }}</h3>
</div>

<br class="clear"/>
<div class="col-md-12">
<div class="login-form col-md-12">
{{ Form::model(['action' => 'UsersController@editUserStore']) }}
        <div class="form-group">
            {{ Form::text('first_name', $thisUser->first_name, array('class' => 'form-control', 'placeholder' => 'First Name') )}}
            {{ $errors->first('first_name', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::text('last_name', $thisUser->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name') )}}
            {{ $errors->first('last_name', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::email('email', $thisUser->email, array('class' => 'form-control', 'placeholder' => 'Email Address') )}}
            {{ $errors->first('email', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password') )}}
            {{ $errors->first('password', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password2', array('class' => 'form-control', 'placeholder' => 'Retype Password') )}}
            {{ $errors->first('password2', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="submit">
        {{Form::submit('Update User &raquo;', ['class' => 'btn btn-success zennia-btn pad25', 'style' => 'width: 100%;'])}}
            <br/><br/>
            <a href="{{ url('account/users') }}" class='btn btn-danger zennia-btn pad25'>Cancel</a>
        </div>
    {{ Form::close() }}
</div>
</div>

    </section>
</div>

@if (Session::get('flash_message'))
<div class="alert alert-success alert-dismissible" style="width:100%;height:7%;position:absolute;top:93%">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> {{ Session::get('flash_message') }}</div>
@endif

@stop
