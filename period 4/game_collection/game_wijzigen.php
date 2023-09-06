<?php
    include_once "database.php";

    $stmt = $con->prepare("SELECT * FROM games WHERE game_id = ?");
    $stmt->bindValue(1, $_GET['id']);
    $stmt->execute();
    $game = $stmt->fetchObject();

    if (isset($_GET["id"])) {
        if ($_POST) {
            $sql = $con->prepare("UPDATE games SET name = ?, genre = ?, age = ?, price = ?, is_multiplayer = ?, platform = ? WHERE game_id = ?");
            $sql->bindValue(1, $_POST['game_name']);
            $sql->bindValue(2, $_POST['genre']);
            $sql->bindValue(3, $_POST['age']);
            $sql->bindValue(4, $_POST['price']);
            $sql->bindValue(5, isset($_POST['is_multiplayer']) ? 1 : 0);
            $sql->bindValue(6, $_POST['platform']);
            $sql->bindValue(7, $_GET['id']);
            
            $sql->execute();

            header("Location: index.php");
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="favicon-32x32.png">
    <style>
        body {
            background-color: #f0f8ff;
        }

        .container {
            border-radius: 2rem;
            border: 2px solid #35404C;
        }
    </style>
    <title>Update Game</title>
</head>

<body>
    <div class="container bg-white mt-5 w-50">
        <form method="POST">
            <div class="mb-3 mt-5">
                <hr>
                <label for="gameName" class="form-label">Game Name: </label>
                <input type="text" class="form-control" id="game_name" name="game_name" value="<?= $game->name ?>">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre: </label>
                <select class="form-select" name="genre">
                    <option>-- Kies een genre --</option>
                    <option value="Sports" <?= $game->genre == 'Sports' ?  'selected' : '' ?>>Sports</option>
                    <option value="Simulation" <?= $game->genre == 'Simulation' ?  'selected' : '' ?>>Simulation</option>
                    <option value="Race" <?= $game->genre == 'Race' ?  'selected' : '' ?>>Race</option>
                    <option value="Platform" <?= $game->genre == 'Platform' ?  'selected' : '' ?>>Platform</option>
                    <option value="RPG" <?= $game->genre == 'RPG' ?  'selected' : '' ?>>RPG</option>
                    <option value="Shooter" <?= $game->genre == 'Shooter' ?  'selected' : '' ?>>Shooter</option>
                    <option value="Arcade" <?= $game->genre == 'Arcade' ?  'selected' : '' ?>>Arcade</option>
                    <option value="Third Person" <?= $game->genre == 'Third Person' ?  'selected' : '' ?>>Third Person</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="leeftijd" class="form-label">Leeftijd: </label>
                <select class="form-select" name="age">
                    <option>-- Kies de leeftijd --</option>
                    <option value="Alle leeftijden" <?= $game->age == 'Alle Leeftijden' ?  'selected' : '' ?>>Alle leeftijden</option>
                    <option value="6+" <?= $game->age == '6+' ?  'selected' : '' ?>>6+</option>
                    <option value="16+" <?= $game->age == '16+' ?  'selected' : '' ?>>16+</option>
                    <option value="18+" <?= $game->age == '18+' ?  'selected' : '' ?>>18+</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prijs: </label>
                <div class="input-group">
                    <span class="input-group-text">€</span>
                    <input type="number" min='0' class="form-control" value="<?= $game->price ?>" name="price" step="any" aria-label="Euro amount (with dot and two decimal places)">
                </div>
            </div>
            <div class="mb-3 form-check form-switch">
                <input type="checkbox" class="form-check-input" id="is_multiplayer" name="is_multiplayer" <?= $game->is_multiplayer ? 'checked' : '' ?>>
                <label class="form-check-label" for="multi">Online Multiplayer</label>
            </div>
            <div class="mb-3">
                <label for="platform" class="form-label">Platform: </label>
                <select class="form-select" name="platform">
                    <option>-- Kies de platform --</option>
                    <option value="Playstation 4" <?= $game->platform == 'Playstation 4' ?  'selected' : '' ?>>Playstation 4</option>
                    <option value="Playstation 5" <?= $game->platform == 'Playstation 5' ?  'selected' : '' ?>> Playstation 5</option>
                    <option value="Nintendo Wii" <?= $game->platform == 'Nintendo Wii' ?  'selected' : '' ?>>Nintendo Wii</option>
                    <option value="Nintendo Switch" <?= $game->platform == 'Nintendo Switch' ?  'selected' : '' ?>>Nintendo Switch</option>
                    <option value="Xbox One" <?= $game->platform == 'Xbox One' ?  'selected' : '' ?>>Xbox One</option>
                    <option value="PC" <?= $game->platform == 'PC' ?  'selected' : '' ?>>PC</option>
                </select>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>