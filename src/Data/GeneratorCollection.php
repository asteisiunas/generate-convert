<?php

declare(strict_types=1);

namespace App\Data;

use App\Services\Generators\GeneratorInterface;

class GeneratorCollection
{
    /** @var GeneratorInterface[] */
    private array $generators = [];

    public function add(GeneratorInterface $generator): void
    {
        $this->generators[] = $generator;
    }

    /**
     * @return GeneratorInterface[]
     */
    public function getAll(): array
    {
        return $this->generators;
    }
}
