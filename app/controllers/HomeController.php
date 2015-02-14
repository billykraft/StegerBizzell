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
			$pageTitle = 'Roads and Bridges';
			return View::make('pages.roads-and-bridges', compact('pageTitle'));
		}

		public function showUtilityDesign()
		{
			$pageTitle = 'Utility Design';
			return View::make('pages.utility-design', compact('pageTitle'));
		}

		public function showLandDevelopment()
		{
			$pageTitle = 'Land Development';
			return View::make('pages.land-development', compact('pageTitle'));
		}

		public function showLandSurveying()
		{
			$pageTitle = 'Land Surveying';
			return View::make('pages.land-surveying', compact('pageTitle'));
		}

	public function showProjects()
	{
		$pageTitle = 'Projects';
		return View::make('pages.projects', compact('pageTitle'));
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