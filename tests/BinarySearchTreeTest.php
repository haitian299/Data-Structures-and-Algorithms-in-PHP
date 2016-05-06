<?php namespace tests;

use BinarySearchTree\BinarySearchTree;
use BinarySearchTree\Node;

class BinarySearchTreeTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $node = new Node(1);
        $anotherNode = new Node(2);

        //test compare
        $this->assertEquals(-1, $node->compare($anotherNode));
        $this->assertEquals(1, $anotherNode->compare($node));
        $this->assertEquals(0, $node->compare($node));

        $tree = new BinarySearchTree($node);

        //test insert
        $tree->insert(4)->insert(2)->insert(5)->insert(3)->insert(6);

        $this->assertEquals(6, $tree->getSize());

        //test search
        $five = $tree->search(5);
        $this->assertEquals(5, $five->value);
        $this->assertEquals(4, $five->parent->value);
        $this->assertEquals(6, $five->right->value);
        $this->assertNull($five->left);

        //test delete
        $tree->delete(5);
        $this->assertEquals(5, $tree->getSize());

        $four = $tree->search(4);
        $this->assertEquals(1, $four->parent->value);
        $this->assertEquals(6, $four->right->value);
        $this->assertEquals(2, $four->left->value);
    }
}
