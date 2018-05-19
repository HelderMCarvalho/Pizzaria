<?php
    require_once 'db.php';

    function testarInput($dados){
        $dados=trim($dados);
        $dados=stripslashes($dados);
        $dados=htmlspecialchars($dados);
        return $dados;
    }

    $sql = 'INSERT INTO pessoa(nome, apelido, email, dataNascimento, morada, codigoPostal, freguesia, distrito, password) VALUES(:nome, :apelido, :email, :dataNascimento, :morada, :codigoPostal, :freguesia, :distrito, :password);';
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', testarInput($_POST['inputNome']));
    $stmt->bindParam(':apelido', testarInput($_POST['inputApelido']));
    $stmt->bindParam(':email', testarInput($_POST['inputEmail']));
    $stmt->bindParam(':dataNascimento', testarInput($_POST['inputDataNascimento']));
    $stmt->bindParam(':morada', testarInput($_POST['inputMorada']));
    $stmt->bindParam(':codigoPostal', testarInput($_POST['inputCodigoPostal']));
    $stmt->bindParam(':freguesia', testarInput($_POST['inputFreguesia']));
    $stmt->bindParam(':distrito', testarInput($_POST['inputDistrito']));
    $stmt->bindParam(':password', password_hash(testarInput($_POST['inputPassword']), PASSWORD_DEFAULT));
    $result = $stmt->execute();

    $sql = 'INSERT INTO carrinho(pessoaID) VALUES('.$PDO->lastInsertId().');';
    $stmt = $PDO->prepare($sql);
    $result = $stmt->execute();

    //header("Location: ./index.php");
    exit();