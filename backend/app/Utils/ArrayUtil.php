<?php

namespace App\Utils;

use RuntimeException;

class ArrayUtil
{
    /**
     * @param array<string, string> $array
     * @returns string|int
     **/
    public static function get(array $array, string $key): string
    {
        if (!isset($array[$key])) {
            throw new RuntimeException('Key not found');
        }

        return $array[$key];
    }
}
