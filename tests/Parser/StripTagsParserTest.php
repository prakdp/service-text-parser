<?php
declare(strict_types=1);

use App\Parser\StripTagsParser;
use PHPUnit\Framework\TestCase;

final class StripTagsParserTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testParse($text, $expected): void
    {
        $parser = new StripTagsParser();
        $this->assertSame($expected, $parser->parseText($text));
    }

    public function additionProvider()
    {
        return [
            [
                '<a href="#">test</a> text',
                'test text'
            ],
            [
                'test text',
                'test text'
            ],
            [
                '<a href="#"></a>',
                ''
            ]
        ];
    }
}
