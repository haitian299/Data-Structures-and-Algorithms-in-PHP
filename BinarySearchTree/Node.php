<?php namespace BinarySearchTree;
/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/26
 * Time: 09:43
 */
class Node
{
    protected $value;
    public    $left;
    public    $right;
    public    $parent;

    public function __construct($value = null)
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

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}