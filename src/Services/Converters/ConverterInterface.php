<?php

declare(strict_types=1);

namespace App\Services\Converters;

interface ConverterInterface
{
    public function convert(string $input): string;
}
