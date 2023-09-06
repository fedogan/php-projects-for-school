<?php
require_once "opd6_database.php";

$stmt = $con->prepare("SELECT * FROM person");

$stmt->execute();

$persons = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="">
            <a class="navbar-brand" href="#">
                <img src="images/ictcampuslogo.png" alt="" width="125px" class="d-inline-block align-text-top">
            </a>
            <a href="opd7.php" class="btn btn-primary">Persoon Toevoegen</a>
            <a href="opd9.php" class="btn btn-primary">Persoon Zoeken</a>
            <a href="opd10.php" class="btn btn-warning">Zie alle personen</a>
        </div>
    </nav>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Goed programmer</th>
        </thead>
        <tbody>
            <?php
            foreach ($persons as $person) {
                echo "<tr>";
                echo "<td>$person->id</td>";
                echo "<td>$person->first_name</td>";
                echo "<td>$person->last_name</td>";
                if ($person->is_good_programmer == 1) {
                    $person->is_good_programmer = "Ja";
                } else {
                    $person->is_good_programmer = "Nee";
                }
                echo "<td>$person->is_good_programmer</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>