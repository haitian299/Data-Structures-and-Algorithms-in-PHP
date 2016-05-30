<?php namespace Algorithms;

trait MergeSort
{
    public static function mergeSort(array $array)
    {
        $length = count($array);
        if ($length < 2) {
            return $array;
        }

        $part1 = static::mergeSort(array_slice($array, 0, $length >> 1));
        $part2 = static::mergeSort(array_slice($array, $length >> 1));

        if (end($part1) <= $part2[0]) {
            return array_merge($part1, $part2);
        }

        while (!empty($part1) && !empty($part2)) {
            $sorted[] = $part1[0] < $part2[0] ? array_shift($part1) : array_shift($part2);
        }

        return array_merge($sorted, $part1, $part2);
    }
}

