<?php 


function fizzbuzz(int $a): string{
    if($a % 15 == 0) {
        $uitkomst = "Fizzbuzz";
    } elseif($a % 5 == 0) {
        $uitkomst = "Buzz";
    } elseif($a % 3 == 0) {
        $uitkomst = "Fizz";
    } else {
        $uitkomst = "$a";
    }
    return $uitkomst;
}


for($i = 1; $i <= 100; $i++) {
    echo "Waarde $i is: ";
    echo fizzbuzz($i) . "<br>";
}


?>