<?php

class LinkedListTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $list = new \LinkedList\LinkedList();

        //test prepend and get
        $list->prepend(1)->prepend(2)->prepend(3);

        $zero = $list->get(0)->value;
        $one = $list->get(1)->value;
        $two = $list->get(2)->value;

        $this->assertEquals(3, $zero);
        $this->assertEquals(2, $one);
        $this->assertEquals(1, $two);

        $anotherList = new \LinkedList\LinkedList();

        //test append
        $anotherList->append(1)->append(2)->append(3);

        $zero = $anotherList->get(0)->value;
        $one = $anotherList->get(1)->value;
        $two = $anotherList->get(2)->value;

        $this->assertEquals(1, $zero);
        $this->assertEquals(2, $one);
        $this->assertEquals(3, $two);

        //test add
        $anotherList->add(8, 1);

        $zero = $anotherList->get(0)->value;
        $one = $anotherList->get(1)->value;
        $two = $anotherList->get(2)->value;

        $this->assertEquals(1, $zero);
        $this->assertEquals(8, $one);
        $this->assertEquals(2, $two);

        //test concat
        $list->concat($anotherList);

        $this->assertEquals(7, $list->getLength());

        $count = 0;

        //test map
        $callback = function (\LinkedList\Node $node) use (&$count) {
            $count += $node->value;
        };

        $list->map($callback);

        $this->assertEquals(20, $count);

        //test find
        $node = $list->find(1);
        $this->assertEquals(1, $node->value);
        $this->assertEquals(2, $node->prev->value);
        $this->assertEquals(1, $node->next->value);

        //test remove
        $list->remove(8);
        $count = 0;
        $list->map($callback);

        $this->assertEquals(12, $count);

        //test clear
        $list->clear();
        $this->assertEquals(0, $list->getLength());
    }
}
