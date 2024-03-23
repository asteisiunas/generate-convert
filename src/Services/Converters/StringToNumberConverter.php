<?php

declare(strict_types=1);

namespace App\Services\Converters;

class StringToNumberConverter implements ConverterInterface
{
    public function convert(string $input): string
    {
        $numbers = [];
        $currentNumber = '';
        $stringLength = strlen($input);

        for ($i = 0; $i < $stringLength; $i++) {
            $char = $input[$i];

            if ($this->isDigit($char)) {
                $currentNumber .= $char;

                continue;
            }

            if ($currentNumber !== '') {
                $numbers[] = (int)$currentNumber;
                $currentNumber = '';
            }

            $ascii = ord($char);

            if ($ascii >= 65 && $ascii <= 90) {
                $numbers[] = $ascii - 64;
            } elseif ($ascii >= 97 && $ascii <= 122) {
                $numbers[] = $ascii - 96;
            }
        }

        if ($currentNumber !== '') {
            $numbers[] = (int)$currentNumber;
        }

        return implode('/', $numbers);
    }

    private function isDigit($char): bool
    {
        $ascii = ord($char);

        return ($ascii >= 48 && $ascii <= 57);
    }
}
