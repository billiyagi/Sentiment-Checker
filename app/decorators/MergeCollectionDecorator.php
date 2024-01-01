<?php

namespace App\Decorators;

class MergeCollectionDecorator extends CollectionDecorator
{
	/**
	 * Gabungkan array menjadi sebuah teks dan check apakah di dalamnya juga terdapat array lagi
	 * @return string
	 * @param array $array
	 * @param string $separator
	 */
	public function mergeArray($array, $separator)
	{
		$results = '';
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$results .= $this->collection->mergeArray($value, $separator);
			} else {
				$results .= $value . $separator;
			}
		}

		return $results;
	}
}
