<?php

function fibonachi($n): array {
    if ($n === 1) {
        $fib_array = [1];
    } else {
        $fib_array = [1, 1];
    }
    for ($i = 2; $i < $n; $i++) {
        $fib_array[$i] = $fib_array[$i - 1] + $fib_array[$i - 2];
    }
    return $fib_array;
}



function recurfibonachi($n, $a = 0, $b = 1): string {
    if ($n < 1) {
        return 1;
    } 
    $b = $b . ' '. recurfibonachi($n - 1, $b, $a + $b);
    return rtrim($b,"1");
    
}


