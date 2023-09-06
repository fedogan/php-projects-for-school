<?php

    require_once("database.php");

    $stmt = $con->prepare("SELECT * FROM country");
    $stmt->execute();

    $country = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Landen</title>
    <style>
        #image1 {
            border-radius: 2px;
        }
        #imageTab1 {
            border-radius: 15px ;
            
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <hr>
    <div class="table">
        <h3 class="h3 p-3">Table</h3>
        <table class="table table-hover table-striped w-50 ms-3">
            <thead class="table-dark">
                <th>ID</th>
                <th>Vlag</th>
                <th>Naam</th>
            </thead>
            <tbody>
                <?php
                foreach ($country as $c) {
                    echo "<tr>
                            <td>$c->id</td>
                            <td><img id='image$c->id' src='images/$c->image_name' width='50px'></td>
                            <td>$c->name</td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="dropdown">
        <h3 class="h3 p-3">Dropdown</h3>
        <select name="country" id="country" class="form-select w-25 ms-3">
            <?php
            foreach ($country as $c) {
                echo "<option value='$c->id'>$c->name</option>";
            }

            ?>
        </select>
    </div>
    <hr>
    <div class="radioButtons">
        <h3 class="h3 p-3">Radio Buttons</h3>
        <div class="form-check ms-3">
            <?php

            foreach ($country as $c) {
                echo "
                    <input class='form-check-input' type='radio' name='country' value='$c->name' id='$c->id'>
                    <label class='form-check-label mb-1'>
                        <img src='images/$c->image_name' width='50px'> $c->name 
                    </label> <br>

                ";
            }
            ?>
        </div>
        <hr>
        <h3 class="h3 p-3">Radio Buttons Inline</h3>
        <div class="inlineRadio ms-3">
            <?php

            foreach ($country as $c) {
                echo "
                <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='country-inline' id='$c->id' value='$c->name'>
                <label class='form-check-label' for='inlineRadio1'><img src='images/$c->image_name' width='50px'> $c->name</label>
                </div>
                ";
            }

            ?>
        </div>
    </div>
    <hr>
    <h3 class="ms-3">Tab Control</h3>
    <div class="tabControl">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <?php
            foreach ($country as $c) {
                echo "
                    <li class='nav-item' role='presentation'>
                        <button class='nav-link' id='$c->id-tab' data-bs-toggle='tab' data-bs-target='#$c->id-element' type='button' role='tab' aria-controls='$c->name' aria-selected='true'>$c->name</button>
                    </li>
                    ";
            }
            ?>
        </ul>
        <div class="tab-content" id="myTabContent">
        <?php 
                foreach($country as $c) {
                    echo "
                    <div class='tab-pane fade ' id='$c->id-element' role='tabpanel' aria-labelledby='$c->id-tab'>
                    <img src='images/$c->image_name' class='m-3' id='imageTab$c->id' width='250px'>
                    </div>
                    ";
                } 
            ?>
        </div>
    </div>


    <br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>