<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Editar Molho | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT * FROM molhoPizza WHERE ID='.$_REQUEST['id'].';';
    $result = $PDO->query($sql);
    $molho = $result->fetch();
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Molho da Pizza</b></h1>
    </div>
    <form action="../php/editarMolhoBD.php" method="post">
        <input type="hidden" class="form-control" id="inputID" name="inputID" value="<?=$molho['ID']?>" required>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputNome">Nome:</label>
                    <input type="text" class="form-control" id="inputNome" name="inputNome" value="<?=$molho['nome']?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPreco">Preço:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="inputPreco" name="inputPreco" step="0.01"  value="<?=$molho['preco']?>" required>
                        <div class="input-group-addon">€</div>
                    </div>
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