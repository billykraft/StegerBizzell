@extends('layouts.pages')

@section('content')

<div class="page-main">

	<div class="wrap">

		@if(Auth::check())
		<script>vizualDrawPlus();</script>
		@endif

		<p id="projs_title" class="vizual-unique-txt" note="dark">{{ vizualize::unique_text("projs_title") }}</p>

			@foreach ($galleries as $gallery)
			@if(Auth::check())
			<a style="color:red;cursor:pointer" class="vizual-show" onclick="delete_('{{ url("projects/delete/$gallery->gallery_id") }}');">delete</a>
			@endif
			<li class="well" <?php if(strlen($gallery->directory) > 0 ){ echo "style='cursor:pointer' onclick='window.location=\"" . url("/projects/$gallery->gallery_id") . "\"'"; } ?> >
				{{ $gallery->name }}
				<div style="float:right"><font color="#8585AD">
					Created {{ variables::date_format($gallery->created_at) }}
				</font></div>
			</li>
			@endforeach

			@if(sizeof($galleries)==0)
			<p class="well">No project galleries have been uploaded yet</p>
			@endif

		<asdf id="old_projs" class="vizual-unique-txt" note="dark">
			{{ vizualize::unique_text("old_projs") }}
		</asdf>
	</div>
</div> <!-- /main -->

<script>
function delete_(url){
	if( confirm("Are you sure you want to delete this project?") ){
		window.location = url;
	}
}
</script>

@stop