<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Services\Generators\RandomStringGenerator;

class RandomStringGeneratorTest extends TestCase
{
    public function testGeneratesStringWithCorrectLength(): void
    {
        $length = 10;
        $generator = new RandomStringGenerator('0123456789', $length);
        $result = $generator->generate();

        $this->assertEquals($length, strlen($result));
    }

    public function testGeneratesRandomString(): void
    {
        $generator = new RandomStringGenerator(
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            10
        );

        $this->assertNotEquals($generator->generate(), $generator->generate());
    }
}
