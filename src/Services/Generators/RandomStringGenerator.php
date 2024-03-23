<?php

declare(strict_types=1);

namespace App\Services\Generators;

use InvalidArgumentException;

class RandomStringGenerator implements GeneratorInterface
{
    public function __construct(
        private readonly string $characters,
        private readonly int $length,
    ) {
    }

    public function generate(): string
    {
        $lastCharIndex = strlen($this->characters) - 1;

        if ($lastCharIndex < 0) {
            throw new InvalidArgumentException('The characters must contain at least 1 character.');
        }

        if ($this->length < 1) {
            throw new InvalidArgumentException('The length must be at least 1.');
        }

        $randomString = '';

        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $this->characters[rand(0, $lastCharIndex)];
        }

        return $randomString;
    }
}
