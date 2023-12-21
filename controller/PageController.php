<?php

namespace Controller;

use app\modules\SensorsModule;

class PageController extends Controller
{
	public function notFound()
	{
		return $this->view("errors/404");
	}
	public function index()
	{
		return $this->view("pages/home");
	}

	public function about(){

		$sensorsModule = new SensorsModule();
		return $this->view("pages/about", compact("sensorsModule"));
	}
	
}
