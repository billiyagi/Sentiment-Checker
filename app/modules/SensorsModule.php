<?php

namespace App\Modules;

use App\Modules\BadWordModule;
use App\Modules\SupportingWord;
use App\Modules\CollectionModule;

class SensorsModule
{

	/**
	 * Mengecek sentimen dari kalimat
	 * @param string $text
	 * @return string
	 */
	function sensorSentiment($text)
	{
		$badWords = new BadWordModule;
		$supportingWords = new SupportingWord;
		$collection = new CollectionModule;

		// Memecah kalimat menjadi array kata-kata
		$words = $collection->textToArray($text, " ");

		// Jumlah kata dalam kalimat
		$totalWords = count($words);

		// Inisialisasi variabel sentimen
		$sentiment = [
			'before'	=>	null,
			'negatif'	=>	false,
			'after'		=>	null,
		];

		// Loop untuk memeriksa kalimat ambigu
		for ($i = 0; $i < $totalWords; $i++) {

			// Periksa apakah kata saat ini adalah badword
			if ($badWords->isBadWord($words[$i])['negatif']) {

				// Periksa apakah terdapat kata pendukung sebelumnya atau setelahnya
				$surroundingSupportingWord = ($i > 0 && $supportingWords->isSupportingWordBefore($words[$i - 1])) || ($i < $totalWords - 1 && $supportingWords->isSupportingWordAfter($words[$i + 1]));

				// Jika ditemukan kata pendukung, atur sentimen menjadi Negatif
				if ($surroundingSupportingWord) {
					$sentiment = [
						'support_before'	=>	$supportingWords->isSupportingWordBefore($words[$i - 1]),
						'negatif'	=>	$words[$i],
						'support_after'		=>	$supportingWords->isSupportingWordAfter($words[$i + 1])
					];
				}
			}
		}

		// Return Array sentiment
		return $sentiment;
	}
}
