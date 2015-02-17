@extends('layouts.pages')

@section('content')


<div class="col-md-9 page-content">

<script>var picURLs = new Array();</script>

<div class="pad50">
	<h4>{{ $gallery->description }}</h4>		
	<hr>
</div>

@foreach ( $picNames as $pic )

<img name="pics" onclick="zoom(this);" class="thumbnail pic-gallery" src="{{ $path . $pic }}"/>

<script>picURLs.push( "{{ $path . $pic }}" );</script>

@endforeach

<br class="clear"/>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $gallery->name }}</h4>
      </div>
      <div class="modal-body">
      	<font color='#000000' onclick="picLeft();" size='10' style="opacity:0.2;position:absolute;top:45%"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></font>
        <div id='overlayPic' style="width:100%;height:500px;background-position:center;background-size:contain;background-repeat:no-repeat"></div>
        <font color='#000000' onclick="picRight();" size='10' style="opacity:0.2;position:absolute;top:45%;left:92.5%"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></font>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="dismiss();">Close</button>
      </div>
    </div>
  </div>
</div>



</div>
<script>

var current;

var zoomed = false;

function dismiss(){
	zoomed = false;
	$('#myModal').modal('toggle');
}

function zoom(el){

	zoomed = true;

	current = el;

	var els = document.getElementsByName("pics");

	for(var i = 0; i < els.length; i++){
		if( els[i] == el ){
			document.getElementById("overlayPic").style.backgroundImage = "url(" + picURLs[i] + ")";
			break;
		}
	}

	$('#myModal').modal('toggle');

}

function picLeft(){

	var els = document.getElementsByName("pics");

	var currentIndex;

	for(var i = 0; i < els.length; i++){
		if( els[i] == current ){
			currentIndex = i;
			break;
		}
	}

	if( currentIndex > 0 ){ currentIndex -= 1; }

	current = els[currentIndex];

	document.getElementById("overlayPic").style.backgroundImage = "url(" + picURLs[currentIndex] + ")";

}

function picRight(){

	var els = document.getElementsByName("pics");

	var currentIndex;

	for(var i = 0; i < els.length; i++){
		if( els[i] == current ){
			currentIndex = i;
			break;
		}
	}

	if( currentIndex < els.length - 1 ){ currentIndex += 1; }

	current = els[currentIndex];

	document.getElementById("overlayPic").style.backgroundImage = "url(" + picURLs[currentIndex] + ")";

}

document.onkeydown = function(e) {
	if( !zoomed ){ return; }

    var holder;
    //IE uses this
    if(window.event) {
        holder = window.event.keyCode;
    }
    //FF uses this
    else {
        holder = event.which;
    } 

    if( keyz(holder) ){
    	e.preventDefault();
    }

}

function keyz(key) {
    if( key === 37 || key === 38 ) {
        picLeft();
        return true;
    }
    else if( key === 39 || key === 40 ){
    	picRight();
    	return true;
    }
    return false;
}

</script>

@stop





