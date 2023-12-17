<?php

namespace App\Modules;

include_once(__DIR__ . '/interfaces/Request.php');

class RequestModule
{
	public function get($path, $callback)
	{
		if ($path == $_SERVER['REQUEST_URI']) {
			return call_user_func($callback);
		}
	}

	public function post($path, $callback)
	{
		if ($path == $_SERVER['REQUEST_URI']) {
			return call_user_func($callback);
		}
	}

	public function getOnSubmit($submitName, $callback)
	{
		if (isset($_GET[$submitName])) {
			return call_user_func($callback);
		}
	}

	public function postOnSubmit($submitName, $callback)
	{
		if (isset($_POST[$submitName])) {
			return call_user_func($callback);
		}
	}
}
