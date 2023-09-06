<?php
    require_once "database.php";

    $stmt = $con->prepare("SELECT * FROM person");

    $stmt->execute();

    $persons = $stmt->fetchAll(PDO::FETCH_OBJ);

    if ($_POST) {
        $stmt = $con->prepare("INSERT INTO `person` (first_name, last_name, email) VALUES(?, ?, ?)");
        $stmt->bindValue(1, $_POST["fname"]);
        $stmt->bindValue(2, $_POST["lname"]);
        $stmt->bindValue(3, $_POST["email"]);

        $stmt->execute();
        header("Location: index.php");
    }

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<body>
    <div class="container-fluid">
        <table class="table table-striped table-hover mt-1">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="col-sm-1">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            + Toevoegen
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person) {
                    echo "<tr>";

                    echo "<td>$person->id</td>";
                    echo "<td>$person->first_name</td>";
                    echo "<td>$person->last_name</td>";
                    echo "<td>$person->email</td>";
                    echo "<td> 
                                <a 
                                onclick='return confirm(\" Weet je zeker dat je $person->first_name verwijderen? \");'
                                href='delete.php?id=$person->id' class='btn btn-danger' >X
                                </a>

                                <a  class='btn btn-warning' href='update.php?id=$person->id'>Wijzigen</a>
                         </td>"; // Verwijder en Update button
                    echo "</tr>";
                } ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Persoon toevoegen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="fname" class="form-label">Voornaam</label>
                                <input type="text" class="form-control" id="fname" name="fname">
                                <label for="lname" class="form-label">Achternaam</label>
                                <input type="text" class="form-control" id="lname" name="lname">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>