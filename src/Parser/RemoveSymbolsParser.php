<?php

namespace App\Parser;

use App\ParserInterface;

class RemoveSymbolsParser implements ParserInterface
{
	public function parseText($text)
	{
		return preg_replace('/[\.\,\/\!\@\#\$\%\&\*\(\)]/', '', $text);
	}
}