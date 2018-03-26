<?php

namespace App;

use Exception;

class ParserFactory
{
	/**
     * Creates a parser object
     *
     * @param string $type parser type
     *
     * @return ParserInterface parser
     */
    public static function createParser(string $type): ParserInterface
    {
    	$className = __NAMESPACE__ . '\\Parser\\' . ucfirst($type) . 'Parser';

        if (!class_exists($className)) {
            throw new Exception('Parser ' . $type . ' not found');
        }

        $class = new $className();

        if (!($class instanceof ParserInterface)) {
            throw new Exception($className . ' must be instance ' . ParserInterface::class);
        }

    	return $class;
    }
}