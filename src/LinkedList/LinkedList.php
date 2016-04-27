<?php namespace LinkedList;
/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/26
 * Time: 21:15
 */

class LinkedList
{
    protected $length;
    protected $head;
    protected $tail;

    public function __construct()
    {
        $this->length = 0;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function isEmpty()
    {
        return $this->length === 0;
    }

    public function prepend($value)
    {
        $node = new Node($value);
        if ($this->isEmpty()) {
            $this->head = $node;
            $this->tail = $this->head;
        } else {
            $formerHead = $this->head;
            $formerHead->prev = $node;
            $node->next = $formerHead;
            $this->head = $node;
        }

        $this->length++;

        return $this;
    }

    public function append($value)
    {
        $node = new Node($value);
        if ($this->isEmpty()) {
            $this->tail = $node;
            $this->head = $this->tail;
        } else {
            $formerTail = $this->tail;
            $formerTail->next = $node;
            $node->prev = $formerTail;
            $this->tail = $node;
        }

        $this->length++;

        return $this;
    }

    public function add($value, $index)
    {
        if ($index > $this->length) {
            throw new \Exception("index out of range");
        }

        if ($index == 0 && $this->isEmpty()) {
            $this->prepend($value);

            return $this;
        }

        if ($this->length - 1 === $index) {
            $this->append($value);

            return $this;
        }

        $node = new Node($value);

        $nextNode = $this->get($index);
        $prevNode = $nextNode->prev;

        $prevNode->next = $node;
        $node->prev = $prevNode;

        $nextNode->prev = $node;
        $node->next = $nextNode;

        $this->length++;

        return $this;
    }

    public function get($index)
    {
        if ($index > $this->length) {
            throw new \Exception("index out of range");
        }

        $node = $this->head;

        for ($i = 0; $i < $index; $i++) {
            $node = $node->next;
        }

        return $node;
    }

    //removes the first occurrence of the specified value from this list.
    public function remove($value)
    {
        if ($this->isEmpty()) {
            throw new \Exception("empty list");
        }

        if ($node = $this->find($value)) {

            if (!is_null($node->next)) {
                $node->next->prev = $node->prev;
            } else {
                $this->tail = $node->prev;
            }

            if (!is_null($node->prev)) {
                $node->prev->next = $node->next;
            } else {
                $this->head = $node->next;
            }
            $this->length--;

            return true;
        }

        return false;
    }

    //finds the first node that contains the specified value.
    public function find($value)
    {
        if ($this->isEmpty()) {
            throw new \Exception("empty list");
        }

        for ($index = 0, $found = -1, $node = $this->head; !is_null($node); $node = $node->next, $index++) {
            if ($node->getValue() === $value) {
                $found = $node;
                break;
            }
        }

        if ($found === -1) {
            return false;
        }

        return $found;
    }

    public function map(callable $callback)
    {
        for ($node = $this->head; !is_null($node); $node = $node->next) {
            $callback($node);
        }

        return $this;
    }

    public function clear()
    {
        $this->length = 0;
        $this->head = null;
        $this->tail = null;

        return $this;
    }

    public function concat(LinkedList $list)
    {
        $this->tail->next = $list->head;
        $list->head->prev = $this->tail;
        $this->tail = $list->tail;
        $this->length += $list->getLength();

        return $this;
    }

    public function each(callable $callback)
    {
        for ($node = $this->head; !is_null($node); $node = $node->next) {
            $callback($node);
        }
    }
}