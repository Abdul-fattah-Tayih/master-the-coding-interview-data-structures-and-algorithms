<?php

// O(n^2) finding all possible sub arrays
function maxSubArray($numbers) {
    $max = PHP_INT_MIN;

    foreach ($numbers as $index => $number) {
        $chunkSum = 0;
        $nextChunkStart = $index;
        while ($nextChunkStart < count($numbers)) {
            $chunkSum += $numbers[$nextChunkStart];
            if ($chunkSum > $max) {
                $max = $chunkSum;
            }

            $nextChunkStart++;
        }
    }

    return $max;
}

// O(n) using Kadane's Algorithm
function maxSubArray1($numbers) {
    $max = $maxChunk = PHP_INT_MIN;
    foreach ($numbers as $number) {
        $maxChunk = max($number, $maxChunk + $number);
        $max = max($maxChunk, $max);
    }

    return $max;
}

echo maxSubArray([-2,1,-3,4,-1,2,1,-5,4]) . PHP_EOL;
echo maxSubArray1([-2,1,-3,4,-1,2,1,-5,4]);