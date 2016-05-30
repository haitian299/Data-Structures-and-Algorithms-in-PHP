<?php namespace Algorithms;

trait InsertionSort
{
    public static function insertionSort(array &$array)
    {
        for ($i = 1, $length = count($array); $i < $length; $i++) {
            $value = $array[$i];
            $j = $i - 1;
            while ($j >= 0 && $array[$j] > $value) {
                $array[$j + 1] = $array[$j];
                $j--;
            }
            $array[$j + 1] = $value;
        }

        return true;
    }
}
