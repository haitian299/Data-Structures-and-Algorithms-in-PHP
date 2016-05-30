<?php namespace Algorithms;

trait QuickSort
{
    public static function quickSort(array &$array)
    {
        static::quickSortRecursive($array, 0, count($array) - 1);

        return true;
    }

    private static function partition(&$array, $left, $right)
    {
        $pivot = $array[$right];
        for ($i = $left; $i < $right; $i++) {
            if ($array[$i] < $pivot) {
                list($array[$i], $array[$left]) = [$array[$left], $array[$i]];
                $left++;
            }
        }

        list($array[$left], $array[$right]) = [$array[$right], $array[$left]];

        return $left;
    }

    private static function quickSortRecursive(&$array, $left, $right)
    {
        if ($left < $right) {
            $pivot = static::partition($array, $left, $right);
            static::quickSortRecursive($array, $left, $pivot - 1);
            static::quickSortRecursive($array, $pivot + 1, $right);
        }
    }
}
