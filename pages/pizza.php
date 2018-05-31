<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
    $sql='SELECT ID, nome, imagem FROM pizza WHERE ID = '.$_REQUEST['id'].';';
    $result = $PDO->query($sql);
    $pizza = $result->fetch();
?>
    <title><?=$pizza['nome']?> | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container-fluid paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b><?=$pizza['nome']?></b></h1>
        <br>
        <div class="col-md-6">
            <img src="<?=$pizza['imagem']?>" class="img-responsive center-block" alt="<?=$pizza['nome']?>">
        </div>
        <div class="col-md-6 text-left">
            <form action="../php/adicionarCarrinhoPizzaPredefinidaBD.php" method="post">
                <input type="hidden" id="inputID" name="inputID" value="<?=$_REQUEST['id']?>">
                <div class="form-group">
                    <label for="inputSize">Tamanho:</label>
                    <?php
                        $sql='SELECT * FROM tamanhoPizza;';
                        $result = $PDO->query($sql);
                        $tamanhosPizza = $result->fetchAll();
                    ?>
                    <select class="form-control" name="inputTamanho" title="Tamanho" id="inputTamanho">
                        <?php
                            foreach($tamanhosPizza as $tamanhoPizza){ ?>
                                <option value="<?=$tamanhoPizza['ID']?>" preco="<?=$tamanhoPizza['preco']?>"><?=$tamanhoPizza['nome']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputCrosta">Crosta:</label>
                    <?php
                        $sql='SELECT * FROM crostaPizza;';
                        $result = $PDO->query($sql);
                        $crostasPizza = $result->fetchAll();
                    ?>
                    <select class="form-control" name="inputCrosta" title="Crosta" id="inputCrosta">
                        <?php
                            foreach($crostasPizza as $crostaPizza){ ?>
                                <option value="<?=$crostaPizza['ID']?>" preco="<?=$crostaPizza['preco']?>"><?=$crostaPizza['nome']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputMolho">Molho:</label>
                    <?php
                    $sql='SELECT * FROM molhoPizza;';
                    $result = $PDO->query($sql);
                    $molhosPizza = $result->fetchAll();
                    ?>
                    <select class="form-control" name="inputMolho" title="Molho" id="inputMolho">
                        <?php
                        foreach($molhosPizza as $molhoPizza){ ?>
                            <option value="<?=$molhoPizza['ID']?>" preco="<?=$molhoPizza['preco']?>"><?=$molhoPizza['nome']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-check">
                    <label>
                        <input type="checkbox" name="inputExtraQueijo" id="inputExtraQueijo"><span class="label-text">Extra queijo</span>
                    </label>
                </div>
                <div class="form-group form-inline">
                    <label for="inputQuantidade">Quantidade de Pizzas:</label>
                    <input type="number" class="form-control" value="1" name="inputQuantidade" id="inputQuantidade" min="1" max="10">
                    <button type="button" class="btn btn-default" id="buttonAddQuantidade"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    <button type="button" class="btn btn-default" id="buttonRemoveQuantidade"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                </div>
                <button type="submit" class="btn btn-danger">Encomendar</button>
            </form>
            <?php
                $sql='SELECT ingredientePizza.nome, ingredientePizza.imagem, ingredientePizza.preco, ingredientePizzaPorPizza.quantidade, ROUND(ingredientePizza.preco*ingredientePizzaPorPizza.quantidade, 2) TotalPorIngrediente FROM ingredientePizza INNER JOIN ingredientePizzaPorPizza ON ingredientePizza.ID = ingredientePizzaPorPizza.ingredientePizzaID WHERE ingredientePizzaPorPizza.pizzaID = '.$_REQUEST['id'].';';
                $result = $PDO->query($sql);
                $ingredientesPizza = $result->fetchAll();
                $precoBase=(reset($tamanhosPizza)['preco'])+(reset($crostasPizza)['preco'])+(reset($molhosPizza)['preco']);
                foreach($ingredientesPizza as $ingredientePizza){
                    $precoBase+=$ingredientePizza['TotalPorIngrediente'];
                }
            ?>
            <h2 class="black">Preço: <span id="preco"><?=sprintf('%0.2f', $precoBase)?></span>€</h2>
        </div>
        <div class="col-md-12">
            <br>
            <h1>Ingredientes</h1>
            <br>
            <?php
                foreach($ingredientesPizza as $ingredientePizza){ ?>
                    <div class="col-md-3">
                        <img src="<?=$ingredientePizza['imagem']?>" alt="<?=$ingredientePizza['nome']?>">
                        <?=$ingredientePizza['nome'].' <b>x '.$ingredientePizza['quantidade'].'</b>'?></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>