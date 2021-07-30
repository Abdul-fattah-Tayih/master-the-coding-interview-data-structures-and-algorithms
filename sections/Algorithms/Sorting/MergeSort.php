<?php

require('SortingAlgorithm.php');

/**
 * Merge sort is a divide and conquer algorithm, we split the array into left half and right half, and each half is split in half until 
 * it only contains 1 element, that's the recursion part, then we merge left and right halves keeping them sorted, resulting in a sorted 
 * chunk, then we keep doing that until we get one full sorted array
 */
class MergeSort extends SortingAlgorithm
{
    public function sort()
    {
        $this->array = $this->mergeSortRecursive($this->array);
        return $this->array;
    }

    private function mergeSortRecursive($array)
    {
        if (count($array) === 1) {
            return $array;
        }

        $splitIndex = (int) (count($array) / 2);
        $left = array_slice($array, 0, $splitIndex);
        $right = array_slice($array, $splitIndex);

        return $this->merge(
            $this->mergeSortRecursive($left),
            $this->mergeSortRecursive($right)
        );
    }

    /**
     * Merging sorted arrays, this was an excercise in the arrays section
     *
     * @param int[] $left
     * @param int[] $right
     * @return int[]
     */
    private function merge($left, $right)
    {
        $merged = [];
        $leftPointer = $rightPointer = 0;
        while ($leftPointer < count($left) && $rightPointer < count($right)) {
            if ($left[$leftPointer] < $right[$rightPointer]) {
                $merged[] = $left[$leftPointer];
                $leftPointer++;
                continue;
            }

            $merged[] = $right[$rightPointer];
            $rightPointer++;
        }

        // after that loop, either left or right will have some values left, we just push them to our merged array since they are already sorted
        while ($leftPointer < count($left)) {
            $merged[] = $left[$leftPointer];
            $leftPointer++;
        }

        while ($rightPointer < count($right)) {
            $merged[] = $right[$rightPointer];
            $rightPointer++;
        }

        return $merged;
    }
}

$merge = new MergeSort([5, 2, 19, 1, 22, -1]);
print_r($merge->sort());
print_r($merge->setArray([12, -4, 55, 9, 1, 1, 2])->sort());
print_r($merge->setArray([99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0])->sort());