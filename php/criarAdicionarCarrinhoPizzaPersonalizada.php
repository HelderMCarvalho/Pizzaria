<?php
    require_once './bd.php';
    session_start();

    if(isset($_SESSION['pessoaLogada'])){
        $sql='SELECT ID FROM carrinho WHERE pessoaID='.$_SESSION['pessoaLogada']['ID'].';';
        $result = $PDO->query($sql);
        $carrinhoPessoa = $result->fetch();

        $sql='SELECT preco FROM tamanhoPizza WHERE ID='.$_POST['inputTamanho'].';';
        $result = $PDO->query($sql);
        $precoTamanho = $result->fetch();

        $sql='SELECT preco FROM crostaPizza WHERE ID='.$_POST['inputCrosta'].';';
        $result = $PDO->query($sql);
        $precoCrosta = $result->fetch();

        $sql='SELECT preco FROM molhoPizza WHERE ID='.$_POST['inputMolho'].';';
        $result = $PDO->query($sql);
        $precoMolho = $result->fetch();

        if($_POST['inputExtraQueijo']=='on'){
            $extraQueijo=1;
        }else{
            $extraQueijo=0;
        }

        $preco=floatval($precoTamanho['preco']+$precoCrosta['preco']+$precoMolho['preco']);

        $sql = 'INSERT INTO pizza(nome, imagem, pizzaPredefinida, pizzaPersonalizada, pessoaID) VALUES (\'Pizza\', \'/img/pizza2.jpg\', 0, 1, :pessoaID);';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':pessoaID', $_SESSION['pessoaLogada']['ID']);
        $result = $stmt->execute();
        $idPizza=$PDO->lastInsertId();

        $sql='UPDATE pizza SET nome=\'Pizza #'.$idPizza.'\' WHERE ID=:ID;';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':ID',$idPizza);
        $result = $stmt->execute();

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
                $preco+=floatval($ingrediente['preco'])*$_POST['input'.str_replace(' ', '', $ingrediente['nome'])];
            }
        }

        $sql = 'INSERT INTO itemCarrinho(pizzaID, quantidade, tamanhoID, crostaID, molhoID, extraQueijo, preco, carrinhoID) VALUES(:pizzaID, :quantidade, :tamanhoID, :crostaID, :molhoID, :extraQueijo, :preco, :carrinhoID);';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':pizzaID', $idPizza);
        $stmt->bindParam(':quantidade', $_POST['inputQuantidade']);
        $stmt->bindParam(':tamanhoID', $_POST['inputTamanho']);
        $stmt->bindParam(':crostaID', $_POST['inputCrosta']);
        $stmt->bindParam(':molhoID', $_POST['inputMolho']);
        $stmt->bindParam(':extraQueijo', $extraQueijo);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':carrinhoID', $carrinhoPessoa['ID']);
        $result = $stmt->execute();
        header('Location: ../pages/criarPizza.php');
    }else{
        echo 'Não tem sessão iniciada!';
    }
    exit();