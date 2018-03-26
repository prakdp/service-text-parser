<?php
declare(strict_types=1);

use App\ParserFactory;
use App\ParserInterface;
use PHPUnit\Framework\TestCase;

final class ParserFactoryTest extends TestCase
{

    public function testCreateParserExceptionInterface(): void
    {
        $o = $this->getMockBuilder('App\\Parser\\TestParser')
            ->setMethods(['parseText'])
            ->getMock();

        $this->expectException(Exception::class);

        $parser = ParserFactory::createParser('test');
    }

    public function testCreateParserNotFound(): void
    {
        $this->expectException(Exception::class);

        $parser = ParserFactory::createParser('test');
    }
}
