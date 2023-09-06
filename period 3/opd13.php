<?php

    $i = 0;
    if(isset($_COOKIE["count"])){
        $i = $_COOKIE["count"];
    }

    if($_POST){
        $i++;
        setcookie("count" , $i, time() + (86400 * 14));
        header("location: opd13.php");
    }

?>

<html>
    
    <head>
        <style>
            p {
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            input {
                width: 110px;
            }
        </style>
    </head>

    <body>
        <form method="post">
            <p>Cookie klik <?php echo $_COOKIE["count"]; ?></p>
            <input type="submit" value="Klik" name="cookie">
        </form>
    </body>

</html>