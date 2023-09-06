<?php
    require_once 'database.php';
    $stmt = $con->prepare("SELECT * FROM games ORDER BY game_id ASC");
    $stmt->execute();

    $games = $stmt->fetchAll(PDO::FETCH_OBJ);

    $count = $con->prepare("SELECT COUNT(*) FROM games");
    $count->execute();
    
    $totalGames = $count->fetchColumn();

    if ($_POST) {
        $stmt = $con->prepare("INSERT INTO games (name, genre, age, price, is_multiplayer, platform) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bindValue(1, $_POST['game_name']);
        $stmt->bindValue(2, $_POST['genre']);
        $stmt->bindValue(3, $_POST['age']);
        $stmt->bindValue(4, $_POST['price']);
        $stmt->bindValue(5, isset($_POST['is_multiplayer']) ? 1 : 0);
        $stmt->bindValue(6, $_POST['platform']);
        $stmt->execute();

        header("Location: index.php");
    } 


    if (isset($_GET["id"])) {
        $stmt = $con->prepare("DELETE FROM games WHERE game_id = ?");
        $stmt->bindValue(1, $_GET['id']);
        $stmt->execute();

        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>GAME COLLECTION</title>
    <style>
        .card-body {
            border: 1px solid rgba(0, 0, 0, .125);
        }

        .list-group {
            border-radius: 0 !important;
        }

        .card {
            font-size: 1.12rem;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">GAME COLLECTION (<?= $totalGames ?>)</h1> <!-- Om te tellen hoe veel game we hebben -->
                <a href="" class="btn btn-primary top-0 end-0 position-absolute m-3" data-bs-toggle='modal' data-bs-target='#exampleModal'>Game Toevoegen</a>
            </div>
            <div class="game-collection d-flex">
                <?php
                foreach ($games as $game) {
                    $game->is_multiplayer = $game->is_multiplayer ? 'Ja' : 'Nee'; // om te zetten 1 en 0 naar Ja en Nee

                    echo "<div class='card mx-3 my-2' style='width: 18rem;'>";
                    echo "<div class='card-body '>";
                    echo "<h5 class='card-title'>$game->name</h5>";
                    echo "<div class='buttons position-absolute top-0 end-0 m-2'>";
                    echo "<a class='btn btn-danger' href='index.php?id=$game->game_id' onclick='return confirm(\" Weet je zeker dat je $game->name verwijderen? \");'><i class='bi bi-trash'></i></a>";
                    echo "<a class='btn btn-warning ms-1' href='game_wijzigen.php?id=$game->game_id'><i class='bi bi-pen'></i></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "<ul class='list-group '>";
                    echo "<li class='list-group-item'>Genre: $game->genre </li>";
                    echo "<li class='list-group-item'>Leeftijd: $game->age </li>";
                    echo "<li class='list-group-item'>Prijs: $game->price €</li>";
                    echo "<li class='list-group-item'>Multiplayer: $game->is_multiplayer</li>";
                    echo "<li class='list-group-item'>Platform: $game->platform</li>";
                    echo "</ul>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-2">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="gameName" class="form-label">Game Name: </label>
                                <input type="text" class="form-control" id="game_name"  name="game_name" placeholder="Mijn nieuwe game">
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre: </label>
                                <select class="form-select" name="genre" >
                                    <option selected>-- Kies een genre --</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Simulation">Simulation</option>
                                    <option value="Race">Race</option>
                                    <option value="Platform">Platform</option>
                                    <option value="RPG">RPG</option>
                                    <option value="Shooter">Shooter</option>
                                    <option value="Arcade">Arcade</option>
                                    <option value="Third Person">Third Person</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="leeftijd" class="form-label">Leeftijd: </label>
                                <select class="form-select" name="age" >
                                    <option selected>-- Kies de leeftijd --</option>
                                    <option value="Alle leeftijden">Alle leeftijden</option>
                                    <option value="6+">6+</option>
                                    <option value="16+">16+</option>
                                    <option value="18+">18+</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Prijs: </label>
                                <div class="input-group">
                                    <span class="input-group-text">€</span>
                                    <input type="number" min='0'  class="form-control" step="any" placeholder="14.50" name="price" aria-label="Euro amount (with dot and two decimal places)">
                                </div>
                            </div>
                            <div class="mb-3 form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="is_multiplayer" name="is_multiplayer">
                                <label class="form-check-label" for="multi">Online Multiplayer</label>
                            </div>
                            <div class="mb-3">
                                <label for="platform" class="form-label">Platform: </label>
                                <select class="form-select" name="platform" >
                                    <option selected>-- Kies de platform --</option>
                                    <option value="Playstation 4">Playstation 4</option>
                                    <option value="Playstation 5">Playstation 5</option>
                                    <option value="Nintendo Wii">Nintendo Wii</option>
                                    <option value="Nintendo Switch">Nintendo Switch</option>
                                    <option value="Xbox One">Xbox One</option>
                                    <option value="PC">PC</option>
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>