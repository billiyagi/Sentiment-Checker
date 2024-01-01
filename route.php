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

$request->get('/', function () {
	return (new Controller\PageController)->index();
});

$request->get('/about', function (PageController $pageController) {

	return $pageController->about();
});


$request->get('/sentiment/check', function () {
	// $sensorsModule = new SensorsModule();
	// $text = "dasar lu anjing sialan ngentot bangsat lah bapak kau";
	// $badWord = new TextMinimum();
	// $badWord->spy($text, function ($result) use ($sensorsModule, $text) {
	// 	if (!$result) {
	// 		return $sensorsModule->sensorSentiment($text);
	// 	}
	// });

	return (new Controller\SentimentController)->index();
});
