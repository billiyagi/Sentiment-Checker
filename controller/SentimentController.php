<?php

namespace Controller;

use app\modules\SensorsModule;
use App\Modules\PDOModule;
use App\Models\BadWord;
use App\Rules\TextMinimum;

class SentimentController extends Controller
{
	/** 
	 * Menampilkan halaman results dari sentiment analysis
	 * @return void
	 */
	public function index()
	{

		$sensorsModule = new SensorsModule();
		$badWord = new TextMinimum();


		$text = $_POST['text'];

		/** 
		 * Check if text is valid with the Rules
		 */
		$badWord->spy($text, function ($result) use ($sensorsModule, $text) {

			// If text is valid, then do the sentiment analysis
			if (!$result) {
				return $this->view("pages/result", [
					'result' => $sensorsModule->sensorSentiment($text),
					'text' => $text
				]);
			} else {
				// If text is invalid, then show the error page
				return $this->view("errors/invalid", ['message' => 'Text must be more than 5 characters']);
			}
		});
	}
}
