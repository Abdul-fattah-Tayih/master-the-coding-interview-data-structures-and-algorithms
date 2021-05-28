<?php

function reverse($string) 
{
    if (!is_string($string) || strlen($string) < 2) {
        return 'hmm that is not good';
    }

    $reversed = '';
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $reversed .= $string[$i];
    }

    return $reversed;
}

function reverse2($string) 
{
    return strrev($string);
}

echo reverse('hi my name is') . PHP_EOL;
echo reverse2('hi my name is');