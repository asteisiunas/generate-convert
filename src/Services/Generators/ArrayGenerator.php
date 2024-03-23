<?php

declare(strict_types=1);

namespace App\Services\Generators;

class ArrayGenerator implements GeneratorInterface
{
    public function __construct(
        private readonly RandomStringGenerator $randomStringGenerator,
        private readonly int $size,
    ) {
    }

    /**
     * @return string[]
     */
    public function generate(): array
    {
        $result = [];

        for ($i = 0; $i < $this->size; ++$i) {
            $result[] = $this->randomStringGenerator->generate();
        }

        return $result;
    }
}
