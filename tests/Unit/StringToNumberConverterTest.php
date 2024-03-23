<?php

declare(strict_types=1);

use App\Services\Converters\StringToNumberConverter;
use PHPUnit\Framework\TestCase;

class StringToNumberConverterTest extends TestCase
{
    private StringToNumberConverter $stringToNumberConverter;

    protected function setUp(): void
    {
        $this->stringToNumberConverter = new StringToNumberConverter();
    }

    /**
     * @dataProvider provideTestData
     */
    public function testConvert(string $input, string $expectedOutput): void
    {
        $this->assertEquals($expectedOutput, $this->stringToNumberConverter->convert($input));
    }

    public static function provideTestData(): array
    {
        return [
            ['22aAcd', '22/1/1/3/4'],
            ['xcQgpW', '24/3/17/7/16/23'],
        ];
    }
}
