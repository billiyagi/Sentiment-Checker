<?php

namespace App\Rules;

use App\Modules\CollectionModule as Collection;

class TextMinimum
{
	protected $approvalLimit = 4;

	public function spy($text, $callback)
	{
		$collection = new Collection;
		$result = count($collection->textToArray($text, " ")) <= $this->approvalLimit;
		return call_user_func($callback, $result);
	}

	public function approveRequest($callback = null)
	{
		return;
	}

	public function dropRequest()
	{
		return false;
	}
}
