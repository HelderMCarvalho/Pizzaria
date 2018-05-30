<?php
    require_once './bd.php';
    session_start();    

    function testarInput($dados){
        $dados=trim($dados);
        $dados=stripslashes($dados);
        $dados=htmlspecialchars($dados);
        return $dados;
    }

    if(password_verify($_POST['inputPassword'], $_SESSION['pessoaLogada']['password'])){
        $sql='UPDATE pessoa SET nome=:nome, apelido=:apelido, email=:email, dataNascimento=:dataNascimento, morada=:morada, codigoPostal=:codigoPostal, freguesia=:freguesia, distrito=:distrito WHERE ID=:ID;';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', testarInput($_POST['inputNome']));
        $stmt->bindParam(':apelido', testarInput($_POST['inputApelido']));
        $stmt->bindParam(':email', testarInput($_POST['inputEmail']));
        $stmt->bindParam(':dataNascimento', testarInput($_POST['inputDataNascimento']));
        $stmt->bindParam(':morada', testarInput($_POST['inputMorada']));
        $stmt->bindParam(':codigoPostal', testarInput($_POST['inputCodigoPostal']));
        $stmt->bindParam(':freguesia', testarInput($_POST['inputFreguesia']));
        $stmt->bindParam(':distrito', testarInput($_POST['inputDistrito']));
        $stmt->bindParam(':ID',$_SESSION['pessoaLogada']['ID']);
        $result = $stmt->execute();

        $sql = 'SELECT * FROM pessoa WHERE ID="'.$_SESSION['pessoaLogada']['ID'].'";';
        $result = $PDO->query($sql);
        $row = $result->fetch();
        $_SESSION['pessoaLogada']=$row;
    }
    header('Location: ../pages/perfil.php');
    exit();