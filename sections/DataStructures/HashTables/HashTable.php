<?php

class HashTable
{
    /**
     * @link https://www.php.net/manual/en/class.splfixedarray.php
     * @var SplFixedArray
     */
    private $data;
    public function __construct($size)
    {
        // We're using fixed array here to match the specification of the class, but a normal array [] can be used
        $this->data = new SplFixedArray($size);
    }

    /**
     * Convert given key to a numerical index for our internal array (provided by the code in the course)
     * @link https://www.php.net/manual/en/function.mb-ord.php
     * @param string $key
     * @return int
     */
    private function hash($key)
    {
        $hash = 0;
        for ($i = 0; $i < strlen($key); $i++) {
            $hash = ($hash +  mb_ord($key[$i]) * $i) % $this->data->count();
        }

        return $hash;
    }

    /**
     * Set the value for the given key
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        $hash = $this->hash($key);
        
        // Create buckets for each index to account for collision
        if (!isset($this->data[$hash])) {
            $this->data[$hash] = [];
        }

        // in each bucket there are multiple arrays that contain key in the first index
        // and value in the second index, this is how we factor for collision
        $bucket = $this->data[$hash];
        $keyValue = new SplFixedArray(2);
        $keyValue[0] = $key;
        $keyValue[1] = $value;
        $bucket[] = $keyValue;
        $this->data[$hash] = $bucket;
    }

    /**
     * Retrieve data in the given key
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        $hash = $this->hash($key);
        $bucket = $this->data[$hash];

        if (count($bucket) > 0) {
            foreach ($bucket as $keyValuePair) {
                if ($keyValuePair[0] === $key) {
                    return $keyValuePair[1];
                }
            }
        }

        return null;
    }

    public function keys()
    {
        $keys = [];
        foreach ($this->data as $bucket) {
            if (!empty($bucket)) {
                foreach ($bucket as $keyValuePair) {
                    $keys[] = $keyValuePair[0];
                }
            }
        }

        return $keys;
    }
}

$hash = new HashTable(10);
$hash->set('hi', 500);
$hash->set('hello', 'world');
$hash->set('greeting', 'hola');
echo $hash->get('hi') . PHP_EOL; // 500
echo $hash->get('hello') . PHP_EOL; // world
echo $hash->get('greeting') . PHP_EOL; // hola
print_r($hash->keys());