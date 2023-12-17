<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
| Controller utama aplikasi web
|
*/

namespace Controller;

abstract class Controller
{
	public function view($viewFile, ...$data)
	{
		require_once(__DIR__ . "/../views/" . $viewFile . ".php");
	}
}
