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
        $list = $this->getShuffledArray(1000);

        Sort::quickSort($list);
        for ($i = 0; $i < count($list) - 1; $i++) {
            $this->assertTrue($list[$i] < $list[$i + 1]);
        }
    }

    public function testMergeSort()
    {
        $list = $this->getShuffledArray(1000);

        Sort::mergeSort($list);
        for ($i = 0; $i < count($list) - 1; $i++) {
            $this->assertTrue($list[$i] < $list[$i + 1]);
        }
    }

    public function testInsertionSort()
    {
        $list = $this->getShuffledArray(1000);

        Sort::insertionSort($list);
        for ($i = 0; $i < count($list) - 1; $i++) {
            $this->assertTrue($list[$i] < $list[$i + 1]);
        }
    }

    public function testBubbleSort()
    {
        $list = $this->getShuffledArray(1000);

        Sort::bubbleSort($list);
        for ($i = 0; $i < count($list) - 1; $i++) {
            $this->assertTrue($list[$i] < $list[$i + 1]);
        }
    }

    public function testHeapSort()
    {
        $list = $this->getShuffledArray(1000);

        Sort::heapSort($list);
        for ($i = 0; $i < count($list) - 1; $i++) {
            $this->assertTrue($list[$i] < $list[$i + 1]);
        }
    }
}
