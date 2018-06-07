<?php
    require_once './bd.php';

    function testarInput($dados){
        $dados=trim($dados);
        $dados=stripslashes($dados);
        $dados=htmlspecialchars($dados);
        return $dados;
    }

    $sql='UPDATE crostaPizza SET nome=:nome, preco=:preco WHERE ID=:ID;';
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', testarInput($_POST['inputNome']));
    $stmt->bindParam(':preco', testarInput($_POST['inputPreco']));
    $stmt->bindParam(':ID',$_POST['inputID']);
    $result = $stmt->execute();

    header("Location: ../pages/listaCrostas.php");
    exit();