<?php

$getallen = array(23, 345, 65, 7, -10, 45, 11);


$max = $getallen[0];
foreach($getallen as $getal){
    if($getal > $max){
        $max=$getal;
    }
}

echo "The hoogste getal is: " . $max;
// 
$min = $getallen[0];
foreach($getallen as $getal2){
    if($getal2 < $min){
        $min = $getal2;
    }
}

echo "<br> The laagste getal is: " . $min . "<br>";
// 
$numbers = count($getallen) - 1;

$som = 0;
  for($i =$numbers; $i>= 0; $i--){
    $som = $som + $getallen[$i];
}

echo "De som is : " . $som . "<br>";
// 
$x = 0;
  for($i = $numbers; $i>= 0; $i--){
    $x = $x + $getallen[$i];
}
echo "Gemiddeld: " . round($x / count($getallen),2);
