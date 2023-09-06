<?php
// OPDRACHT 8 PERSOON TOEVOEGEN
require_once "opd6_database.php";

if ($_POST) {
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $is_good_programmer = isset($_POST["is_good_programmer"]) ? 1 : 0;

    $stmt = $con->prepare("INSERT INTO person (first_name, last_name, is_good_programmer) VALUES (?, ?, ?)");

    $stmt->bindValue(1, $firstName);
    $stmt->bindValue(2, $lastName);
    $stmt->bindValue(3, $is_good_programmer);

    $stmt->execute();

    //$stmt->fetchAll(PDO::FETCH_OBJ);
}
// OPD.8 EIND


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .card-outline {
                background-color: #FAF9F9;
                border: 2px solid #0D7DC2;
            }

            .foto {
                background-color: #EEEEEE;
                border-top: 1px #E8E8E8 solid;
                border-left: 1px #E8E8E8 solid;
                border-right: 1px #E8E8E8 solid;
                border-collapse: collapse;
            }

            .card-body {
                background-color: white;
                border: 1px #E8E8E8 solid;
                border-collapse: collapse;
            }

            input {
                border: 1px #E8E8E8 solid!important;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="">
                <a class="navbar-brand" href="#">
                    <img src="images/ictcampuslogo.png" alt="" width="125px" class="d-inline-block align-text-top">
                </a>
                <a href="opd7.php" class="btn btn-warning">Persoon Toevoegen</a>
                <a href="opd9.php" class="btn btn-primary">Persoon Zoeken</a>
                <a href="opd10.php" class="btn btn-primary">Zie alle personen</a>
            </div>
        </nav>
        <main class="">
            <div class="card ms-auto me-auto mt-5" style="width: 31.4rem;">
                <div class="card-outline p-4">
                    <div class="foto">
                        <img src="images/ictcampuslogo.png" class="card-img-top p-2" alt="...">
                        <div class="ms-3 pb-3 fs-4">Persoon toevoegen</div>

                    </div>
                    <div class="card-body">
                        <form method="POST">

                            <div class="mb-3">
                                <label class="form-label">Voornaam</label>
                                <input type="text" placeholder="b.v. Klaas" class="form-control" id="first_name" name="fname">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Achternaam</label>
                                <input type="text" placeholder="b.v. Vaak" class="form-control" id="last_name" name="lname">
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="is_good_programmer" checked>
                                <label class="form-check-label mb-2" for="is_good_programmer">Kan goed programmeren</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Toevoegen</button>
                            </div>

                        </form>
                    </div>
                    <!-- card-body end -->
                </div>
                <!-- card-outline end -->
            </div>
            <!-- card end -->
        </main>
    </body>

</html>