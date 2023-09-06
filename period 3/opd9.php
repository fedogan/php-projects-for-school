    <?php

    require_once "opd6_database.php";
    ?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                border: 1px #E8E8E8 solid !important;
            }

            .bodytable {
                width: 500px;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="">
                <a class="navbar-brand" href="#">
                    <img src="images/ictcampuslogo.png" alt="" width="125px" class="d-inline-block align-text-top">
                </a>
                <a href="opd7.php" class="btn btn-primary">Persoon Toevoegen</a>
                <a href="opd9.php" class="btn btn-warning">Persoon Zoeken</a>
                <a href="opd10.php" class="btn btn-primary">Zie alle personen</a>
            </div>
        </nav>
        <div class="card ms-auto me-auto mt-5" style="width: 31.4rem;">
            <div class="card-outline p-4">
                <div class="foto">
                    <img src="images/ictcampuslogo.png" class="card-img-top p-2" alt="...">
                    <div class="ms-3 pb-3 fs-4"></div>

                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Zoek Persoon (ID)</label>
                            <input type="number" min="0" placeholder="b.v. 4" class="form-control" id="person" name="person">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Zoeken</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="bodytable ms-auto me-auto">
            <table class="table mt-3 table-hover">
                <thead class="table-dark">
                    <th class="text-center">ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Goed Programmer</th>
                </thead>
                <tbody>
                    <?php
                    if ($_POST) {
                        $personId = $_POST["person"];
                        if ($personId != '' && is_numeric($personId) == true) {
                            $stmnt = $con->prepare("SELECT * FROM person WHERE id=?");
                            $stmnt->bindValue(1, $personId);

                            $stmnt->execute();

                            $person = $stmnt->fetchObject();

                            echo "<tr>";
                            echo "<td class='table-active text-center'>$person->id</td>";
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
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>