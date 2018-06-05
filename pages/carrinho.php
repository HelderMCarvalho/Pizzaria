<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Carrinho | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql = 'SELECT ID FROM carrinho WHERE pessoaID="'.$_SESSION['pessoaLogada']['ID'].'";';
    $result = $PDO->query($sql);
    $carrinho = $result->fetch();
    $sql = 'SELECT itemCarrinho.ID, pizza.nome, pizza.imagem, itemCarrinho.quantidade, itemCarrinho.preco, ROUND(itemCarrinho.quantidade*itemCarrinho.preco, 2) TotalPorPizza FROM itemCarrinho INNER JOIN pizza ON pizza.ID=itemCarrinho.pizzaID WHERE itemCarrinho.carrinhoID="'.$carrinho['ID'].'";';
    $result = $PDO->query($sql);
    $itemsCarrinho = $result->fetchAll();
?>
<div class="container marTop">
    <div class="col-md-12">
        <h1 class="text-center"><b>O meu carrinho</b></h1>
        <table class="table table-bordered table-hover tabelaMinhasPizzas" style="background-color: white;">
            <thead>
            <tr>
                <th class="text-center">Imagem</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Preço</th>
                <th class="text-center">Quantidade</th>
                <th class="text-center">Opções</th>
            </tr>
            </thead>
            <tbody>
                <?php if(empty($itemsCarrinho) && isset($_SESSION['pessoaLogada'])){ ?>
                    <br><br><br><br>
                    <h2 class="text-center">Carrinho Vazio</h2>
                <?php }else{
                    $totalCarrinho=0;
                    foreach($itemsCarrinho as $itemCarrinho){
                        $totalCarrinho+=$itemCarrinho['TotalPorPizza'];
                    ?>
                    <tr class="text-center">
                        <td>
                            <img src="<?=$itemCarrinho['imagem']?>" width="150" height="auto" alt="<?=$itemCarrinho['nome']?>"/>
                        </td>
                        <td><?=$itemCarrinho['nome']?></td>
                        <td><?=$itemCarrinho['preco']?>€</td>
                        <td><?=$itemCarrinho['quantidade']?></td>
                        <td>
                            <a href="../php/removerItemCarrinho.php?id=<?=$itemCarrinho['ID']?>" class="btn btn-danger">
                                <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
        <div class="col-md-12 text-right">
            <h2><b>Total: </b><?=$totalCarrinho?>€</h2>
        </div>
        <form action="../php/encomendarCarrinhoBD.php" method="post" class="form-inline col-md-12 text-right">
            <div class="form-group">
                <label style="vertical-align: text-bottom">Tipo de entraga:</label>
                <label>
                    <input type="checkbox" name="inputLevantamentoLoja" id="inputLevantamentoLoja"><span class="label-text">Levantamento em Loja</span>
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="inputEntregaCasa" id="inputEntregaCasa"><span class="label-text">Entrega em Casa</span>
                </label>
            </div>
            <div class="col-md-12 text-right paddingLess">
                <button type="submit" class="btn btn-danger">Encomendar</button>
            </div>
        </form>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>