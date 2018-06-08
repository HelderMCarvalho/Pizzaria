<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Criar Pizza predefinida | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Criação de Pizza predefinida</b></h1>
    </div>
    <div class="col-md-12 text-left">
        <form action="../php/criarPizzaPredefinidaBD.php" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome:</label>
                    <input type="text" class="form-control" id="inputNome" name="inputNome" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFoto">Imagem:</label>
                    <div class="form-group input-group input-file">
                        <div class="form-control">Nenhuma Imagem selecionada!</div>
                        <span class="input-group-addon">
                        <a class='btn btn-primary' href='javascript:'>Procurar
                            <input type="file" id="inputFoto" name="inputFoto" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());">
                        </a>
                    </span>
                    </div>
                </div>
            </div>
            <?php
                $sql='SELECT * FROM ingredientePizza;';
                $result = $PDO->query($sql);
                $ingredientesPizza = $result->fetchAll();
            ?>
            <div class="col-md-12 ingredientPicker">
                <?php foreach($ingredientesPizza as $ingredientePizza){ ?>
                    <div class="col-md-6 form-inline">
                        <div class="form-group">
                            <img src="<?=$ingredientePizza['imagem']?>" alt="<?=$ingredientePizza['nome']?>">
                            <label for="input<?=str_replace(' ', '', $ingredientePizza['nome'])?>"><?=$ingredientePizza['nome']?></label>
                            <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            <div class="form-group">
                                <input type="number" class="form-control" value="0" name="input<?=str_replace(' ', '', $ingredientePizza['nome'])?>" id="input<?=str_replace(' ', '', $ingredientePizza['nome'])?>" min="0" max="10" style="display: none" preco="<?=$ingredientePizza['preco']?>">
                                <button type="button" class="btn btn-default buttonAddIngrediente" style="display: none"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-default buttonRemoveIngrediente" style="display: none"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </form>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>