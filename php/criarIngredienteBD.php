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
    $caminhoBD='/img/'.$foto;

    $sql = 'INSERT INTO ingredientePizza(nome, imagem, preco) VALUES(:nome, :imagem, :preco);';
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', testarInput($_POST['inputNome']));
    $stmt->bindParam(':imagem',$caminhoBD);
    $stmt->bindParam(':preco', testarInput($_POST['inputPreco']));
    $result = $stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();