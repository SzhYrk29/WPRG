<?php

function tablica($a, $b, $c, $d) {
    $result = [];

    if ($a <= $b) {
        for ($i = $a; $i <= $b; $i++) {
            if ($c <= $d) {
                for ($j = $c; $j <= $d; $j++) {
                    $result[$i][] = $j;
                }
            } else {
                return [];
            }
        }
    } else {
        return [];
    }

    return $result;
}

$a = 1;
$b = 3;
$c = 5;
$d = 7;

$array = tablica($a, $b, $c, $d);
print_r($array);

?>
