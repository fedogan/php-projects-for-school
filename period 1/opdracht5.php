
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container {
            display:flex;
            align-items: center;
        }
    </style>
</head>
<body>
   <div class="container">
    <img src="images\papagaai.png" width="300px"alt="..."> <br>
    <?php 

    if($_POST){
    $zeg = $_POST["papagaai"];
    echo "<p><strong>" . strToupper($zeg) . "<h1>!</h1></strong></p>";
    }
    ?>
    </div>
    <form action="" method="post"> 
     <input type="text" name="papagaai">
     <input type="submit">
    </form>
</body>
</html>