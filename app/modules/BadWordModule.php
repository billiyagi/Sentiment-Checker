<?php

namespace App\Modules;

use App\Models\BadWord;
use App\Modules\CollectionModule as Collection;
use App\Decorators\MergeCollectionDecorator;

class BadWordModule
{
	public $badWords, $badWordsModel, $collectionModule, $mergeCollectionDecorator;

	/**
	 * Membuat instance baru dari kelas GoodWord
	 * @param array $badWords
	 */
	public function __construct()
	{
		$this->badWordsModel = new BadWord;
		$this->collectionModule = new Collection;
		$this->mergeCollectionDecorator = new MergeCollectionDecorator($this->collectionModule);
	}

	/**
	 * Mengecek apakah kata tersebut merupakan kata negatif
	 * @param string $word
	 * @return bool
	 */
	public function isBadWord($word)
	{
		// ambil semua data badword
		$badWords = $this->badWordsModel->getAll();

		$badWordsSingleDimension = $this->mergeCollectionDecorator->mergeToSingleDimension($badWords, 'bad');

		// Cek apakah kata tersebut merupakan kata negatif
		return [
			'negatif' => $this->mergeCollectionDecorator->inCollection($word, $badWordsSingleDimension),
			'word'	=>	$word
		];
	}

	/**
	 * Simpan semua data badword
	 * @return array
	 */
	public function setBadWords(array $badWords)
	{
		return $this->badWords = $badWords;
	}
}
