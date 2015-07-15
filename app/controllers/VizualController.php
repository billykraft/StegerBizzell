<?php

class VizualController extends \BaseController {

	public function submit(){

        include "$_SERVER[DOCUMENT_ROOT]". variables::$pathToVizuals ."/vizual.php";

        return Redirect::back();

	}

	public function upload(){

		include "$_SERVER[DOCUMENT_ROOT]". variables::$pathToVizuals ."/uploaderSubmit.php";

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

	public function addMore($id){

		if( !Auth::check() ){ die(); }

		if( !isset($_FILES['file']) ){
			die("Timed out");
		}

		$files = $_FILES['file']['tmp_name'];
		$filenames = $_FILES['file']['name'];

		if( strlen($files[0]) == 0 ){
			return Redirect::to(url("/projects/$id"));
		}

		$gallery = DB::table("galleries")->where("gallery_id",$id)->get()[0];

		$path = $_SERVER['DOCUMENT_ROOT'] . "/uploadedFiles/" . $gallery->directory . "/" . $gallery->folder;

		$current_files = scandir($path);

		$max = -1;

		foreach($current_files as $file){
			$val = intval(substr($file,2));
			if( $val > $max ){
				$max = $val;
			}
		}

		$start = $max + 1;

		for($i=0;$i<sizeof($files);$i++){

			$type = explode("/",$_FILES['file']['type'][0])[0];
			$ext = explode("/",$_FILES['file']['type'][0])[1];

			$newpic = $start + $i;

			$ns = "$newpic";

			while(strlen($ns) < 5){
				$ns = "0" . $ns;
			}

			$file_name = "no$ns";
			move_uploaded_file($files[$i], $path . "/" . $file_name . ".$type.$ext");

		}

		return Redirect::to(url("/projects/$id"));

	}

	public function removePic(){

		//if( !Auth::check() ){ die("tough cookies."); }

		unlink($_SERVER['DOCUMENT_ROOT'].$_POST['photo']);

		die("Photo has been successfully removed!");

	}

}










