<?php namespace Algorithms;

trait ShellSort
{
    public static function shellSort(array &$array)
    {
        $length = count($array);
        $increment = $length >> 1;
        while ($increment > 0) {
            for ($i = $increment; $i < $length; $i++) {
                $j = $i;
                $tmp = $array[$i];

                while ($j >= $increment && $array[$j - $increment] > $tmp) {
                    $array[$j] = $array[$j - $increment];
                    $j = $j - $increment;
                }

                $array[$j] = $tmp;
            }

            if ($increment === 2) {
                $increment = 1;
            } else {
                $increment = intval($increment * 5 / 11);
            }
        }

    }
}
