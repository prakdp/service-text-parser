<?php

namespace App\Parser;

use App\ParserInterface;

class ReplaceSpacesToEolParser implements ParserInterface
{
	public function parseText($text)
	{
		return str_replace(' ', PHP_EOL, $text);
	}
}