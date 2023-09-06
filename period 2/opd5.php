<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 5</title>
    <style>
        input[type=text] {
            border: 1px solid black;
            width: 200px;
            height: 25px;
            padding: 10px;
            font-weight: bold;
            margin-bottom: 10px;
			transition: width 0.4s ease-in-out;			
			transition: height 0.4s ease-in-out;
        }
		input[type=text]:focus {
			width: 220px;
			height: 45px;
		}
        input:focus::placeholder {
            color: transparent;
        }
		

    </style>
</head>

<body>

    <form action="" method="POST">
        <label for="text">TEKST </label>
        <input type="text" name="tekst" placeholder="Mijn Tekst">
        <input type="submit" value="Verzenden">
    </form>
    <?php
    $file = 'data.txt';
    if($_POST){
        $tekst = $_POST["tekst"];

        file_put_contents("data.txt", htmlspecialchars($tekst) . PHP_EOL , FILE_APPEND);

        $read = file_get_contents("data.txt");
        $read = str_replace(PHP_EOL, "<br/>", $read);

        echo $read;
        // $tekst_opslaan = fopen($file, 'a+');
        // $contents = $tekst . PHP_EOL;
        // fwrite($tekst_opslaan, $contents);
        // fclose($tekst_opslaan);
    }
    ?>
</body>

</html>