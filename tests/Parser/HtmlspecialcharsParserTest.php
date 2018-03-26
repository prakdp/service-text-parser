<?php
declare(strict_types=1);

use App\Parser\HtmlspecialcharsParser;
use PHPUnit\Framework\TestCase;

final class HtmlspecialcharsParserTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testParse($text, $expected): void
    {
        $parser = new HtmlspecialcharsParser();
        $this->assertSame($expected, $parser->parseText($text));
    }

    public function additionProvider()
    {
        return [
            [
                '<a href="#">test</a> text',
                '&lt;a href=&quot;#&quot;&gt;test&lt;/a&gt; text'
            ],
            [
                'test text',
                'test text'
            ],
            [
                '<a href="#"></a>',
                '&lt;a href=&quot;#&quot;&gt;&lt;/a&gt;'
            ]
        ];
    }
}
