<?php
    require_once './bd.php';

    $sql='DELETE FROM itemCarrinho WHERE ID=:id';
    $stmt=$PDO->prepare($sql);
    $stmt->bindParam(':id', $_REQUEST['id']);
    $result=$stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;