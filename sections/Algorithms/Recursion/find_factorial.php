<?php

// Factorial (5!), means multiple 5 * 4 * 3 * 2 * 1, multiplying each number with the number before it until you reach 1

function findFactorialRecursive($number) {
    if ($number === 1) {
        return $number;
    }

    return $number * findFactorialRecursive($number - 1);
}

function findFactorialIterative($number) {
    for ($i = $number - 1; $i > 1; $i--) {
        $number *= $i;
    }

    return $number;
}

echo findFactorialRecursive(5) . PHP_EOL;
echo findFactorialIterative(5) . PHP_EOL;