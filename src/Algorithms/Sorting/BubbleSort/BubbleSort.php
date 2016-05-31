<?php namespace Algorithms;

trait BubbleSort
{
    public static function bubbleSort(array &$array)
    {
        for ($length = count($array), $i = $length - 1; $i > 0; $i--) {
            $swap = false;
            for ($j = 0; $j < $i; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    list($array[$j], $array[$j + 1]) = [$array[$j + 1], $array[$j]];
                    $swap = true;
                }
            }
            if ($swap === false) {
                break;
            }
        }

        return true;
    }
}
