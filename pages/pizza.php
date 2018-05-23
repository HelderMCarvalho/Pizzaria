<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
    $sql='SELECT ID, nome, imagem, tamanhoID, crostaID, molhoID, extraQueijo, preco FROM pizza WHERE ID = '.$_REQUEST['id'].';';
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
        <div class="col-md-6">
            <img src="<?=$pizza['imagem']?>" class="img-responsive center-block" alt="<?=$pizza['nome']?>">
        </div>
        <div class="col-md-6 text-left">
            <form action="#">
                <div class="form-group">
                    <label for="inputSize">Tamanho:</label>
                    <?php
                        $sql='SELECT * FROM tamanhoPizza;';
                        $result = $PDO->query($sql);
                        $tamanhosPizzas = $result->fetchAll();
                    ?>
                    <select class="form-control" name="inputTamanho" title="inputTamanho" id="inputTamanho">
                        <?php
                            foreach($tamanhosPizzas as $tamanhoPizza){ ?>
                                <option value="<?=$tamanhoPizza['ID']?>" <?php if($tamanhoPizza['ID']==$pizza['tamanhoID']){echo 'selected';} ?>><?=$tamanhoPizza['nome']?></option>
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
                    <select class="form-control" name="inputCrosta" title="inputCrosta" id="inputCrosta">
                        <?php
                            foreach($crostasPizza as $crostaPizza){ ?>
                                <option value="<?=$crostaPizza['ID']?>" <?php if($crostaPizza['ID']==$pizza['crostaID']){echo 'selected';} ?>><?=$crostaPizza['nome']?></option>
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
                    <select class="form-control" name="inputMolho" title="inputMolho" id="inputMolho">
                        <?php
                        foreach($molhosPizza as $molhoPizza){ ?>
                            <option value="<?=$molhoPizza['ID']?>" <?php if($molhoPizza['ID']==$pizza['molhoID']){echo 'selected';} ?>><?=$molhoPizza['nome']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-check">
                    <label>
                        <input type="checkbox" name="inputExtraQueijo" id="inputExtraQueijo"><span class="label-text">Extra queijo</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-danger">Encomendar</button>
            </form>
            <h2 class="black">Preço: <span><?=$pizza['preco']?>€</span></h2>
        </div>
        <div class="col-md-12">
            <?php
                $sql='SELECT ingredientePizza.nome, ingredientePizza.imagem, ingredientePizzaPorPizza.quantidade FROM ingredientePizza INNER JOIN ingredientePizzaPorPizza ON ingredientePizza.ID = ingredientePizzaPorPizza.ingredientePizzaID WHERE ingredientePizzaPorPizza.pizzaID = '.$_REQUEST['id'].';';
                $result = $PDO->query($sql);
                $ingredientesPizza = $result->fetchAll();
                var_dump($ingredientesPizza);
            ?>
            <h1>Ingredientes</h1>
            <div class="col-md-3">Ingrediente 1</div>
            <div class="col-md-3">Ingrediente 2</div>
            <div class="col-md-3">Ingrediente 3</div>
            <div class="col-md-3">Ingrediente 4</div>
        </div>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>