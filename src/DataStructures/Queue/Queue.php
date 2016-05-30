<?php namespace Queue;

class Queue
{
    protected $queue = [];
    protected $length;

    public function __construct()
    {
        $this->length = 0;
    }

    public function length()
    {
        return $this->length;
    }

    public function isEmpty()
    {
        return $this->length === 0;
    }

    public function shift()
    {
        if ($this->isEmpty()) {
            return null;
        }

        $this->length--;

        return array_shift($this->queue);
    }

    public function push($element)
    {
        $this->queue[] = $element;
        $this->length++;

        return $this;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->queue[0];
    }
}

