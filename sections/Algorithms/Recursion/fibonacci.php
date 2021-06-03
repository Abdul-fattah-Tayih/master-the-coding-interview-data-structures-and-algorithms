<?php

// in the fibonacci sequence, every item is the sum of the previous 2 numbers behind it.
// Given a number n, return the index value of the Fibonacci sequence
// Here's a chunk of the sequence 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55 ... 
function fibonacciRecursive($number) {
    if ($number < 2) {
        return $number;
    }

    return fibonacciRecursive($number - 1) + fibonacciRecursive($number - 2);
}

function fibonacciIterative($number) {
    if ($number < 2) {
        return $number;
    }

    $fibonacci = [0, 1];
    $iterator = 2;
    while($iterator <= $number) {
        $fibonacci[] = $fibonacci[$iterator - 1] + $fibonacci[$iterator - 2];
        $iterator++;
    }

    return $fibonacci[count($fibonacci) - 1];
}

echo fibonacciIterative(8) . PHP_EOL;
echo fibonacciRecursive(8) . PHP_EOL;