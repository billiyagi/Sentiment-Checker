<?php

namespace Controller;

use app\modules\SensorsModule;
use App\Modules\PDOModule;
use App\Models\BadWord;

class PageController extends Controller
{
	/** 
	 * Not found Page
	 */
	public function notFound()
	{
		return $this->view("errors/404");
	}

	/** 
	 * Home Page
	 */
	public function index()
	{
		return $this->view("pages/home");
	}

	/** 
	 * About Page
	 */
	public function about()
	{
		return $this->view("pages/about");
	}
}
