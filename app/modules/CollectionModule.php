<?php

namespace App\Modules;

class CollectionModule
{
	/** 
	 * Pecah teks menjadi array
	 * @return array
	 * @param string $text
	 * @param string $separator
	 */
	function textToArray($text, $separator) //contoh param "Hallo dunia!"
	{
		return explode($separator, $text);
	}

	/** 
	 * Gabungkan array menjadi sebuah teks
	 * @return string
	 * @param array $array
	 * @param string $separator
	 */
	function mergeArray($array, $separator)
	{
		return implode($separator, $array);
	}
}
