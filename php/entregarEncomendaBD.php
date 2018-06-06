<?php
    require_once './bd.php';
    $sql='UPDATE encomenda SET entregue=1 WHERE ID=:id;';
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $_REQUEST['id']);
    $result = $stmt->execute();
    header('Location: ../pages/listaEncomendas.php');
    exit();