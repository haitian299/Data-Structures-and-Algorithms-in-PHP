<?php namespace tests;

use Algorithms\Sort;

class SortTest extends \PHPUnit_Framework_TestCase
{

    protected function getShuffledArray($size)
    {
        $list = range(0, $size - 1);
        shuffle($list);

        return $list;
    }

    public function testQuickSort()
    {
        $list = $this->getShuffledArray(100);

        $sorted = Sort::quickSort($list);
        for ($i = 0; $i < count($sorted) - 1; $i++) {
            $this->assertTrue($sorted[$i] < $sorted[$i + 1]);
        }
    }

    public function testMergeSort()
    {
        $list = $this->getShuffledArray(100);

        $sorted = Sort::mergeSort($list);
        for ($i = 0; $i < count($sorted) - 1; $i++) {
            $this->assertTrue($sorted[$i] < $sorted[$i + 1]);
        }
    }
}
