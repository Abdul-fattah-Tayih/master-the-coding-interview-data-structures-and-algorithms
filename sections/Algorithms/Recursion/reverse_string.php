<?php

function reverseRecursive($str)
{
    if (($str == null) || (strlen($str) <= 1)) {
        echo $str;
        return;
    }

    echo $str[strlen($str) - 1];
    reverse(
        substr(
            $str,
            0,
            (strlen($str) - 1)
        )
    );
}

// to help better understand the recursive solution, you can imagine recursion as a loop with a stack, here's an iterative example
function reverseStringWithStack($string) {
    $stack = new SplStack;
    
    for($i = 0; $i < strlen($string); $i++) {
        $stack->push($string[$i]);
    }

    $reversedString = '';
    while(!$stack->isEmpty()) {
        $reversedString .= $stack->pop();
    }

    return $reversedString;
}

echo reverseStringWithStack('hello') . PHP_EOL;
echo reverse('hello');