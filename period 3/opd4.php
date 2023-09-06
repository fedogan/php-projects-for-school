<html>

<head>
    <style>
        .red {
            color:red;

        }
        .green {
            color:green;

        }
        .blue {
            color:blue;

        }
    </style>
</head>

<body>
    <?php

    for ($i = 0; $i <= 30; $i++) {

        if ($i <= 10) {
            echo "<span class='red'> $i </span>";
        } elseif($i <= 20) {
            echo "<span class='blue'> $i </span>";
        } else {
            echo "<span class='green'> $i </span>";
        }
    }


    ?>
</body>

</html>