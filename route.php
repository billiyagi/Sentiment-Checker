<?php
require_once(__DIR__ . '/bootstrap.php');
require_once('../app/modules/SensorsModule.php');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Mengatur route aplikasi web
|
*/

$request->get('/', function () {
	return (new Controller\PageController)->index();
});

$request->get('about', function () {
	return (new Controller\PageController)->about();
});



