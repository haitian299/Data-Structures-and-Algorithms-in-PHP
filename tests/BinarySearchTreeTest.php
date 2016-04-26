<?php

/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/26
 * Time: 22:17
 */
class BinarySearchTreeTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $node = new \BinarySearchTree\Node(1);
        $anotherNode = new \BinarySearchTree\Node(2);

        //test compare
        $this->assertEquals(-1, $node->compare($anotherNode));
        $this->assertEquals(1, $anotherNode->compare($node));
        $this->assertEquals(0, $node->compare($node));

        $tree = new \BinarySearchTree\BinarySearchTree($node);

        $tree->insert(4)->insert(2)->insert(5)->insert(3)->insert(6);

        $this->assertEquals(6, $tree->getSize());

        $five = $tree->search(5);
        $this->assertEquals(5, $five->getValue());
        $this->assertEquals(4, $five->parent->getValue());
        $this->assertEquals(6, $five->right->getValue());
        $this->assertNull($five->left);

        $tree->delete(5);
        $this->assertEquals(5, $tree->getSize());

        $four = $tree->search(4);
        $this->assertEquals(1, $four->parent->getValue());
        $this->assertEquals(6, $four->right->getValue());
        $this->assertEquals(2, $four->left->getValue());
    }
}
