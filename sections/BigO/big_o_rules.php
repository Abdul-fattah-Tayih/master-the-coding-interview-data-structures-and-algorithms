<?php

const RULES = [
    'Worst Case' => 'Always count the worst case, if we terminate a loop early, assume the entire length of the loop was executed',
    'Remove Constants' => 'Remove non variables from your Big O, O(n/2 + 101) can be simplified to O(n)',
    'Different terms for inputs' => 'Give different symbols for different inputs, if we receive 2 arrays then we can represent them respectively as a and b, if we loop over each one, our complexity would be O(a + b)',
    'Drop non dominants' => 'The most dominant term is the most important, so you can exclude lesser terms, eg: O(n + n^2) can be simplified to O(n^2)'
];

echo 'Here are the rules for Big O:';

$counter = 1;
foreach (RULES as $index => $rule) {
    // fancy coloring for rule names for better readability
    $coloredIndex = "\033[1;36m$index\033[0m";
    echo "\n\t $counter. $coloredIndex: $rule";
    $counter++;
}