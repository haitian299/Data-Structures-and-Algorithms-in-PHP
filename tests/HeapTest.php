<?php namespace tests;

use Heap\Heap;

class HeapTest extends \PHPUnit_Framework_TestCase
{
    public function testMinHeap()
    {
        $heap = new Heap(true);

        $heap->insert(8)
            ->insert(7)
            ->insert(6)
            ->insert(3)
            ->insert(1)
            ->insert(0)
            ->insert(2)
            ->insert(4)
            ->insert(9)
            ->insert(5);

        $sorted = [];
        while ($heap->length() > 0) {
            $sorted[] = $heap->extract();
        }

        for ($i = 0; $i < count($sorted) - 2; $i++) {
            $this->assertTrue($sorted[$i] < $sorted[$i + 1]);
        }
    }

    public function testMaxHeap()
    {
        $heap = new Heap(false);

        $heap->insert(8)
            ->insert(7)
            ->insert(6)
            ->insert(3)
            ->insert(1)
            ->insert(0)
            ->insert(2)
            ->insert(4)
            ->insert(9)
            ->insert(5);

        $sorted = [];
        while ($heap->length() > 0) {
            $sorted[] = $heap->extract();
        }

        for ($i = 0; $i < count($sorted) - 2; $i++) {
            $this->assertTrue($sorted[$i] > $sorted[$i + 1]);
        }
    }
}
