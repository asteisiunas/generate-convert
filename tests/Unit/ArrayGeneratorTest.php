<?php

declare(strict_types=1);


use App\Services\Generators\ArrayGenerator;
use App\Services\Generators\RandomStringGenerator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ArrayGeneratorTest extends TestCase
{
    private ArrayGenerator $arrayGenerator;
    private RandomStringGenerator|MockObject $randomStringGenerator;

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    protected function setUp(): void
    {
        $this->randomStringGenerator = $this->createMock(RandomStringGenerator::class);
        $this->arrayGenerator = new ArrayGenerator(
            $this->randomStringGenerator,
            3
        );
    }

    public function testGeneratedArrayHasCorrectValues(): void
    {
        $this->randomStringGenerator
            ->method('generate')
            ->willReturnOnConsecutiveCalls(
                'First', 'Second', 'Third'
            );

        $this->assertEquals(
            ['First', 'Second', 'Third'],
            $this->arrayGenerator->generate()
        );
    }
}
