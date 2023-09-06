

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <label for="name">Voornaam:</label>
        <input type="text" name="name" /> <br>

        <label for="surname">Achternaam:</label>
        <input type="text" name="surname" /> <br>

        <label for="age">Leeftijd :</label>
        <input type="text" name="age" /> <br>

    <button type="submit" value="verstuur">Verstuur</button>

    </form>

    <?php
    $age = '';
    $name = '';
    $surname = '';
    $gnummer;
    if ($_POST) {
        $age = $_POST["age"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $gnummer = rand(10,100);

        if($age >= 18) {
            echo "Hallo $name $surname, Jij mag als $age jarige meedoen met het prijzenfestival." . "Jouw geluksnummer is $gnummer";
        } else {
            echo "Hallo $name $surname, Jij kan niet mee doen met het prijzen festival want je bent niet 18";
        }

    }

    ?>

</body>
</html>