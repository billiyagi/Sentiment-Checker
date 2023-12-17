<?php
require_once(__DIR__ . '/bootstrap.php');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Mengatur route aplikasi web
|
*/
$registeredRoutes = [
	'root' => '/',
	'about' => '/about',
];

if (!in_array($_SERVER['REQUEST_URI'], $registeredRoutes)) {
	return (new Controller\PageController)->notFound();
}


$request->get($registeredRoutes['root'], function ($home = new Controller\PageController) {
	return $home->index();
});
$request->get($registeredRoutes['about'], function ($home = new Controller\PageController) {
	return $home->about();
});
