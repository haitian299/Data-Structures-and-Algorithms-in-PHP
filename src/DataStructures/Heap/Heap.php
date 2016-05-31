<?php namespace Heap;

class Heap
{
    protected $data = [];
    protected $isMin;

    public function __construct($isMin)
    {
        $this->isMin = $isMin;
    }

    public function isEmpty()
    {
        return empty($this->data);
    }

    public function length()
    {
        return count($this->data);
    }

    public function get($index)
    {
        return $this->data[$index];
    }

    public function insert($value)
    {
        $this->data[] = $value;

        return $this->siftUp();
    }

    public function extract()
    {
        if ($this->isEmpty()) {
            return null;
        }

        list($this->data[0], $this->data[$this->length() - 1]) = [$this->get($this->length() - 1), $this->get(0)];

        $element = array_pop($this->data);

        $this->siftDown();

        return $element;
    }

    protected function siftUp()
    {
        for ($i = $this->length() - 1, $parent = $this->length() - 1; $i > 0; $i = $parent) {
            $parent = ($i - 1) >> 1;
            if ($this->less($this->get($i), $this->get($parent))) {
                list($this->data[$parent], $this->data[$i]) = [$this->get($i), $this->get($parent)];
            } else {
                break;
            }
        }

        return $this;
    }

    protected function siftDown()
    {
        for ($i = 0, $child = 1; $i < $this->length() && ($i << 1) + 1 < $this->length(); $i = $child) {
            $child = ($i << 1) + 1;

            if ($child + 1 <= $this->length() - 1
                && $this->less(
                    $this->get($child + 1),
                    $this->get($child)
                )
            ) {
                $child++;
            }

            if ($this->less($this->get($i), $this->get($child))) {
                break;
            }

            list($this->data[$i], $this->data[$child]) = [$this->data[$child], $this->data[$i]];
        }

        return $this;
    }

    protected function less($value1, $value2)
    {
        if ($this->isMin) {
            return $value1 < $value2;
        } else {
            return $value2 < $value1;
        }
    }

}
