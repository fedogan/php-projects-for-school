<!DOCTYPE html>
<head>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            Leeftijd: <input type="number" name="nummer" required>
            <input type="submit" value="Verzenden">
        </form>
        <h4>PHP Uitvoer: <br></h4>
        <?php
            
            $nummer = @$_POST["nummer"];
            if($nummer < 18) {
                echo "Je bent nog niet volwassen!";
            }
            else{
                echo "JE BENT VOLWASSEN";
            }
        ?>
    </div>
</body>
</html>