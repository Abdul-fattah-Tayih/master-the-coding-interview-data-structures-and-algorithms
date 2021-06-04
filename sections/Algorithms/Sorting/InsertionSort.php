<?php

require('SortingAlgorithm.php');
/**
 * Insertion sort starts off by comparing the first two items and swapping them, then in each iteration, we compare the next item 
 * with the previous items that were swapped, in each iteration our "sorted" section grows and we have to compare each element with that
 * entire section
 */
class InsertionSort extends SortingAlgorithm
{
    public function sort()
    {
        for ($i = 0; $i < count($this->array); $i++) {
            $j = $i + 1;
            while ($j > 0 && $j < count($this->array)) {
                if ($this->array[$j] < $this->array[$j - 1]) {
                    $this->swap($j, $j - 1);
                }
                $j--;
            }
        }

        return $this->array;
    }
}

$insertion = new InsertionSort([5, 2, 19, 1, 22, -1]);
print_r($insertion->sort());
print_r($insertion->setArray([12, -4, 55, 9, 1, 1, 2])->sort());
print_r($insertion->setArray([99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0])->sort());