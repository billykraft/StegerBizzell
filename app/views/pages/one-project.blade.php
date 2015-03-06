@extends('layouts.pages')

@section('content')


<div class="page-content">

<script>var picURLs = new Array();</script>

<div class="pad50">
	<h4>{{ $gallery->description }}</h4>		
	<hr>
</div>

@if(Auth::check())
{{ Form::open(array('url' => url("morePhotos/$gallery->gallery_id"), 'files' => true)) }}
<input class="margins15 dash-btn" onchange="vizualUploadChange();" type="file" name="file[]" accept="image/*" multiple>
<button type="submit" style="display: block; width: 200px;" type="button" class="btn btn-success btn-md margins15 dash-btn"><span class="glyphicon glyphicon-plus"></span>Add Pictures</button>
<br/>
{{ Form::close() }}
@endif

@foreach ( $picNames as $pic )

<div class="pic-gallery">
<img name="pics" onclick="zoom(this);" style="height:150px" class="thumbnail gallery-pos-pic" src="{{ $path . $pic }}"/>
@if(Auth::check())
<span class="glyphicon glyphicon-trash gallery-pos-icon" aria-hidden="true" onclick='pic_delete("{{ $path.$pic }}" );'></span>
@endif
</div>

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

@if(Auth::check())

function pic_delete(pic){
	if( confirm("Are you sure you want to remove this picture?") ){
		$.ajax({
	        type:  'post',
	        cache:  false ,
	        url:  '{{ url("/removePhoto") }}',
	        data:  {photo:pic},
	        success: function(resp) {
	        	alert(resp);
	        	window.location = window.location;
	        }  
	    });
	}
}

@endif

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





