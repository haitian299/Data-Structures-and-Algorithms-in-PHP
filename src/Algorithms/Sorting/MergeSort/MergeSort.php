<?php namespace Algorithms;

trait MergeSort
{
    public static function mergeSort(array &$array)
    {
        $length = count($array);
        if ($length < 2) {
            return true;
        }

        $mid = $length >> 1;
        $part1 = array_slice($array, 0, $mid);
        $part2 = array_slice($array, $mid);
        static::mergeSort($part1);
        static::mergeSort($part2);
        if (end($part1) <= $part2[0]) {
            $array = array_merge($part1, $part2);
        } else {
            for ($i = 0, $j = 0, $k = 0; $k <= $length - 1; $k++) {
                if ($i >= $mid && $j < $length - $mid) {
                    $array[$k] = $part2[$j++];
                } elseif ($j >= $length - $mid && $i < $mid) {
                    $array[$k] = $part1[$i++];
                } elseif ($part1[$i] <= $part2[$j]) {
                    $array[$k] = $part1[$i++];
                } else {
                    $array[$k] = $part2[$j++];
                }
            }
        }

        return true;
    }
}

