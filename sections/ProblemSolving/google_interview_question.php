<?php

/*
    Given an array and a sum, check if the array contains at least 2 numers that when 
    added together equal the provided sum, the array is unsorted.

    example:
        arrayContainsSum([1, 2, 3, 4], 8) => false
        arrayContainsSum([1, 2, 4, 4], 8) => true
*/

function hasPairWithSum($array, $sum) 
{
    $compliments = [];

    foreach($array as $value) {
        if (array_key_exists($value, $compliments)) {
            return true;
        }

        $compliments[$sum - $value] = null;
    }

    return false;
}

// for displaying results in a readable manner
$solutions = [
    (int) hasPairWithSum([1,2,3,4], 8),
    (int) hasPairWithSum([1,2,4,4], 8),
    (int) hasPairWithSum([2,2,4,4], 4),
    (int) hasPairWithSum([1,2,5,4], 4),
];

print_r($solutions);