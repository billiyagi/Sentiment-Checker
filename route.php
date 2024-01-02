<?php
require_once(__DIR__ . '/bootstrap.php');
require_once('../app/modules/SensorsModule.php');


use App\Modules\PDOModule;
use Controller\PageController;
use App\Rules\TextMinimum;
use App\Modules\SensorsModule;
use Controller\SentimentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Mengatur route aplikasi web
|
*/

/** 
 * Menampilkan halaman utama
 */
$request->get('/', function () {
	return (new Controller\PageController)->index();
});

/** 
 * Menampilkan halaman about
 */
$request->get('/about', function (PageController $pageController) {

	return $pageController->about();
});


/** 
 * Menampilkan halaman results dari sentiment analysis
 */
$request->post('/sentiment/check', function () {
	return (new Controller\SentimentController)->index();
});
