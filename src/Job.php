<?php

namespace App;

use ArrayObject;
use Exception;

class Job
{
	/**
     * @var ArrayObject list of parsers
     */
    private $parsers;

	/**
	 * @var array list of methods
	 */
	protected $methods = [];

	/**
	 * @var string initial text
	 */
	protected $text;

	/**
	 * @param string $text text for parsing
	 * @param array $methods methods
	 */
	public function __construct(string $text, array $methods)
	{
		$this->text = $text;
		$this->methods = $methods;
	}

	/**
	 * Run parse
	 *
	 * @return mixin result
	 */
	public function parse()
	{
		$text = $this->text;

		foreach ($this->getParsers() as $parser) {
            $text = $parser->parseText($text);
        }

        return $text;
	}

	/**
	 * Return list of parsers
	 *
	 * @return ArrayObject list of parserslt
	 */
	public function getParsers(): ArrayObject
    {
        if ($this->parsers === null) {
            $this->parsers = $this->createParsers();
        }

        return $this->parsers;
    }

/**
	 * Create parsers by methods
	 *
	 * @return ArrayObject list of parserslt
	 */
	protected function createParsers(): ArrayObject
	{
		$parsers = new ArrayObject();
        foreach ($this->methods as $method) {
        	if (!is_string($method)) {
        		throw new Exception('Invalid method: a method must be string');
        	}
            $parser = ParserFactory::createParser($method);
            $parsers->append($parser);
        }

        return $parsers;
	}
}