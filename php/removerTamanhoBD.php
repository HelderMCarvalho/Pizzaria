<?php
    require_once './bd.php';

    $sql='DELETE FROM tamanhoPizza WHERE ID=:id';
    $stmt=$PDO->prepare($sql);
    $stmt->bindParam(':id', $_REQUEST['id']);
    $result=$stmt->execute();

    header("Location: ../pages/listaTamanhos.php");
    exit();