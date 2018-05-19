<?php
    require_once './bd.php';

    function testarInput($dados){
        $dados=trim($dados);
        $dados=stripslashes($dados);
        $dados=htmlspecialchars($dados);
        return $dados;
    }

    if($_POST){
        session_start();
        $email = testarInput($_POST['inputEmail']);
        $password = $_POST['inputPassword'];

        $sql = 'SELECT password FROM pessoa WHERE email="'.$email.'";';
        $result = $PDO->query($sql);
        $row = $result->fetch();

        if($row && password_verify($password, $row['password'])){
            $sql = 'SELECT * FROM pessoa WHERE email="'.$email.'";';
            $result = $PDO->query($sql);
            $row = $result->fetch();
            $_SESSION['pessoaLogada'] = $row;
            header('Location: ../index.php');
        }else{
            unset ($_SESSION['pessoaLogada']);
            header('Location: ../pages/login.php');
        }
    }else{
        unset ($_SESSION['pessoaLogada']);
        header('Location: ../pages/login.php');
    }
    exit();