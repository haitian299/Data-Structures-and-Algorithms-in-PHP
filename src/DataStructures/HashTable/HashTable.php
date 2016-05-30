<?php namespace HashTable;

use LinkedList\LinkedList;

class HashTable
{
    public $size;
    protected $capacity;
    protected $table;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->size = 0;
        $this->table = [];
    }

    public function hashCode($key)
    {
        for ($i = 0, $hash = 0, $length = strlen($key); $i < $length; $i++) {
            $hash = ($hash << 5) - $hash + ord($key[$i]);
        }

        return $hash;
    }

    public function get($key)
    {
        $index = $this->position($key);
        if ($item = $this->find($index, $key)) {
            return $item->value;
        } else {
            return null;
        }
    }

    public function put($key, $value)
    {
        $index = $this->position($key);
        if (!key_exists($index, $this->table)) {
            $this->table[$index] = new LinkedList();
        }

        if ($found = $this->find($index, $key)) {
            $found->value = $value;
        } else {
            $this->table[$index]->append(new Item($key, $value));
            $this->size++;
        }

        return $this;
    }

    public function del($key)
    {
        $index = $this->position($key);
        if ($found = $this->find($index, $key)) {
            $this->table[$index]->remove($found);
            $this->size--;

            return true;
        } else {
            throw new \Exception("key {$key} not found");
        }
    }

    public function each(callable $callback)
    {
        foreach ($this->table as &$list) {
            $list->each(function ($node) use ($callback) {
                $callback($node->value);
            });
        }
    }

    public function position($key)
    {
        return $this->hashCode($key) % $this->capacity;
    }

    public function &find($index, $key)
    {
        $found = null;
        $this->table[$index]->each(function (&$node) use ($key, &$found) {
            if ($node->value->key === $key) {
                $found = $node->value;
            }
        });

        return $found;
    }
}
