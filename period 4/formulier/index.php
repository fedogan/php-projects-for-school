<?php

$errors = [];

if ($_POST) {

    $country = $_POST["country"];
    if (trim($_POST['firstname']) == '') {
        array_push($errors, "Voornaam is verplicht");
    }
    if(strlen(trim($_POST["firstname"])) > 35){
        array_push($errors, "Voornaam mag niet langer zijn dan 35 karakters");
    }
    if(strlen(trim($_POST["lastname"])) > 50){
        array_push($errors, "Achternaam mag niet langer zijn dan 50 karakters");
    }
    if (trim($_POST['lastname']) == '') {
        array_push($errors, "Achternaam is verplicht");
    }
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        array_push($errors, "E-mail is niet geldig");
    }
    if (trim($_POST["age"]) == '' || ($_POST["age"] < 1 || $_POST["age"] > 130) || !is_numeric($_POST["age"])) {
        array_push($errors, "Leeftijd is niet geldig");
    }
    if (empty($_POST["country"])) {
        array_push($errors, "Land is niet geselecteerd");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Bootstrap Example</title>
    <style>
        form,
        .errors {
            width: 50%;
            margin: 50px auto;
        }

        .errors {
            color: white;
            background-color: #dc3545;
            border: 2px solid #dc3545;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            width: 260px;
            font-weight: bold;
        }

        .errors p {
            margin: 0;
            padding: 0;
        }

        form .form-control.error {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }
    </style>
</head>

<body>
    <?php
    if (count($errors) > 0) {
        echo "<div class='errors'>";
        foreach ($errors as $e) {
            echo "<p class='error'>•$e</p>";
        }
        echo "</div>";
    }
    ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Voornaam</label>
            <input type="text" class="form-control" name="firstname" />
        </div>
        <div class="mb-3">
            <label class="form-label">Achternaam</label>
            <input type="text" class="form-control" name="lastname" />
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" />
        </div>
        <div class="mb-3">
            <label class="form-label">Leeftijd</label>
            <input type="text" class="form-control" name="age" />
        </div>
        <div class="mb-3">
            <select name="country" id="country" class="form-select w-25">
                <option value="">-- Selecteer land --</option>
                <option value="nederland">Nederland</option>
                <option value="duitsland">Duitsland </option>
                <option value="canada">Canada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>