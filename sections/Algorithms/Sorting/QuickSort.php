<?php

require('SortingAlgorithm.php');

/**
 * Merge sort is a divide and conquer algorithm, we split the array into left half and right half, and each half is split in half until 
 * it only contains 1 element, that's the recursion part, then we merge left and right halves keeping them sorted, resulting in a sorted 
 * chunk, then we keep doing that until we get one full sorted array
 */
class QuickSort extends SortingAlgorithm
{
    public function sort()
    {
        return $this->quickSortRecursive($this->array, 0, count($this->array) - 1);
    }

    private function quickSortRecursive(&$array, $left, $right)
    {
        if ($left < $right) {
            $pivot = $right;
            $partitionIndex = $this->partition($array, $pivot, $left, $right);

            $this->quickSortRecursive($array, $left, $partitionIndex - 1);
            $this->quickSortRecursive($array, $partitionIndex + 1, $right);
        }

        return $array;
    }

    private function partition(&$array, $pivot, $left, $right)
    {
        $pivotValue = $array[$pivot];
        $partitionIndex = $left;

        for ($i = $left; $i < $right; $i++) {
            if ($array[$i] < $pivotValue) {
                $array = $this->swapFunctional($array, $i, $partitionIndex);
                $partitionIndex++;
            }
        }

        $array = $this->swapFunctional($array, $right, $partitionIndex);
        return $partitionIndex;
    }

    /**
     * Swap elements at 2 given indexes in the array
     *
     * @param array $array
     * @param int $firstKey
     * @param int $secondKey
     * @return array
     */
    protected function swapFunctional($array, $firstKey, $secondKey)
    {
        $temp = $array[$firstKey];
        $array[$firstKey] = $array[$secondKey];
        $array[$secondKey] = $temp;

        return $array;
    }
}

$merge = new QuickSort([5, 2, 19, 1, 22, -1]);
print_r($merge->sort());
print_r($merge->setArray([12, -4, 55, 9, 1, 1, 2])->sort());
print_r($merge->setArray([99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0])->sort());