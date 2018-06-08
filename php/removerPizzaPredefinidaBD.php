<?php
    require_once './bd.php';

    $sql='SELECT imagem FROM pizza WHERE ID='.$_REQUEST['id'].';';
    $result = $PDO->query($sql);
    $imagemIngredienteAnterior = $result->fetch();
    unlink('../'.$imagemIngredienteAnterior['imagem']);

    $sql='DELETE FROM pizza WHERE ID=:id';
    $stmt=$PDO->prepare($sql);
    $stmt->bindParam(':id', $_REQUEST['id']);
    $result=$stmt->execute();

    header("Location: ../pages/listaPizzasPredefinidas.php");
    exit();