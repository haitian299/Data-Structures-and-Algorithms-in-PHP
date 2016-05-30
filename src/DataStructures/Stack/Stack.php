<?php namespace Stack;

class Stack
{
    protected $stack  = [];
    protected $length = 0;

    public function length()
    {
        return $this->length;
    }

    public function isEmpty()
    {
        return $this->length === 0;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \Exception("empty stack");
        }
        $this->length--;

        return array_pop($this->stack);
    }

    public function push($element)
    {
        $this->stack[] = $element;
        $this->length++;

        return $this;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            throw new \Exception("empty stack");
        }

        return end($this->stack);
    }
}

