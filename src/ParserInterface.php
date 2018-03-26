<?php

namespace App;

interface ParserInterface
{
	/**
	 * Parse text
	 *
	 * @param string|int $text text for parsing
	 *
	 * @return string|int result
	 */
	public function parseText($text);
}