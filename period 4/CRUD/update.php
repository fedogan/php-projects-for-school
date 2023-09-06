<?php
    require_once "database.php";

    $stmt = $con->prepare("SELECT * FROM person WHERE id = ?");
    $stmt->bindValue(1, $_GET["id"]);

    $stmt->execute();

    $person = $stmt->fetchObject();

    if ($_POST) {
        $stmt = $con->prepare("UPDATE person SET first_name = ?, last_name = ?, email = ? WHERE id = ?");

        $stmt->bindValue(1, $_POST["fname"]);
        $stmt->bindValue(2, $_POST["lname"]);
        $stmt->bindValue(3, $_POST["email"]);
        $stmt->bindValue(4, $_GET["id"]);

        $stmt->execute();
        header("Location: index.php");
    }

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .container-fluid {
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-5">
        <form method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">Voornaam</label>
                <input type="text" class="form-control input-sm" id="fname" name="fname" value="<?= $person->first_name ?>">
                <label for="lname" class="form-label">Achternaam</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?= $person->last_name ?>">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $person->first_name ?>">
                <input type="submit" class="btn btn-primary mt-1" value="Updaten">
            </div>
        </form>
    </div>
</body>

</html>