<?php
 if($_POST){
    $kleur = $_POST["kleur"];
    echo "<h1 style='color:$kleur;'> DIT IS MIJN KLEUR!! </h1>";
 }
?>
<html>
    <body>
    <form method="post">
        Kleur: <input type="text" name="kleur"> <br>
        <input type="submit" value="Verzenden"/>
    </form>
    </body>
</html>