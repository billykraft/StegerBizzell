<?php

$pathToVizual = variables::$pathToVizual;

if( !isset($_FILES['file']) ){
	die("Timed out");
}

$files = $_FILES['file']['tmp_name'];
$filenames = $_FILES['file']['name'];

$root = $_SERVER['DOCUMENT_ROOT'];

$page = $_SERVER['HTTP_REFERER'];

if( !isset($_POST['vizualTitle']) || !isset($_POST['vizualDescription']) || !isset($_POST['vizualCoverPic']) ){ die(); }

$name = $_POST['vizualTitle'];
$description = $_POST['vizualDescription'];
$coverPic = $_POST['vizualCoverPic'];

if( sizeof($files) == 1 && strlen($files[0]) == 0 ){
	$inserted = 0;	
}
else {

$i=1;
while($i<strlen($page)){
	if( $page[$i-1] == '/' && $page[$i] == '/' ){
		$i++;
		break;
	}
	$i++;
}

$page = substr($page,$i,strlen($page)-$i);

$first = -1;

for($i=0;$i<strlen($page);$i++){
	if($page[$i]=='/'){
		if( $first == -1 ){
			$first = $i;
		}
		$page[$i]='@';
	}
}

$page = substr($page,$first);

if ( !is_dir("$root/$pathToVizual/uploadedFiles/$page") ){
	mkdir( "$root/$pathToVizual/uploadedFiles/$page" );
}

$time = (string)microtime(true);

$times = explode(".",$time);

if( !isset($times[1]) ){
	$time = $times[0] . ".00";
}
else if( strlen($times[1]) > 2 ){
	$time = $times[0] . "." . substr($times[1],0,2);
}
else if( strlen($times[1]) < 2 ){
	$time = $times[0] . "." . "00";
}
else {
	$time = $times[0] . "." . $times[1];
}

mkdir( "$root/$pathToVizual/uploadedFiles/$page/$time" );

$inserted = 1;

for($i=0;$i<sizeof($files);$i++){

	$type = explode("/",$_FILES['file']['type'][0])[0];
	$ext = explode("/",$_FILES['file']['type'][0])[1];

	$ns = "$i";

	while(strlen($ns) < 5){
		$ns = "0" . $ns;
	}

	$file_name = "no$ns";
	$target_path = "$root/$pathToVizual/uploadedFiles/$page/$time/";
	move_uploaded_file($files[$i], $target_path . $file_name . ".$type.$ext");

	if( $filenames[$i] == $coverPic ){
		$coverPic = "$file_name.$type.$ext";
	}

}

}

?>
