<?php

namespace App\Parser;

use App\ParserInterface;

class HtmlspecialcharsParser implements ParserInterface
{
	public function parseText($text)
	{
		return htmlspecialchars($text);
	}
}