<?php

if( !Auth::check() ){
	die();
}

$pics = editablePics();
$texts = editableTexts();
$uniques = editableUniques();

$pagename = $_SERVER['HTTP_REFERER'];

$arrayKeys = array_keys($pics);

for($i=0;$i<sizeof($pics);$i++){
	$item = $pics[$arrayKeys[$i]];

	if($item){
		$idString = $pagename . "_img_" . $arrayKeys[$i];
		DB::table('components')->whereRaw("identifier = '$idString'")->delete();
		DB::table('components')->insert(array("identifier"=>"$idString", "content"=>"$item"));
	}
}

$arrayKeys = array_keys($uniques);

for($i=0;$i<sizeof($texts);$i++){
	$item = $texts[$arrayKeys[$i]];;

	if($item){

		$idString = $pagename . "_txt_" . $arrayKeys[$i];
		DB::table('components')->whereRaw("identifier = '$idString'")->delete();
		DB::table('components')->insert(array("identifier"=>"$idString", "content"=>"$item"));
	}
}

$arrayKeys = array_keys($uniques);

for($i=0;$i<sizeof($uniques);$i++){
	$item = $uniques[$arrayKeys[$i]];;

	if($item){

		$idString = $arrayKeys[$i];

		DB::table('components')->whereRaw("identifier = '$idString'")->delete();
		DB::table('components')->insert(array("identifier"=>"$idString", "content"=>"$item"));
	}
}

function editablePics(){
	return editableItems("Img");
}

function editableTexts(){
	return editableItems("Txt");
}

function editableUniques(){
	return editableItems("unique");
}

function editableItems($itemType){

	$keys = array_keys($_POST);

	$ret = array();

	sort($keys, SORT_STRING);

	$count = 0;

	for($i=0;$i<sizeof($keys);$i++){

		$value = $_POST[$keys[$i]];

		// custom strings must start with "editable"!
		if( $itemType != "unique" && strpos($keys[$i], "editable", 0) == 0 ){
			// editable is 8 chars long
			if( strpos($keys[$i], $itemType, 8) ){

				if( strlen($value) > 0 ){
					$ret[$count] = $value;
				}
				$count++;

			}
		} else if($itemType == "unique" ) {
			$index = strpos($keys[$i], "_form");
			if( strlen($value) > 0 && $index > 0 ){
				$ret[$keys[$i]] = $value;
			}
			$count++;
		}

	}

	return $ret;

}

?>