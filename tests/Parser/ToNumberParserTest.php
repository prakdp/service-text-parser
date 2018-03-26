<?php
declare(strict_types=1);

use App\Parser\ToNumberParser;
use PHPUnit\Framework\TestCase;

final class ToNumberParserTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testParse($text, $expected): void
    {
        $parser = new ToNumberParser();
        $this->assertSame($expected, $parser->parseText($text));
    }

    public function additionProvider()
    {
        return [
            [
                'convert to number 10',
                10
            ],
            [
                '10 or 5',
                10
            ],
            [
                'ten or 5?',
                5
            ]
        ];
    }
}
