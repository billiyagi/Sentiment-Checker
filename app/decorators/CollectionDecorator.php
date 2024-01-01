<?php

namespace App\Decorators;

use App\Modules\CollectionModule as Collection;


interface CollectionInterface
{
	public function textToArray($text, $separator);
	public function mergeArray($array, $separator);
}


abstract class CollectionDecorator implements CollectionInterface
{
	protected $collection;

	public function __construct(Collection $collection)
	{
		$this->collection = $collection;
	}

	/** 
	 * Pecah teks menjadi array
	 * @return array
	 * @param string $text
	 * @param string $separator
	 */
	public function textToArray($text, $separator)
	{
		return $this->collection->textToArray($text, $separator);
	}

	/** 
	 * Gabungkan array menjadi sebuah teks
	 * @return string
	 * @param array $array
	 * @param string $separator
	 */
	public function mergeArray($array, $separator)
	{
		return $this->collection->mergeArray($array, $separator);
	}

	/** 
	 * Mengecek apakah kata tersebut merupakan kata negatif
	 * @return bool
	 * @param string $word
	 */
	public function inCollection($word, $collection)
	{
		return in_array($word, $collection);
	}

	/** 
	 * Menggabungkan array menjadi sebuah array 1 dimensi
	 * @return array
	 * @param string $word
	 */
	public function mergeToSingleDimension($array, $column): array
	{
		$results = [];
		foreach ($array as $key => $value) {
			$results[] = $value->$column;
		}
		return $results;
	}

	/** 
	 * Menghitung jumlah array
	 * @return int
	 * @param array $array
	 */

	public function countArray($array): int
	{
		return count($array);
	}
}
