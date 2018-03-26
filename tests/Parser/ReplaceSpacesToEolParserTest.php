<?php
declare(strict_types=1);

use App\Parser\ReplaceSpacesToEolParser;
use PHPUnit\Framework\TestCase;

final class ReplaceSpacesToEolParserTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testParse($text, $expected): void
    {
        $parser = new ReplaceSpacesToEolParser();
        $this->assertSame($expected, $parser->parseText($text));
    }

    public function additionProvider()
    {
        return [
            [
                'test text',
                'test' . PHP_EOL . 'text'
            ],
            [
                'test  ',
                'test' . PHP_EOL . PHP_EOL
            ],
        ];
    }
}
