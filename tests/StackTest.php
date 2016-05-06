<?php namespace tests;

use Stack\Stack;

class StackTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $stack = new Stack();

        $this->assertEquals(true, $stack->isEmpty());
        $this->assertEquals(0, $stack->length());

        $stack->push(1)->push(2)->push(3);

        $this->assertEquals(3, $stack->length());

        $element = $stack->pop();

        $this->assertEquals(3, $element);
        $this->assertEquals(2, $stack->length());

        $anotherElement = $stack->peek();

        $this->assertEquals(2, $anotherElement);
    }
}
