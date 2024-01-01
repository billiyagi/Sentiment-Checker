<?php

namespace Controller;

use app\modules\SensorsModule;
use App\Modules\PDOModule;
use App\Models\BadWord;
use App\Rules\TextMinimum;

class SentimentController extends Controller
{
	public function index()
	{
		$sensorsModule = new SensorsModule();
		$badWord = new TextMinimum();


		$text = $_POST['text'];


		$badWord->spy($text, function ($result) use ($sensorsModule, $text) {
			if (!$result) {
				return $this->view("pages/result", [
					'result' => $sensorsModule->sensorSentiment($text),
					'text' => $text
				]);
			} else {
				return $this->view("errors/invalid", ['message' => 'Text must be more than 5 characters']);
			}
		});
	}
}
