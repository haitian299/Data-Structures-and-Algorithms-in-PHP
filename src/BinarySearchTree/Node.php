<?php namespace BinarySearchTree;

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
