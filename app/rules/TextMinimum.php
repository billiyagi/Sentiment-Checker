<?php

namespace App\Rules;

use App\Modules\CollectionModule as Collection;

class TextMinimum
{

	protected $approvalLimit = 4;

	/** 
	 * Check request if it's approved or not
	 * @param string $text
	 * @param callable $callback
	 * @return void
	 */
	public function spy($text, $callback)
	{
		$collection = new Collection;
		$result = count($collection->textToArray($text, " ")) <= $this->approvalLimit;
		return call_user_func($callback, $result);
	}
}
