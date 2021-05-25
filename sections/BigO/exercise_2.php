<?php

function anotherFunChallenge($input) {
    $a = 5;     // O(1)
    $b = 10;    // O(1)
    $c = 50;    // O(1)

    // O(n)
    for ($i = 0; $i < $input; $i++) {
      $x = $i + 1; // O(n)
      $y = $i + 2; // O(n)
      $z = $i + 3; // O(n)
    }

    // O(n)
    for ($j = 0; $j < $input; $j++) {
      $p = $j * 2; // O(n)
      $q = $j * 2; // O(n)
    }

    $whoAmI = "I don't know"; // O(1)
}

// Solution: O(4+7n), can be simplified to O(n)