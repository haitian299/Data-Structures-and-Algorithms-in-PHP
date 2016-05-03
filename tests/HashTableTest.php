<?php

class HashTableTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $hashTable = new \HashTable\HashTable(1000);
        $hashTable->put("foo", "bar")
            ->put("fiz", "buzz")
            ->put("bruce", "wayne")
            ->put("peter", "parker")
            ->put("clark", "kent");

        $this->assertEquals(5, $hashTable->size);

        //test get
        $this->assertEquals("bar", $hashTable->get("foo"));
        $this->assertEquals(5, $hashTable->size);

        //test update

        $hashTable->put("peter", "bob");
        $this->assertEquals("bob", $hashTable->get("peter"));

        //test delete
        $hashTable->del("peter");

        $this->assertNull($hashTable->get("peter"));
        $this->assertEquals(4, $hashTable->size);

        //test each
        $count = 0;
        $callback = function (\HashTable\Item $item) use (&$count) {
            $count++;
        };

        $hashTable->each($callback);

        $this->assertEquals(4, $count);

        //test hashCode
        $test = "Hello World!";

        if (PHP_INT_SIZE === 8) {
            //64bit machine
            $this->assertEquals(1915143469848639005, $hashTable->hashCode($test));
        } elseif (PHP_INT_SIZE === 4) {
            //32bit machine
            $this->assertEquals(969099747, $hashTable->hashCode($test));
        }

    }
}
