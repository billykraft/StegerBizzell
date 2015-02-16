<?php

echo "<script>var vizualDirectory = new Array(); ";

$page = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

for($i=0;$i<strlen($page);$i++){
	if($page[$i]=='/'){
		$page[$i]='@';
	}
}

$root = $_SERVER['DOCUMENT_ROOT'];

if( is_dir("$root/$pathToVizual/uploadedFiles/$page") ){
	$times = scandir( "$root/$pathToVizual/uploadedFiles/$page" );

	for($i=0;$i<sizeof($times);$i++){
		
		if( strlen($times[$i]) > 2 ){

			echo "vizualDirectory[\"$times[$i]\"] = new Array(); var vizualIndex = 0; ";

			$items = scandir( "$root/$pathToVizual/uploadedFiles/$page/$times[$i]" );

			for($j=0;$j<sizeof($items);$j++){

				if( strlen($items[$j]) > 2 ){

					echo "vizualDirectory[\"$times[$i]\"][vizualIndex++] = \"$items[$j]\"; ";

				}

			}

		}

	}
}

echo "</script>";

?>