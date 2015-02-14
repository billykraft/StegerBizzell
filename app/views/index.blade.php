@extends('layouts.default')

@section('content')



      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron text-center">
        <h1>Steger & Bizzell Engineering</h1>
        <h3>Engineers, Planners, Surveyors.</h3>
        <p>
          <a class="btn btn-lg ghost-btn" href="{{ url('/services') }}" role="button">Learn More &raquo;</a>
        </p>
      </div>
<div class="theme-wrap">
</div>

    <div class="main">

      <div class="col-md-12 text-center" id="learn">

        <div class="col-md-12">
            <h4 class="tagline"><b>Experience</b> gives us a real advantage in generating consistently high quality designs and accurately predicting schedules and construction costs.</h4>
        </div>

        <div class="col-md-4">
          <i class="fa fa-gears" id="lg-icon"></i>
            <h2 class="head">Our Experience</h2>
            <p class="desc editable-txt">For more than thirty-five years, Steger Bizzell has been a leader in the Central Texas consulting, engineering, and surveying community.</p>
        </div>


        <div class="col-md-4">
          <i class="fa fa-users" id="lg-icon"></i>
            <h2 class="head">Our Customers</h2>
            <p class="desc">Throughout our history, we have created reliable and economical designs for municipalities, water supply corporations, businesses and individuals.</p>
        </div>


        <div class="col-md-4">
          <i class="fa fa-check-circle-o" id="lg-icon"></i>
            <h2 class="head">Our Expertise</h2>
            <p class="desc">Water and Wastewater Utility Design, Road and Bridge Design, Land Development, Full Service Surveying, GIS mapping systems, Hydraulic modeling, Utility Rate Studies, Capital Improvement and Cost Analysis.</p>
        </div>


      </div>

    </div> <!-- /main -->


@stop