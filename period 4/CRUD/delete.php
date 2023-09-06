<?php
    require_once "database.php";

    $stmt = $con->prepare("DELETE FROM `person` WHERE id = ?");
    $stmt->bindValue(1, $_GET["id"]);
    $stmt->execute();
    header("Location: index.php");
?>