<?php namespace BinarySearchTree;
/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/26
 * Time: 09:43
 */
class Node
{
    public $value;
    public $left;
    public $right;
    public $parent;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function compare(Node $node)
    {
        if ($this->value < $node->value) {
            return -1;
        } elseif ($this->value > $node->value) {
            return 1;
        } else {
            return 0;
        }
    }
}
