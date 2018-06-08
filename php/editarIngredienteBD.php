<?php
    require_once './bd.php';

    function testarInput($dados){
        $dados=trim($dados);
        $dados=stripslashes($dados);
        $dados=htmlspecialchars($dados);
        return $dados;
    }

    $caminho = '../img/';
    $caminho = $caminho . iconv("UTF-8", "ASCII//TRANSLIT", basename($_FILES['inputFoto']['name']));
    move_uploaded_file(iconv("UTF-8", "ASCII//TRANSLIT", $_FILES['inputFoto']['tmp_name']), $caminho);
    $foto = iconv("UTF-8", "ASCII//TRANSLIT", basename($_FILES['inputFoto']['name']));
    $caminhoBD = '/img/' . $foto;

    if (!empty($foto)) {
        $sql='SELECT imagem FROM ingredientePizza WHERE ID='.$_POST['inputID'].';';
        $result = $PDO->query($sql);
        $imagemIngredienteAnterior = $result->fetch();
        unlink('../'.$imagemIngredienteAnterior['imagem']);

        $sql='UPDATE ingredientePizza SET nome=:nome, imagem=:imagem, preco=:preco WHERE ID=:ID;';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', testarInput($_POST['inputNome']));
        $stmt->bindParam(':imagem',$caminhoBD);
        $stmt->bindParam(':preco', testarInput($_POST['inputPreco']));
        $stmt->bindParam(':ID',$_POST['inputID']);
        $result = $stmt->execute();
    }else{
        $sql='UPDATE ingredientePizza SET nome=:nome, preco=:preco WHERE ID=:ID;';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', testarInput($_POST['inputNome']));
        $stmt->bindParam(':preco', testarInput($_POST['inputPreco']));
        $stmt->bindParam(':ID',$_POST['inputID']);
    }

    header("Location: ../pages/listaIngredientes.php");
    exit();