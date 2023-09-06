<?php
            if($_POST) {
                $kleur = htmlspecialchars($_POST["kleur"]);
                echo "<div style='background-color: $kleur;'> </div>";
            }
?>


<!DOCTYPE html>
<head>
    <style>
        div {
            width: 250px;
            height: 250px;
            border: 2px solid black;
            text-align: center;
            justify-content: center;
        }
        input 
        {
            margin-top: 5px;
        }
    </style>
</head>
<body>    
    
    <form action="" method="post">
        <input type="text" name="kleur">
        <input type="submit" value="verzenden">
    </form>
</body>
</html>