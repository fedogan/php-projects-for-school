<?php 
$tekst = '"Dit is een mooie lange tekst die ik kan gebruiken voor deze opdracht."';

echo "<h1>" . $tekst . "</h1>" ;
echo "<br>";
echo "<h1>" . strrev($tekst) . "</h1>";
echo "<br>";
echo "<h1>" . mb_substr($tekst, 0, 10) . "</h1>";
echo "<br>";
echo "<h1>" . mb_substr($tekst, 5, 10) . "</h1>";
echo "<br>";
echo "<h1>" . str_replace('tekst', 'PIET', $tekst) . "</h1>";

?>