<?php

function mergeSortedArrays1($firstArray, $secondArray)
{
    if (empty($firstArray)) {
        return $secondArray;
    }

    if (empty($secondArray)) {
        return $firstArray;
    }

    $mergedArray = [];
    $firstArrayPointer = $secondArrayPointer = 0;
    while ($firstArrayPointer < count($firstArray) && $secondArrayPointer < count($secondArray)) {
        if ($secondArray[$secondArrayPointer] < $firstArray[$firstArrayPointer]) {
            $mergedArray[] = $secondArray[$secondArrayPointer];
            $secondArrayPointer++;
        } else {
            $mergedArray[] = $firstArray[$firstArrayPointer];
            $firstArrayPointer++;
        }
    }

    if ($firstArrayPointer + 1 <= count($firstArray)) {
        $mergedArray = fillArray($mergedArray, $firstArray, $firstArrayPointer);
    }

    if ($secondArrayPointer + 1 <= count($secondArray)) {
        $mergedArray = fillArray($mergedArray, $secondArray, $secondArrayPointer);
    }

    return $mergedArray;
}

function fillArray($arrayToFill, $arrayToFillFrom, $startAt = 0) {
    while ($startAt < count($arrayToFillFrom)) {
        $arrayToFill[] = $arrayToFillFrom[$startAt];
        $startAt++;
    }

    return $arrayToFill;
}

print_r(mergeSortedArrays1([0, 3, 4], [4, 6, 30])); // expected [0, 3, 4, 4, 6, 30, 31]
print_r(mergeSortedArrays1([0, 3, 4, 31], [4, 6, 30]));
print_r(mergeSortedArrays1([0, 2, 4], [1, 3, 5]));
print_r(mergeSortedArrays1([0, 2, 4], [1, 3, 5, 6]));
print_r(mergeSortedArrays1([0, 2, 4, 7], [1, 3, 5]));