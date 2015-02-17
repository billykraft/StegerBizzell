<?php

class VizualController extends \BaseController {

	public function submit(){

        include "$_SERVER[DOCUMENT_ROOT]". variables::$pathToVizual ."/vizual.php";

        $goto = $_SERVER['HTTP_REFERER'];

		header("Location: $goto");

		return Redirect::to(url(""));

	}

	public function upload(){

		include "$_SERVER[DOCUMENT_ROOT]". variables::$pathToVizual ."/uploaderSubmit.php";

		if( $inserted == 1 ){

			DB::table("galleries")->insert(array(

				"directory" => "$page",
				"folder" => "$time",
				"name" => "$name",
				"description" => "$description",
				"cover" => "$coverPic",
				"created_at" => variables::date(),

			));

		} else {

			DB::table("galleries")->insert(array(

				"directory" => "",
				"folder" => "",
				"name" => "$name",
				"description" => "$description",
				"cover" => "$coverPic",
				"created_at" => variables::date(),

			));

		}

		return Redirect::to(url("/projects"));

	}

}










