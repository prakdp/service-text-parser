<?php

namespace App\Parser;

use App\ParserInterface;

class ToNumberParser implements ParserInterface
{
	public function parseText($text)
	{
		if (preg_match('/(\d+)/', $text, $matches)) {
			return (int) $matches[1];
		}

		return '';
	}
}