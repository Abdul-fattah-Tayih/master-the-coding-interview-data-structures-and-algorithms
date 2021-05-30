<?php

// O(n) using a hash table
function firstRecurringCharacter($numbers)
{
    $numberHash = [];
    foreach ($numbers as $number) {
        if (array_key_exists($number, $numberHash)) {
            return $number;
        }

        $numberHash[$number] = null;
    }

    return null;
}

echo firstRecurringCharacter([2, 5, 1, 2, 3, 5, 1, 2, 4]) . PHP_EOL;
echo firstRecurringCharacter([2, 1, 1, 2, 3, 5, 1, 2, 4]) . PHP_EOL;
echo firstRecurringCharacter([2, 3, 4, 5]) . PHP_EOL;