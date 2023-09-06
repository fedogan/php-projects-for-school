<?php

function telop(int $getal1, int $getal2): int {
    return $getal1 + $getal2;
}

$telop = telop(5, 6);

echo $telop . "<br>";

function herhaal(int $getal, string $tekst): void {
    for($i = 0; $i < $getal; $i++) {
        echo $tekst . " ";
    }
}

herhaal(5, "hoi");

?>