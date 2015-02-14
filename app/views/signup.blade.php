@extends('layouts.login')

@section('content')


<div class="col-md-4">
    &nbsp;
</div>

<div class="col-md-4">
    <h2 class="text-center">Cube</h2>
{{ Form::open() }}
        <div class="form-group">
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('first_name', null, array('class' => 'form-control') )}}
            {{ $errors->first('first_name', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('last_name', 'Last Name') }}
            {{ Form::text('last_name', null, array('class' => 'form-control') )}}
            {{ $errors->first('last_name', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email Address') }}
            {{ Form::email('email', null, array('class' => 'form-control') )}}
            {{ $errors->first('email', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control') )}}
            {{ $errors->first('password', '<span class=alert-danger>:message</span>') }}
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" required> You have read & agree to the 
                <a href="{{ url('/terms-of-use'); }}" target="_blank">Terms of service</a>.
            </label>
        </div>
        <div class="submit">
        {{Form::submit('Sign Up!', ['class' => 'btn btn-primary'])}}
        </div>
    {{ Form::close() }}
</div>

<div class="col-md-4">
    &nbsp;
</div>

@stop