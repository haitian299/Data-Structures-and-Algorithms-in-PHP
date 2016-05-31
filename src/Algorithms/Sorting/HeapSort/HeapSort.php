<?php namespace Algorithms;

use Heap\Heap;

trait HeapSort
{
    public static function heapSort(array &$array)
    {
        $heap = new Heap(true);
        foreach ($array as $value) {
            $heap->insert($value);
        }
        for ($i = 0, $length = $heap->length(); $i < $length; $i++) {
            $array[$i] = $heap->extract();
        }

        return true;
    }
}
