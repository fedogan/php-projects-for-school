<?php

$errors = [];

if ($_POST) {

    if ($_FILES["fileToUpload"]["size"] > 2097152) {
        array_push($errors, "Het bestand is te groot. (Max 2MB)");
    }

    if ($_FILES["fileToUpload"]["type"] = "image/jpeg" || $_FILES["fileToUpload"]["type"] = "image/png") {
        if (count($errors) > 0) {
        } else {
            $fileRandomName = uniqid() . "_" . $_FILES["fileToUpload"]["name"];
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $fileRandomName);
            // header("location: index.php");
            echo $_FILES["fileToUpload"]["name"] . " is geupload als " . $fileRandomName;
        }
    }
    else {
        array_push($errors, "Het bestand is geen JPG of PNG");
    }


}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        input {
            display: block;
            margin-bottom: 10px;
        }

        .errorBody {
            color: white;
            background-color: red;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 4px 4px 4px black;
            border-radius: 5px;
            width: 300px;
            font-weight: bold;
        }
    </style>

</head>


<body>
    <div class="m-3">
        <div class="errors">
            <?php
            if (count($errors) > 0) {
                echo "<div class='errorBody'>";
                foreach ($errors as $e) {
                    echo "<p class='error'>•$e</p>";
                }
                echo "</div>";
            }
            ?>
        </div>


        <form method="post" enctype="multipart/form-data" style="width:500px;">
            <div>
                <label class="form-label">Upload jouw foto hier</label>
                <input class="form-control form-control-lg" name="fileToUpload" id="fileToUpload" type="file">
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="Upload Image" name="submit">
        </form>
    </div>
</body>

</html>