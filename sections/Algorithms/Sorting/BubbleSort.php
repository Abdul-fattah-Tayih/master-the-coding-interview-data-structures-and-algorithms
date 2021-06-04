<?php

require('SortingAlgorithm.php');
// bubble sort uses the concept of bubbling, it bubbles the largest values to the end of the array in each iteration
// this can be done in a functional fashion, but I think using a class is more clean
class BubbleSort extends SortingAlgorithm
{
    public function sort()
    {
        for ($i = 0; $i < count($this->array); $i++) {
            for ($j = $i + 1; $j < count($this->array); $j++) {
                if ($this->array[$i] > $this->array[$j]) {
                    $this->swap($i, $j);
                }
            }
        }

        return $this->array;
    }
}

$bubble = new BubbleSort([5, 2, 19, 1, 22, -1]);
print_r($bubble->sort());
print_r($bubble->setArray([12, -4, 55, 9, 1, 1, 2])->sort());
print_r($bubble->setArray([99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0])->sort());