<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Editar Ingrediente | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT * FROM ingredientePizza WHERE ID='.$_REQUEST['id'].';';
    $result = $PDO->query($sql);
    $ingrediente = $result->fetch();
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Ingrediente da Pizza</b></h1>
    </div>
    <form action="../php/editarIngredienteBD.php" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="inputID" name="inputID" value="<?=$ingrediente['ID']?>" required>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputNome">Nome:</label>
                    <input type="text" class="form-control" id="inputNome" name="inputNome" value="<?=$ingrediente['nome']?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPreco">Preço:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="inputPreco" name="inputPreco" step="0.01"  value="<?=$ingrediente['preco']?>" required>
                        <div class="input-group-addon">€</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Imagem atual:</label><br>
                <img src="<?=$ingrediente['imagem']?>" alt="<?=$ingrediente['nome']?>">
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
        </div>
        <div class="col-md-12 text-center paddingLess">
            <button type="submit" class="btn btn-info">Editar</button>
        </div>
    </form>
</div>
<?php
    require_once './partials/footer.html';
?>