<?php

function funChallenge($input) 
{
    $a = 10;        // O(1)
    $a = 50 + 3;    // O(1)

    for ($i = 0; $i < count($input); $i++) { // O(n)
        anotherFunction();  // O(n)
        $stranger = true;   // O(n)
        $a++;               // O(n)
    }

    return $a;  // O(1)
}

function anotherFunction() {}

// solution: o(3+4n), which can be simplified to o(n)