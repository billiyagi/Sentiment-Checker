<?php

namespace Controller;

use app\modules\SensorsModule;
use App\Modules\PDOModule;
use App\Models\BadWord;

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

	public function about()
	{
		return $this->view("pages/about");
	}
}
