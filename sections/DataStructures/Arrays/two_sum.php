<?php

// O(n^2)
function twoSum1($numbers, $target) {
    foreach ($numbers as $index => $number) {
        $nextItemIndex = $index + 1;
        while ($nextItemIndex < count($numbers)) {
            if ($number + $numbers[$nextItemIndex] === $target) {
                return [$index, $nextItemIndex];
            }
        }
    }
}

// O(n)
function twoSum2($numbers, $target) {
    $numberHash = [];
    foreach ($numbers as $index => $number) {
        if (array_key_exists($target - $number, $numberHash)) {
            return [
                $numberHash[$target - $number],
                $index
            ];
        }
        
        $numberHash[$number] = $index;
    }

    return [];
}

print_r(twoSum1([2,7,11,15], 9));
print_r(twoSum2([2,7,11,15], 9));