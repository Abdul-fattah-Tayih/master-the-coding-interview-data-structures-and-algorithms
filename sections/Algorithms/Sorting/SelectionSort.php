<?php

require('SortingAlgorithm.php');
// you can think of selection sort as the opposite of bubble sort, in each iteration we scan for the minimum item
// and at the end of each iteration we place the minimum item at the beginning of each "chunk" so if we started the iteration at 0
// we put it there, but if we started at 2, we place the minimum item at index 2
class SelectionSort extends SortingAlgorithm
{
    public function sort()
    {
        foreach ($this->array as $key => $value) {
            $min = PHP_INT_MAX; // this is to account for very large integer values, its better than just using 0
            $minIndex = null;
            for ($i = $key; $i < count($this->array); $i++) {
                if ($this->array[$i] < $min) {
                    $min = $this->array[$i];
                    $minIndex = $i;
                }
            }

            $this->swap($minIndex, $key);
        }

        return $this->array;
    }
}

$bubble = new SelectionSort([5, 2, 19, 1, 22, -1]);
print_r($bubble->sort());
print_r($bubble->setArray([12, -4, 55, 9, 1, 1, 2])->sort());
print_r($bubble->setArray([99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0])->sort());