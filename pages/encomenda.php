<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
    $sql='SELECT encomenda.ID, CONCAT(pessoa.nome, " ", pessoa.apelido) nomeCompletoCliente, encomenda.tipoEntrega, pessoa.morada, pessoa.codigoPostal, pessoa.freguesia, pessoa.distrito FROM encomenda INNER JOIN pessoa ON encomenda.pessoaID=pessoa.ID WHERE encomenda.ID='.$_REQUEST['id'].';';
    $result = $PDO->query($sql);
    $encomenda = $result->fetch();
    $sql='SELECT itemEncomenda.pizzaID, pizza.nome, itemEncomenda.quantidade, tamanhoPizza.nome tamanho, crostaPizza.nome crosta, molhoPizza.nome molho, itemEncomenda.extraQueijo, itemEncomenda.preco, ROUND(itemEncomenda.quantidade*itemEncomenda.preco, 2) TotalPorPizza FROM itemEncomenda INNER JOIN tamanhoPizza ON tamanhoPizza.ID=itemEncomenda.tamanhoID INNER JOIN crostaPizza ON crostaPizza.ID=itemEncomenda.crostaID INNER JOIN molhoPizza ON molhoPizza.ID=itemEncomenda.molhoID INNER JOIN pizza ON pizza.ID=itemEncomenda.pizzaID WHERE itemEncomenda.encomendaID='.$encomenda['ID'].';';
    $result = $PDO->query($sql);
    $itemsEncomenda = $result->fetchAll();
?>
    <title>Encomenda #<?=$encomenda['ID']?> | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container-fluid paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Encomenda #<?=$encomenda['ID']?></b> <small><?=$encomenda['nomeCompletoCliente']?></small></h1>
        <br>
        <table class="table table-bordered table-hover tabelaMinhasPizzas" style="background-color: white;">
            <thead>
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center">Tamanho</th>
                    <th class="text-center">Crosta</th>
                    <th class="text-center">Molho</th>
                    <th class="text-center">Extra Queijo</th>
                    <th class="text-center">Ingredientes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $totalCarrinho=0;
                    foreach($itemsEncomenda as $itemEncomenda){
                        $sql='SELECT ingredientePizza.nome, ingredientePizza.imagem, ingredientePizzaPorPizza.quantidade FROM ingredientePizza INNER JOIN ingredientePizzaPorPizza ON ingredientePizza.ID=ingredientePizzaPorPizza.ingredientePizzaID WHERE ingredientePizzaPorPizza.pizzaID='.$itemEncomenda['pizzaID'].';';
                        $result = $PDO->query($sql);
                        $ingredientesItem = $result->fetchAll();
                        $totalCarrinho+=$itemEncomenda['TotalPorPizza'];
                ?>
                <tr>
                    <td><?=$itemEncomenda['nome']?></td>
                    <td><?=$itemEncomenda['quantidade']?></td>
                    <td><?=$itemEncomenda['tamanho']?></td>
                    <td><?=$itemEncomenda['crosta']?></td>
                    <td><?=$itemEncomenda['molho']?></td>
                    <td><?php if($itemEncomenda['extraQueijo']==0){echo 'Não';}else{echo 'Sim';} ?></td>
                    <td>
                        <?php
                            foreach($ingredientesItem as $ingredienteItem){ ?>
                                <img src="<?=$ingredienteItem['imagem']?>" alt="<?=$ingredienteItem['nome']?>"><b>x<?=$ingredienteItem['quantidade']?></b>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 text-right">
        <h2><b>Total: </b><?=$totalCarrinho?>€</h2>
        <p><?php if($encomenda['tipoEnrega']===0){echo 'Levantamento em Loja';}else{echo 'Entrega em Casa';}?></p>
        <p><b>Local de entrga:</b></p>
        <p><?=$encomenda['morada']?></p>
        <p><?=$encomenda['codigoPostal'].' '.$encomenda['freguesia'].', '.$encomenda['distrito']?></p>
        <a href="../php/entregarEncomendaBD.php?id=<?=$encomenda['ID']?>" class="btn btn-success">Entregue</a>
        <a href="../php/removerEncomendaBD.php?id=<?=$encomenda['ID']?>" class="btn btn-danger">Remover</a>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>