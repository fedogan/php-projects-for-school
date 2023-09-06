<?php
$getallen = array();


for ($i = 0; $i <= 5; $i++) {
  array_push($getallen, rand(0, 500));
}

foreach ($getallen as $getal) {
  echo $getal . "<br>";
}
// 
$x = count($getallen) - 1;
$som = 0;
for ($i = $x; $i >= 0; $i--) {
  $som += $getallen[$i];
}

echo "De som is : " . $som . "<br>";
// 
$a = 0;
for ($i = $x; $i >= 0; $i--) {
  $a += $getallen[$i];
}
echo "Gemiddeld: " . round($a / count($getallen), 0);
