<?php

class vizualize {

	private static function prepare($orgID){
		$pagename = $_SERVER['REQUEST_URI'];

		$criteria = "identifier like '%$pagename%' order by identifier";

		$pagecomponents = DB::table('components')->whereRaw($criteria)->get();

		$pics = array();
		$texts = array();
		$uniques = array();

		foreach($pagecomponents as $component){

			if( strpos($component->identifier, "img") ){
				$pics[] = $component->content;
			}
			else if( strpos($component->identifier, "txt") ){
				$texts[] = $component->content;
			}

		}

		$criteria = "identifier like '%_form' order by identifier";
		
		$creds = variables::vars();

		$con=mysqli_connect($creds['host'],$creds['username'],$creds['password'],$creds['database']);
		// Check connection
		if (mysqli_connect_errno())
		  {
		  	die();
		  }
		  
		// Perform queries 
		$result = mysqli_query($con,"SELECT * FROM components where $criteria");

		if( !$result ){
			die("error");
		}

		while( $component = mysqli_fetch_array($result) ){

			$key = $component['identifier'];
			$key = substr($key, 0, strlen($key)-5); //_form is 5 chars long

			$uniques[$key] = $component['content'];

		}

		mysqli_close($con);

		global $GTexts, $GPics, $GUniques;

		$GTexts = $texts;
		$GPics = $pics;
		$GUniques = $uniques;
	}

	public static function text($id, $index){
		vizualize::prepare($id);

		global $GTexts;
		$texts = $GTexts;

		if( $index >= 0 && $index < sizeof($texts) ){
			return $texts[$index];
		}
		return "sample text";
	}

	public static function pic($id, $index){
		vizualize::prepare($id);

		global $GPics;
		$pics = $GPics;

		if( $index >= 0 && $index < sizeof($pics) ){
			return $pics[$index];
		}
		return "";
	}

	public static function unique_text($key){
		vizualize::prepare("");

		global $GUniques;
		$uniques = $GUniques;

		if( array_key_exists($key, $uniques) ){
			return $uniques[$key];
		}
		
		return "sample text";
	}

	public static function unique_pic($key){
		vizualize::prepare("");

		global $GUniques;
		$uniques = $GUniques;

		if( array_key_exists($key, $uniques) ){
			return $uniques[$key];
		}

		return "";
	}

}

?>