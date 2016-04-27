<?php namespace LinkedList;
/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/26
 * Time: 21:21
 */

class Node
{
    protected $value;
    public    $prev;
    public    $next;

    public function __construct($value)
    {
        $this->value = $value;
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