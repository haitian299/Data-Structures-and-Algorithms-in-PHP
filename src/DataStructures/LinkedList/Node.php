<?php namespace LinkedList;

class Node
{
    public $value;
    public $prev;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
    }
}
