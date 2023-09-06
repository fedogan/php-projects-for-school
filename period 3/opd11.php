<?php

    session_start();
    // var_dump($_SESSION);

    if($_POST) {
        $tekst = $_POST['tekst'];
        $_SESSION["text"] = $tekst;

        header("location: pagina2.php");
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Tekst: <input type="text" name="tekst" id="tekst"/> 
        <input type="submit" value="Verzenden">

    </form>
</body>
</html>