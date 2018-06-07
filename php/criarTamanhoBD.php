<?php
    require_once './bd.php';

    function testarInput($dados){
        $dados=trim($dados);
        $dados=stripslashes($dados);
        $dados=htmlspecialchars($dados);
        return $dados;
    }

    $sql = 'INSERT INTO tamanhoPizza(nome, preco) VALUES(:nome, :preco);';
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', testarInput($_POST['inputNome']));
    $stmt->bindParam(':preco', testarInput($_POST['inputPreco']));
    $result = $stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();