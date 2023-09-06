<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            width: 30px;
        }

        input[type=submit] {
            width: 50px;
        }

        img {
            margin: 7px;
            width: 250px;
        }
    </style>
</head>

<body>
    <form method="POST">
        <label for="apen">Aantal apen</label>
        <input type="number" name="number" min="1" max="30">
        <input type="submit" value="toon">
    </form>
    <?php

    function createMonkey(){
        $foto = 'download.jpg';
        $getal = $_POST["number"];
        for ($i = 0; $i < $getal; $i++) {
            echo '<img src="' . $foto . '">';
        }
    }
    if ($_POST) {
        createMonkey();
    }
    ?>
</body>

</html>