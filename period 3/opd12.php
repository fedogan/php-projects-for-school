<?php
    session_start();

    if($_POST){
        $_SESSION['firstName'] = $_POST["firstName"];
        $_SESSION['lastName'] = $_POST["lastName"];
        $_SESSION['favFood'] = $_POST["favFood"];
        $_SESSION['kanGoedProgrammeren'] = isset($_POST["kan_goed_programmeren"]) ? 1 : 0;
        
        header("location: opd12_pagina2.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Pagina 1</h1>
        <form method="POST">
            <label for="firstName">Voornaam: </label><br>
            <input type="text" name="firstName" id="fname"> <br><br>
            <label for="lastName">Achternaam: </label><br>
            <input type="text" name="lastName" id="lname"> <br><br>
            <label for="fav_food">Favoriete eten</label> <br>
            <select name="favFood" id="favFood">
                <option value="sushi">Sushi</option>
                <option value="pizza">Pizza</option>
                <option value="pannekoeken">Pannekoeken</option>
                <option value="snackbar">Snackbar</option>
                <option value="aziatisch">Aziatisch</option>
                <option value="taart">Taart</option>
                <option value="kfrikandel">Koude Frikandelbroodjes</option> 
            </select> <br> <br>
            <input type="checkbox" name="kan_goed_programmeren"> ik kan goed programmeren <br> <br>
            <input type="submit" value="Verzenden"> 
        </form>
    </body>
</html>