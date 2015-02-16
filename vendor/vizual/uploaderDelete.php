<?php

$page = $_SERVER['HTTP_REFERER'];

$i=1;
while($i<strlen($page)){
	if( $page[$i-1] == '/' && $page[$i] == '/' ){
		$i++;
		break;
	}
	$i++;
}

$page = substr($page,$i,strlen($page)-$i);

for($i=0;$i<strlen($page);$i++){
	if($page[$i]=='/'){
		$page[$i]='@';
	}
}

$root = $_SERVER['DOCUMENT_ROOT'];

$pathToVizual = variables::$pathToVizual;

$folders = scandir( "$root/$pathToVizual/uploadedFiles/$page" );

$folder_number = intval( $_POST['folder_num'] );

$folder = $folders[$folder_number+2];

$files = scandir( "$root/$pathToVizual/uploadedFiles/$page/$folder" );

for($i=0;$i<sizeof($files);$i++){

	if( strlen($files[$i]) > 2 ){

		unlink( "$root/$pathToVizual/uploadedFiles/$page/$folder/$files[$i]" );
	}

}

rmdir( "$root/$pathToVizual/uploadedFiles/$page/$folder" );

?>
