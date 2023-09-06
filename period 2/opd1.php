<?php 

$cars = array("Volvo", "Mazda", "Honda", "Opel", "Fiat");
var_dump($cars);

foreach($cars as $car) {
    echo $car . "<br/>";
}
echo "<br/>";

for($x = sizeof($cars) - 1; $x >= 0; $x--){
    echo $cars[$x] . "<br>";
}
?>