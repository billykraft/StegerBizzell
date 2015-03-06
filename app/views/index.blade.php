@extends('layouts.default')

@section('content')



      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron text-center">
        <!--h1>Steger & Bizzell Engineering</h1-->
        <h1 class="vizual-unique-txt" id="main_title">{{ vizualize::unique_text("main_title") }}</h1>
        <!--h3>Engineers, Planners, Surveyors.</h3-->
        <h3 class="vizual-unique-txt" id="main_desc">{{ vizualize::unique_text("main_desc") }}</h3>
        <p>
          <a class="btn btn-lg ghost-btn" href="{{ url('/services') }}" role="button">Learn More &raquo;</a>
        </p>
      </div>
<div class="theme-wrap vizual-unique-img" id="main_bckgrd" style="background-image:{{ vizualize::unique_pic('main_bckgrd') }}">
  <div style="margin-top:-580px;width:100%;height:700px;background-color:rgba(0,0,0,0.2);"></div>
</div>

    <div class="main">

      <div class="col-md-12 text-center" id="learn">

        <div class="col-md-12">
            <!--h4 class="tagline"><b>Experience</b> gives us a real advantage in generating consistently high quality designs and accurately predicting schedules and construction costs.</h4-->
            <h4 class="tagline vizual-unique-txt" note="dark" id="exp1">{{ vizualize::unique_text("exp1") }}</h4>
        </div>

        <div class="col-md-4">
          <i class="fa fa-gears" id="lg-icon"></i>
            <!--h2 class="head">Our Experience</h2-->
            <h2 class="head vizual-unique-txt" id="exp2" note='dark'>{{ vizualize::unique_text("exp2") }}</h2>
            <!--p class="desc editable-txt">For more than thirty-five years, Steger Bizzell has been a leader in the Central Texas consulting, engineering, and surveying community.</p-->
            <p class="desc vizual-unique-txt" id="exp3" note='dark'>{{ vizualize::unique_text("exp3") }}</p>
        </div>


        <div class="col-md-4">
          <i class="fa fa-users" id="lg-icon"></i>
            <!--h2 class="head">Our Customers</h2-->
            <h2 class="head vizual-unique-txt" id="cust1" note="dark">{{ vizualize::unique_text("cust1") }}</h2>
            <!--p class="desc">Throughout our history, we have created reliable and economical designs for municipalities, water supply corporations, businesses and individuals.</p-->
            <p class="desc vizual-unique-txt" id="cust2" note="dark">{{ vizualize::unique_text("cust2") }}</p>
        </div>


        <div class="col-md-4">
          <i class="fa fa-check-circle-o" id="lg-icon"></i>
            <!--h2 class="head">Our Expertise</h2-->
            <h2 class="head vizual-unique-txt" id="rtise1" note="dark">{{ vizualize::unique_text("rtise1") }}</h2>
            <!--p class="desc">Water and Wastewater Utility Design, Road and Bridge Design, Land Development, Full Service Surveying, GIS mapping systems, Hydraulic modeling, Utility Rate Studies, Capital Improvement and Cost Analysis.</p-->
            <p class="desc vizual-unique-txt" id="rtise2" note="dark">{{ vizualize::unique_text("rtise2") }}</p>
        </div>


      </div>

    </div> <!-- /main -->


@stop
