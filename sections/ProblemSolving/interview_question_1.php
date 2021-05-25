<?php

/*
    Given 2 arrays, create a function that lets a user know (true/false) whether
    these two arrays contain any common items
*/

// naive O(n * m)
function arraysContainCommonItems1($firstArray, $secondArray) {
    foreach ($firstArray as $firstArrayValue) {
        foreach ($secondArray as $secondArrayValue) {
            if ($firstArrayValue === $secondArrayValue) {
                return true;
            }
        }
    }

    return false;
}

// optimized O(n + m)
function arraysContainCommonItems2($firstArray, $secondArray) 
{
    $lookup = [];
    foreach ($firstArray as $value) {
        $lookup[$value] = null;
    }

    foreach ($secondArray as $value) {
        if (array_key_exists($value, $lookup)) {
            return true;
        }
    }

    return false;
}

// more language specific solution
function arraysContainCommonItems3($firstArray, $secondArray) 
{
    // make the values the indices, since arrays can be indexed with numbers or strings, this will result in an associative array with the values that represent the numeric index
    $lookup = array_flip($firstArray);
    foreach ($secondArray as $value) {
        if (array_key_exists($value, $lookup)) {
            return true;
        }
    }

    return false;
}

// for displaying results in a readable manner
$solutions = [
    (int) arraysContainCommonItems1(['a', 'b', 'c', 'x'], ['z', 'y', 'i']),
    (int) arraysContainCommonItems1(['a', 'b', 'c', 'x'], ['z', 'y', 'x']),
    (int) arraysContainCommonItems2(['a', 'b', 'c', 'x'], ['z', 'y', 'i']),
    (int) arraysContainCommonItems2(['a', 'b', 'c', 'x'], ['z', 'y', 'x']),
    (int) arraysContainCommonItems3(['a', 'b', 'c', 'x'], ['z', 'y', 'i']),
    (int) arraysContainCommonItems3(['a', 'b', 'c', 'x'], ['z', 'y', 'x']),
];

print_r($solutions);