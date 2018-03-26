<?php

namespace App\Parser;

use App\ParserInterface;

class RemoveSpacesParser implements ParserInterface
{
	public function parseText($text)
	{
		return str_replace(' ', '', $text);
	}
}