<?php namespace tests;

use Queue\Queue;

class QueueTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $queue = new Queue();
        $this->assertTrue($queue->isEmpty());
        $this->assertEquals(0, $queue->length());

        $queue->push(1)->push(2)->push(3);

        $this->assertEquals(3, $queue->length());

        $element = $queue->shift();

        $this->assertEquals(1, $element);
        $this->assertEquals(2, $queue->length());

        $peek = $queue->peek();

        $this->assertEquals(2, $peek);
    }
}
