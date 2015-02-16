@extends('layouts.account')

@section('content')


<div class="content col-md-9">

    <section>

<div class="well account-head">
<h3 class="text-center">{{ $pageTitle }}</h3>
</div>


<div class="table-responsive">
  <table class="table table-striped">


  </table>
</div>



    </section>
</div>

@if (Session::get('flash_message'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> {{ Session::get('flash_message') }}</div>
@endif

@stop