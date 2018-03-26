<?php
declare(strict_types=1);

use App\Job;
use PHPUnit\Framework\TestCase;

final class JobTest extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testParse($text, $methods, $expected): void
    {
        $job = new Job($text, $methods);
        $this->assertSame($expected, $job->parse());
    }

    public function additionProvider()
    {
        return [
            [
                'Привет, мне на <a href=\"test@test.ru\">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!',
                [
                    "stripTags", "removeSpaces", "replaceSpacesToEol", "htmlspecialchars", "removeSymbols", "toNumber"
                ],
                10
            ],
            [
                'Привет, мне на <a href=\"test@test.ru\">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!',
                [
                    "replaceSpacesToEol", "stripTags", "htmlspecialchars", "removeSymbols", "toNumber"
                ],
                10
            ],
            [
                'Привет, мне на <a href=\"test@test.ru\">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!',
                [
                    "stripTags", "removeSpaces", "replaceSpacesToEol", "htmlspecialchars", "removeSymbols"
                ],
                'Приветмненаtesttestruпришлоприглашениевстретитьсяпопитькофес10содержаниеммолоказа5пойдемвместе'
            ]
        ];
    }
}
