<?php

/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/27
 * Time: 15:10
 */
class LinkedListTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $list = new \LinkedList\LinkedList();

        //test prepend and get
        $list->prepend(1)->prepend(2)->prepend(3);

        $zero = $list->get(0)->getValue();
        $one = $list->get(1)->getValue();
        $two = $list->get(2)->getValue();

        $this->assertEquals(3, $zero);
        $this->assertEquals(2, $one);
        $this->assertEquals(1, $two);

        $anotherList = new \LinkedList\LinkedList();

        //test append
        $anotherList->append(1)->append(2)->append(3);

        $zero = $anotherList->get(0)->getValue();
        $one = $anotherList->get(1)->getValue();
        $two = $anotherList->get(2)->getValue();

        $this->assertEquals(1, $zero);
        $this->assertEquals(2, $one);
        $this->assertEquals(3, $two);

        //test add
        $anotherList->add(8, 1);

        $zero = $anotherList->get(0)->getValue();
        $one = $anotherList->get(1)->getValue();
        $two = $anotherList->get(2)->getValue();

        $this->assertEquals(1, $zero);
        $this->assertEquals(8, $one);
        $this->assertEquals(2, $two);

        //test concat
        $list->concat($anotherList);

        $this->assertEquals(7, $list->getLength());

        $count = 0;

        //test map
        $callback = function (\LinkedList\Node $node) use (&$count) {
            $count += $node->getValue();
        };

        $list->map($callback);

        $this->assertEquals(20, $count);

        //test find
        $node = $list->find(1);
        $this->assertEquals(1, $node->getValue());
        $this->assertEquals(2, $node->prev->getValue());
        $this->assertEquals(1, $node->next->getValue());

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
