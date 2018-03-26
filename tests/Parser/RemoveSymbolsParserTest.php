<?php
declare(strict_types=1);

use App\Parser\RemoveSymbolsParser;
use PHPUnit\Framework\TestCase;

final class RemoveSymbolsParserTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testParse($text, $expected): void
    {
        $parser = new RemoveSymbolsParser();
        $this->assertSame($expected, $parser->parseText($text));
    }

    public function additionProvider()
    {
        return [
            [
                'te$*st',
                'test'
            ],
            [
                '.,t#123',
                't123'
            ],
            [
                '$',
                ''
            ]
        ];
    }
}
