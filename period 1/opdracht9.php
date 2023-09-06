<!DOCTYPE html>

<head>

</head>

<body>
    <form action="">
        Website <input type="text" name="site">
        <input type="submit" value="Verzenden">
        <?php
        if ($_GET) {
            $site = $_GET["site"];
            header("Location: $site");
        }
        ?>
    </form>

</body>

</html>