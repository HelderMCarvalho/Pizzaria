<?php
    require_once './bd.php';

    $caminho = '../img/';
    $caminho = $caminho . iconv("UTF-8", "ASCII//TRANSLIT", basename($_FILES['inputFoto']['name']));
    move_uploaded_file(iconv("UTF-8", "ASCII//TRANSLIT", $_FILES['inputFoto']['tmp_name']), $caminho);
    $foto = iconv("UTF-8", "ASCII//TRANSLIT", basename($_FILES['inputFoto']['name']));
    $caminhoBD='/img/'.$foto;

    if (!empty($foto)) {
        $sql='SELECT imagem FROM pizza WHERE ID='.$_POST['inputID'].';';
        $result = $PDO->query($sql);
        $imagemPizzaAnterior = $result->fetch();
        unlink('../'.$imagemPizzaAnterior['imagem']);

        $sql = 'UPDATE pizza SET nome=:nome, imagem=:imagem WHERE ID=:ID;';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', $_POST['inputNome']);
        $stmt->bindParam(':imagem',$caminhoBD);
        $stmt->bindParam(':ID',$_POST['inputID']);
        $result = $stmt->execute();
    }else{
        $sql = 'UPDATE pizza SET nome=:nome WHERE ID=:ID;';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', $_POST['inputNome']);
        $stmt->bindParam(':ID',$_POST['inputID']);
        $result = $stmt->execute();
    }

    $sql='SELECT * FROM ingredientePizza;';
    $result = $PDO->query($sql);
    $todosIngredientes = $result->fetchAll();
    $sql='SELECT ingredientePizza.ID, ingredientePizzaPorPizza.quantidade FROM ingredientePizza INNER JOIN ingredientePizzaPorPizza ON ingredientePizza.ID=ingredientePizzaPorPizza.ingredientePizzaID WHERE ingredientePizzaPorPizza.pizzaID='.$_POST['inputID'].';';
    $result = $PDO->query($sql);
    $ingredientesPizza = $result->fetchAll();

    foreach($todosIngredientes as $ingrediente){
        foreach($ingredientesPizza as $ingredientePizza){
            $igual=0;
            if($ingrediente['ID']==$ingredientePizza['ID']){
                $igual=1;
                if(!empty($_POST['input'.str_replace(' ', '', $ingrediente['nome'])])){
                    $sql = 'UPDATE ingredientePizzaPorPizza SET quantidade=:quantidade WHERE (pizzaID=:pizzaID) AND (ingredientePizzaID=:ingredientePizzaID);';
                    $stmt = $PDO->prepare($sql);
                    $stmt->bindParam(':quantidade', $_POST['input'.str_replace(' ', '', $ingrediente['nome'])]);
                    $stmt->bindParam(':pizzaID', $_POST['inputID']);
                    $stmt->bindParam(':ingredientePizzaID',$ingrediente['ID']);
                    $result = $stmt->execute();
                }else{
                    $sql='DELETE FROM ingredientePizzaPorPizza WHERE (pizzaID=:pizzaID) AND (ingredientePizzaID=:ingredientePizzaID)';
                    $stmt=$PDO->prepare($sql);
                    $stmt->bindParam(':pizzaID', $_POST['inputID']);
                    $stmt->bindParam(':ingredientePizzaID',$ingrediente['ID']);
                    $result=$stmt->execute();
                }
                break;
            }
        }
        if($igual==0){
            if(!empty($_POST['input'.str_replace(' ', '', $ingrediente['nome'])])) {
                $sql = 'INSERT INTO ingredientePizzaPorPizza(pizzaID, ingredientePizzaID, quantidade) VALUES (:pizzaID, :ingredientePizzaID, :quantidade);';
                $stmt = $PDO->prepare($sql);
                $stmt->bindParam(':pizzaID', $_POST['inputID']);
                $stmt->bindParam(':ingredientePizzaID', $ingrediente['ID']);
                $stmt->bindParam(':quantidade', $_POST['input' . str_replace(' ', '', $ingrediente['nome'])]);
                $result = $stmt->execute();
            }
        }
    }

    header('Location: ../pages/listaPizzasPredefinidas.php');
    exit();