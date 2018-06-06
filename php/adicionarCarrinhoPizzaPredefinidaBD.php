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

        $sql='SELECT ingredientePizza.preco, ingredientePizzaPorPizza.quantidade, ROUND(ingredientePizza.preco*ingredientePizzaPorPizza.quantidade, 2) TotalPorIngrediente FROM ingredientePizza INNER JOIN ingredientePizzaPorPizza ON ingredientePizza.ID=ingredientePizzaPorPizza.ingredientePizzaID WHERE ingredientePizzaPorPizza.pizzaID='.$_POST['inputID'].';';
        $result = $PDO->query($sql);
        $precoIngredientes = $result->fetchAll();

        $preco=floatval($precoTamanho['preco']+$precoCrosta['preco']+$precoMolho['preco']);
        foreach ($precoIngredientes as $precoIngrediente){
            $preco+=floatval($precoIngrediente['TotalPorIngrediente']);
        }

        if($_POST['inputExtraQueijo']=='on'){
            $extraQueijo=1;
        }else{
            $extraQueijo=0;
        }

        $sql = 'INSERT INTO itemCarrinho(pizzaID, quantidade, tamanhoID, crostaID, molhoID, extraQueijo, preco, carrinhoID) VALUES(:pizzaID, :quantidade, :tamanhoID, :crostaID, :molhoID, :extraQueijo, :preco, :carrinhoID);';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':pizzaID', $_POST['inputID']);
        $stmt->bindParam(':quantidade', $_POST['inputQuantidade']);
        $stmt->bindParam(':tamanhoID', $_POST['inputTamanho']);
        $stmt->bindParam(':crostaID', $_POST['inputCrosta']);
        $stmt->bindParam(':molhoID', $_POST['inputMolho']);
        $stmt->bindParam(':extraQueijo', $extraQueijo);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':carrinhoID', $carrinhoPessoa['ID']);
        $result = $stmt->execute();
        header('Location: ../pages/menus.php');
    }else{
        echo 'Não tem sessão iniciada!';
    }
    exit();