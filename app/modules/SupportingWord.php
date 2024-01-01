<?php

namespace App\Modules;

use App\Modules\CollectionModule as Collection;
use App\Decorators\MergeCollectionDecorator;
use App\Models\AfterSupportWord;
use App\Models\BeforeSupportWord;

class SupportingWord
{
	public $supportingWordsAfterModel, $supportingWordsBeforeModel, $collectionModule, $mergeCollectionDecorator;

	/**
	 * Membuat instance baru dari kelas GoodWord
	 * @param array $badWords
	 */
	public function __construct()
	{
		$this->supportingWordsAfterModel = new AfterSupportWord;
		$this->supportingWordsBeforeModel = new BeforeSupportWord;
		$this->collectionModule = new Collection;
		$this->mergeCollectionDecorator = new MergeCollectionDecorator($this->collectionModule);
	}

	/**
	 * Mengecek apakah kata tersebut merupakan kata pendukung sebeleum kata kunci negatif
	 * @param string $word
	 * @return bool
	 */

	public function isSupportingWordBefore($word)
	{
		// ambil semua data badword
		$supportingWords = $this->supportingWordsBeforeModel->getAll();

		// gabungkan array menjadi satu dimensi
		$supportingWordsSingleDimension = $this->mergeCollectionDecorator->mergeToSingleDimension($supportingWords, 'word');

		// Cek apakah kata tersebut merupakan kata pendukung
		return [
			'before' => $this->mergeCollectionDecorator->inCollection($word, $supportingWordsSingleDimension),
			'word'	=>	$word
		];
	}

	/**
	 * Mengecek apakah kata tersebut merupakan kata pendukung setelah kata kunci negatif
	 * @param string $word
	 * @return bool
	 */
	public function isSupportingWordAfter($word)
	{
		// ambil semua data badword
		$supportingWords = $this->supportingWordsAfterModel->getAll();

		// gabungkan array menjadi satu dimensi
		$supportingWordsSingleDimension = $this->mergeCollectionDecorator->mergeToSingleDimension($supportingWords, 'word');

		// Cek apakah kata tersebut merupakan kata pendukung
		return [
			'after' => $this->mergeCollectionDecorator->inCollection($word, $supportingWordsSingleDimension),
			'word'	=>	$word
		];
	}
}
