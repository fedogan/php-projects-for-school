<?php
    session_start();
    
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body style="background-color: aqua;">
        <h1>Pagina 2</h1>
        <form method="POST">
            <label for="firstName">Voornaam: </label><br>
            <input type="text" name="firstName" id="fname" value="<?php echo $_SESSION['firstName']; ?>"> <br><br>
            <label for="lastName">Achternaam: </label><br>
            <input type="text" name="lastName" id="lname" value="<?php echo $_SESSION['lastName']; ?>"> <br><br>
            <label for="fav_food">Favoriete eten</label> <br>
            <select name="favFood" id="favFood" >
                <option value="sushi" <?php echo $_SESSION['favFood'] == 'sushi' ? ' selected' : ''?>>Sushi</option>
                <option value="pizza" <?php echo $_SESSION['favFood'] == 'pizza' ? ' selected' : '' ?>>Pizza</option>
                <option value="pannekoeken" <?php echo $_SESSION['favFood'] == 'pannekoeken' ? ' selected' : '' ?>>Pannekoeken</option>
                <option value="snackbar" <?php echo $_SESSION['favFood'] == 'snackbar' ? ' selected' : '' ?>>Snackbar</option>
                <option value="aziatisch" <?php echo $_SESSION['favFood'] == 'aziatisch' ? ' selected' : '' ?>>Aziatisch</option>
                <option value="taart" <?php echo $_SESSION['favFood'] == 'taart' ? ' selected' : '' ?>>Taart</option>
                <option value="kfrikandel" <?php echo $_SESSION['favFood'] == 'kfrikandel' ? ' selected' : '' ?>>Koude Frikandelbroodjes</option> 
            </select> <br> <br>
            <input type="checkbox" name="kan_goed_programmeren" <?php echo $_SESSION['kanGoedProgrammeren'] = 1 ? 'checked' : '' ?>> ik kan goed programmeren <br> <br>
            <input type="submit" value="Verzenden"> 
        </form>
    </body>
</html>