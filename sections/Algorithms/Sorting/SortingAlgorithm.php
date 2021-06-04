<?php

/**
 * This is an abstract class to define all sorting algorithms, i am using this to reduce code redundancy and because i would like to implement
 * the sorting algorithms in classes, so we can have a "blueprint" of how a basic sorting algorithm class should look like, but you can
 * simply just use functions in each implementation if you'd like.
 */
abstract class SortingAlgorithm
{
    /**
     * The array to be sorted
     *
     * @var int[]
     */
    protected $array;
    public function __construct($array = [])
    {
        $this->array = $array;
    }

    public function setArray($array)
    {
        $this->array = $array;

        return $this;
    }

    /**
     * Swap elements at 2 given indexes in the array
     *
     * @param int $firstKey
     * @param int $secondKey
     * @return void
     */
    protected function swap($firstKey, $secondKey)
    {
        $temp = $this->array[$firstKey];
        $this->array[$firstKey] = $this->array[$secondKey];
        $this->array[$secondKey] = $temp;
    }

    // for displaying purposes, print the object
    public function __toString()
    {
        $string = static::class . ' [';
        foreach ($this->array as $key => $value) {
            $string .= $value;
            if ($key + 1 < count($this->array)) {
                $string .= ', ';
            }
        }

        return $string . ']';
    }

    /**
     * The specific sorting implementation in the concrete class
     *
     * @return array
     */
    public abstract function sort();
}