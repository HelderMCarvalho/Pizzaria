<?php
    require_once './bd.php';
    session_start();

    if(isset($_SESSION['pessoaLogada'])){
        $caminho = '../img/';
        $caminho = $caminho . iconv("UTF-8", "ASCII//TRANSLIT", basename($_FILES['inputFoto']['name']));
        move_uploaded_file(iconv("UTF-8", "ASCII//TRANSLIT", $_FILES['inputFoto']['tmp_name']), $caminho);
        $foto = iconv("UTF-8", "ASCII//TRANSLIT", basename($_FILES['inputFoto']['name']));
        $caminhoBD='/img/'.$foto;

        $sql = 'INSERT INTO pizza(nome, imagem, pizzaPredefinida, pizzaPersonalizada) VALUES (:nome, :imagem, 1, 0);';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', $_POST['inputNome']);
        $stmt->bindParam(':imagem',$caminhoBD);
        $result = $stmt->execute();
        $idPizza=$PDO->lastInsertId();

        $sql='SELECT * FROM ingredientePizza;';
        $result = $PDO->query($sql);
        $listaIngredientes = $result->fetchAll();

        foreach($listaIngredientes as $ingrediente){
            if(!empty($_POST['input'.str_replace(' ', '', $ingrediente['nome'])])){
                $sql = 'INSERT INTO ingredientePizzaPorPizza(pizzaID, ingredientePizzaID, quantidade) VALUES (:pizzaID, :ingredientePizzaID, :quantidade);';
                $stmt = $PDO->prepare($sql);
                $stmt->bindParam(':pizzaID', $idPizza);
                $stmt->bindParam(':ingredientePizzaID',$ingrediente['ID']);
                $stmt->bindParam(':quantidade', $_POST['input'.str_replace(' ', '', $ingrediente['nome'])]);
                $result = $stmt->execute();
            }
        }

        header('Location: ../pages/listaPizzasPredefinidas.php');
    }else{
        echo 'Não tem sessão iniciada!';
    }
    exit();