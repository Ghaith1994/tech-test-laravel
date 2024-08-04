<?php

namespace App\Utils;

use http\Exception\RuntimeException;

class ConvertUtil
{
    public static function string2int(string $number): int
    {
        if (!is_numeric($number)) {
            throw new RuntimeException('value must be numeric');
        }

        return intval($number);
    }
}
