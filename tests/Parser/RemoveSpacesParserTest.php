<?php
declare(strict_types=1);

use App\Parser\RemoveSpacesParser;
use PHPUnit\Framework\TestCase;

final class RemoveSpacesParserTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testParse($text, $expected): void
    {
        $parser = new RemoveSpacesParser();
        $this->assertSame($expected, $parser->parseText($text));
    }

    public function additionProvider()
    {
        return [
            [
                'test text',
                'testtext'
            ],
            [
                ' test text',
                'testtext'
            ],
            [
                '   test   text   ',
                'testtext'
            ]
        ];
    }
}
