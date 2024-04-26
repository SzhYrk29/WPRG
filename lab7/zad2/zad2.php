<?php

function markNthPosition(array $numbers, $n) {
    if ($n < 1 || $n > count($numbers)) {
        return "BŁĄD.\n";
    }

    $result = [];
    foreach ($numbers as $key => $number) {
        if ($key + 1 == $n) {
            $result[] = '$';
        } else {
            $result[] = $number;
        }
    }

    return $result;
}

//Przykład 1
$numbers = [1, 2, 3, 4, 5];
$n = 6;
$result = markNthPosition($numbers, $n);
echo "Wynik przykładu 1:\n";
print_r($result);
echo"\n";

//Przykład 2
$numbers = [1, 2, 3, 4, 5];
$n = 4;
$result = markNthPosition($numbers, $n);
echo "Wynik przykładu 2:\n";
print_r($result);
?>
