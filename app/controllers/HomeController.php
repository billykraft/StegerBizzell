<?php

class HomeController extends BaseController {

	public function showHome()
	{
		$pageTitle = 'Home';
		return View::make('index', compact('pageTitle'));
	}


	public function showServices()
	{
		$pageTitle = 'Services';
		return View::make('pages.services', compact('pageTitle'));
	}

		public function showRoadsBridges()
		{
			$pageTitle = vizualize::unique_text("roadsNbridges");
			return View::make('pages.roads-and-bridges', compact('pageTitle'));
		}

		public function showUtilityDesign()
		{
			$pageTitle = vizualize::unique_text("utilityDesign");
			return View::make('pages.utility-design', compact('pageTitle'));
		}

		public function showLandDevelopment()
		{
			$pageTitle = vizualize::unique_text("landDev");
			return View::make('pages.land-development', compact('pageTitle'));
		}

		public function showLandSurveying()
		{
			$pageTitle = vizualize::unique_text("landSurv");
			return View::make('pages.land-surveying', compact('pageTitle'));
		}

	public function showProjects()
	{
		$pageTitle = 'Projects';

		$galleries = DB::table("galleries")->orderBy("created_at",'desc')->get();

		return View::make('pages.projects', compact('pageTitle','galleries'));
	}

	public function deleteProject($id){
		if( !Auth::check() ){ die(); }

		$gals = DB::table("galleries")->orderBy('folder','asc')->get();

		for($i=0;$i<sizeof($gals);$i++){
			if( $gals[$i]->gallery_id == $id ){
				$_POST['folder_num'] = "$i";
				break;
			}
		}

		if( strlen($gals[$i]->directory) > 0 ){
			include "$_SERVER[DOCUMENT_ROOT]" . variables::$pathToVizual . "/uploaderDelete.php";
		}

		DB::table("galleries")->where("gallery_id",'=',$id)->delete();

		return Redirect::to(url("/projects"));
	}

	public function showProject($id){

		$gallery = DB::table("galleries")->where("gallery_id",'=',$id)->get()[0];
		$folder = floatval($gallery->folder);
		$path = variables::$pathToVizual . "/uploadedFiles/$gallery->directory/$folder/";
		$pics = scandir($_SERVER['DOCUMENT_ROOT'] . $path);
		$picNames = array();
		for($i=0;$i<sizeof($pics);$i++){
			if( strlen($pics[$i]) > 2 ){
				$picNames[] = $pics[$i];
			}
		}

		$pageTitle = $gallery->name;

		return View::make('pages.one-project', compact('pageTitle', 'gallery', 'picNames','path'));
	}

	public function showContactUs()
	{
		$pageTitle = 'Contact Us';
		return View::make('pages.contact-us', compact('pageTitle'));
	}

	public function show500()
	{
		return View::make('pages.500');
	}
	public function show404()
	{
		return View::make('pages.404');
	}
}