<?php namespace Algorithms;

trait SelectionSort
{
    public static function selectionSort(array &$array)
    {
        for ($i = 0, $length = count($array); $i < $length; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($array[$j] < $array[$min]) {
                    $min = $j;
                }
            }
            if ($min !== $i) {
                list($array[$i], $array[$min]) = [$array[$min], $array[$i]];
            }
        }

        return true;
    }
}
