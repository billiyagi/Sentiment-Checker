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
	/** 
	 * Get view from views folder
	 */
	public function view($viewFile, $data = [])
	{
		extract($data);
		require_once(__DIR__ . "/../views/" . $viewFile . ".php");
	}
}
