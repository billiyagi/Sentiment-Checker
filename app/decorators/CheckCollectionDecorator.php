<?php

namespace App\Decorators;

class CheckCollectionDecorator extends CollectionDecorator
{
	/**
	 * Mengecek apakah kata tersebut merupakan kata negatif
	 * @param string $word
	 * @return bool
	 */
	public function inCollection($word, $collection)
	{
		// Cek apakah kata tersebut termasuk dalam $word
		return in_array($word, $collection);
	}
}
