<?php

namespace App\Parser;

use App\ParserInterface;

class StripTagsParser implements ParserInterface
{
	public function parseText($text)
	{
		return strip_tags($text);
	}
}