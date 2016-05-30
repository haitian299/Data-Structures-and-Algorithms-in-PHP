<?php namespace tests;

use Algorithms\Sort;

class SortTest extends \PHPUnit_Framework_TestCase
{
    public function testQuickSort()
    {
        $list = range(0, 99);
        shuffle($list);

        $sorted = Sort::quickSort($list);
        for ($i = 0; $i < count($sorted) - 1; $i++) {
            $this->assertTrue($sorted[$i] < $sorted[$i + 1]);
        }
    }
}
