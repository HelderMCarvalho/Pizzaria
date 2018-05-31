<?php
    require_once './bd.php';
    session_start();

    if(isset($_SESSION['pessoaLogada'])){
        $sql = 'INSERT INTO encomenda(pessoaID) VALUES('.$_SESSION['pessoaLogada']['ID'].');';
        $stmt = $PDO->prepare($sql);
        $result = $stmt->execute();
        $idEncomenda=$PDO->lastInsertId();

        $sql='SELECT ID FROM carrinho WHERE pessoaID = '.$_SESSION['pessoaLogada']['ID'].';';
        $result = $PDO->query($sql);
        $carrinhoPessoa = $result->fetch();

        $sql = 'SELECT ID FROM itemCarrinho WHERE carrinhoID='.$carrinhoPessoa['ID'].';';
        $result = $PDO->query($sql);
        $itemsCarrinho = $result->fetchAll();

        foreach($itemsCarrinho as $itemCarrinho){
            $sql = 'INSERT INTO itemEncomenda(pizzaID, quantidade, tamanhoID, crostaID, molhoID, extraQueijo, preco, encomendaID) SELECT pizzaID, quantidade, tamanhoID, crostaID, molhoID, extraQueijo, preco, "'.$idEncomenda.'" FROM itemCarrinho WHERE itemCarrinho.ID="'.$itemCarrinho['ID'].'";';
            $stmt = $PDO->prepare($sql);
            $result = $stmt->execute();
            $sql = 'DELETE FROM itemCarrinho WHERE ID='.$itemCarrinho['ID'].';';
            $stmt = $PDO->prepare($sql);
            $result = $stmt->execute();
        }
        header('Location: ../pages/menus.php');
    }else{
        echo 'Não tem sessão iniciada!';
    }
    exit();