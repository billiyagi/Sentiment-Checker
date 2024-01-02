<?php

namespace App\Modules;

include_once(__DIR__ . '/interfaces/Request.php');

class RequestModule
{

	/** 
	 * Menangani request GET
	 * @param string $path
	 * @param callable $callback
	 * @return void
	 */
	public function get($path, $callback)
	{
		// jika path kosong, maka set path ke '/'
		$_GET['page'] = (empty($_GET['page'])) ? '/' : $_GET['page'];
		if ($path == $_GET['page']) {
			$pageController = new \Controller\PageController;
			return call_user_func($callback, $pageController);
		}
	}

	/** 
	 * Menaangani request POST
	 * @param string $path
	 * @param callable $callback
	 * @return void
	 */

	public function post($path, $callback)
	{
		// jika path kosong, maka set path ke '/'
		$_POST['page'] = (empty($_POST['page'])) ? '/' : $_POST['page'];
		if ($path == $_POST['page']) {
			$pageController = new \Controller\PageController;
			return call_user_func($callback, $pageController);
		}
	}

	/** 
	 * Menangani request GET untuk tombol submit
	 * @param string $submitName
	 * @param callable $callback
	 * @return void
	 */
	public function getOnSubmit($submitName, $callback)
	{
		if (isset($_GET[$submitName])) {
			return call_user_func($callback);
		}
	}

	/** 
	 * Menangani request POST untuk tombol submit
	 * @param string $submitName
	 * @param callable $callback
	 * @return void
	 */
	public function postOnSubmit($submitName, $callback)
	{
		if (isset($_POST[$submitName])) {
			return call_user_func($callback);
		}
	}
}
