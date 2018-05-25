<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Criar pizza | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Cria a tua própria Pizza</b></h1>
    </div>
    <div class="col-md-12 text-left">
        <form action="#">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <?php
                        $sql='SELECT * FROM tamanhoPizza;';
                        $result = $PDO->query($sql);
                        $tamanhosPizza = $result->fetchAll();
                    ?>
                    <label for="inputSize">Tamanho:</label>
                    <select class="form-control" name="inputTamanho" title="Tamanho" id="inputTamanho">
                        <?php
                            foreach($tamanhosPizza as $tamanhoPizza){ ?>
                                <option value="<?=$tamanhoPizza['ID']?>" preco="<?=$tamanhoPizza['preco']?>"><?=$tamanhoPizza['nome']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
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
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="inputMolho">Molho:</label>
                    <?php
                        $sql='SELECT * FROM molhoPizza;';
                        $result = $PDO->query($sql);
                        $molhosPizza = $result->fetchAll();
                    ?>
                    <select class="form-control" name="inputSauce" title="Sauce" id="inputSauce">
                        <?php
                            foreach($molhosPizza as $molhoPizza){ ?>
                                <option value="<?=$molhoPizza['ID']?>" preco="<?=$molhoPizza['preco']?>"><?=$molhoPizza['nome']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6 checkboxEQCriarPizza">
                    <div class="form-check">
                        <label id="labelEQCriarPizza">
                            <input type="checkbox" name="inputExtraQueijo" id="inputExtraQueijo"><span class="label-text">Extra queijo</span>
                        </label>
                    </div>
                </div>
            </div>
            <?php
                $sql='SELECT * FROM ingredientePizza;';
                $result = $PDO->query($sql);
                $ingredientesPizza = $result->fetchAll();
            ?>
            <div class="col-md-12 ingredientPicker">
                <?php
                foreach($ingredientesPizza as $ingredientePizza){ ?>
                    <div class="col-md-6 form-inline">
                        <div class="form-group">
                            <img src="<?=$ingredientePizza['imagem']?>" alt="<?=$ingredientePizza['nome']?>">
                            <label for="input<?=$ingredientePizza['nome']?>"><?=$ingredientePizza['nome']?></label>
                            <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            <div class="form-group">
                                <input type="number" class="form-control" value="0" name="input<?=$ingredientePizza['nome']?>" id="input<?=$ingredientePizza['nome']?>" min="0" max="10" style="display: none" preco="<?=$ingredientePizza['preco']?>">
                                <button type="button" class="btn btn-default buttonAddIngrediente" style="display: none"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-default buttonRemoveIngrediente" style="display: none"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-12 ingredientPicker">
                <div class="col-md-6 text-center form-inline">
                    <div class="form-group">
                        <label for="inputQuantidade">Quantidade de Pizzas:</label>
                        <input type="number" class="form-control" value="1" name="inputQuantidade" id="inputQuantidade" min="1" max="10">
                        <button type="button" class="btn btn-default" id="buttonAddQuantidade"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-default" id="buttonRemoveQuantidade"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <label for="preco">Preço:</label> <span id="preco">3.00</span>€
                    <button type="submit" class="btn btn-danger">Encomendar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>