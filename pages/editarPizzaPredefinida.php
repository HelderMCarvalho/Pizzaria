<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Editar Pizza predefinida | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT * FROM pizza WHERE ID='.$_REQUEST['id'].';';
    $result = $PDO->query($sql);
    $pizza = $result->fetch();
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Editar Pizza predefinida</b></h1>
    </div>
    <form action="../php/editarPizzaPredefinidaBD.php" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="inputID" name="inputID" value="<?=$pizza['ID']?>" required>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputNome">Nome:</label>
                <input type="text" class="form-control" id="inputNome" name="inputNome" value="<?=$pizza['nome']?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputFoto">Nova Imagem:</label>
            <div class="form-group input-group input-file">
                <div class="form-control">Nenhuma Imagem selecionada!</div>
                <span class="input-group-addon">
                <a class='btn btn-primary' href='javascript:'>Procurar
                    <input type="file" id="inputFoto" name="inputFoto" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());">
                </a>
            </span>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <label>Imagem atual:</label><br>
            <img src="<?=$pizza['imagem']?>" alt="<?=$pizza['nome']?>">
        </div>
        <div class="col-md-12">
            <br>
            <h1 class="text-center">Ingredientes</h1>
            <br>
            <?php
                $sql='SELECT * FROM ingredientePizza;';
                $result = $PDO->query($sql);
                $todosIngredientes = $result->fetchAll();
                $sql='SELECT ingredientePizza.ID, ingredientePizzaPorPizza.quantidade FROM ingredientePizza INNER JOIN ingredientePizzaPorPizza ON ingredientePizza.ID=ingredientePizzaPorPizza.ingredientePizzaID WHERE ingredientePizzaPorPizza.pizzaID='.$_REQUEST['id'].';';
                $result = $PDO->query($sql);
                $ingredientesPizza = $result->fetchAll();
             ?>
            <div class="col-md-12 ingredientPicker">
                <?php
                    foreach($todosIngredientes as $ingrediente) {
                        foreach ($ingredientesPizza as $ingredientePizza) {
                            $igual=0;
                            if ($ingrediente['ID'] == $ingredientePizza['ID']){ $igual=1;?>
                                <div class="col-md-6 form-inline">
                                    <div class="form-group">
                                        <img src="<?=$ingrediente['imagem']?>" alt="<?=$ingrediente['nome']?>">
                                        <label for="input<?=str_replace(' ', '', $ingrediente['nome'])?>"><?=$ingrediente['nome']?></label>
                                        <button type="button" class="btn btn-lg btn-toggle active" data-toggle="button" aria-pressed="false" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                        <div class="form-group">
                                            <input type="number" class="form-control" value="<?=$ingredientePizza['quantidade']?>" name="input<?=str_replace(' ', '', $ingrediente['nome'])?>" id="input<?=str_replace(' ', '', $ingrediente['nome'])?>" min="0" max="10">
                                            <button type="button" class="btn btn-default buttonAddIngrediente"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                            <button type="button" class="btn btn-default buttonRemoveIngrediente"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                break;
                            }
                        }
                        if($igual==0) { ?>
                            <div class="col-md-6 form-inline">
                                <div class="form-group">
                                    <img src="<?=$ingrediente['imagem']?>" alt="<?=$ingrediente['nome']?>">
                                    <label for="input<?=str_replace(' ', '', $ingrediente['nome'])?>"><?=$ingrediente['nome']?></label>
                                    <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="0" name="input<?=str_replace(' ', '', $ingrediente['nome'])?>" id="input<?=str_replace(' ', '', $ingrediente['nome'])?>" min="0" max="10" style="display: none"">
                                        <button type="button" class="btn btn-default buttonAddIngrediente" style="display: none"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                        <button type="button" class="btn btn-default buttonRemoveIngrediente" style="display: none"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-info">Editar</button>
        </div>
    </form>
</div>
<?php
    require_once './partials/footer.html';
?>