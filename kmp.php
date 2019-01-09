<?php
function getNext($T, array &$next)
{
    $i = 1;
    $j = 0;
    $next[1] = 0;
    while($i < $T[0]) {
        if ($j == 0 || $T[$i] == $T[$j]) {
            ++$i;
            ++$j;
            $next[$i] = $j;
        } else {
            $j = $next[$j];
        }
    }
}

$T = "9ababaaaba";
$next = [];

getNext($T, $next);

print_r($next);
