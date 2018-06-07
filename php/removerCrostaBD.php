<?php
    require_once './bd.php';

    $sql='DELETE FROM crostaPizza WHERE ID=:id';
    $stmt=$PDO->prepare($sql);
    $stmt->bindParam(':id', $_REQUEST['id']);
    $result=$stmt->execute();

    header("Location: ../pages/listaCrostas.php");
    exit();