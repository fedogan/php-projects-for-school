<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teller</title>
    <style>
        input {
            padding: 10px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php          
        if($_POST) {     
            $num = $_POST["nummer"];
            for($teller = 0; $teller < $num; $teller++){        
                echo "Teller = $teller <br/>";
            }
        }
    ?>
       
    <div class="container">
     <form action="" method="post">    
        <input type="number" name="nummer"  required="required">
        <input type="submit" value="Verzenden">
   
    </form>   
    </div>
    
</body>
</html>