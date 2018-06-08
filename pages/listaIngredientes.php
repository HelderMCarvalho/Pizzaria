<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Lista de Ingredientes | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT * FROM ingredientePizza;';
    $result = $PDO->query($sql);
    $listaIngredientes = $result->fetchAll();
?>
<div class="container marTop">
    <div class="col-md-12 text-center">
        <h1 class="text-center"><b>Lista de Ingredientes</b></h1>
        <?php if(empty($listaIngredientes)){
            echo '<br><br><br><br><b>Não existem Ingredientes criados!</b>';
        }else{ ?>
            <table class="table table-bordered table-hover tabelaMinhasPizzas" style="background-color: white;">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Imagem</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Opções</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($listaIngredientes as $ingrediente){ ?>
                            <tr>
                                <td><?=$ingrediente['ID']?></td>
                                <td><?=$ingrediente['nome']?></td>
                                <td><img src="<?=$ingrediente['imagem']?>" alt="<?=$ingrediente['nome']?>"></td>
                                <td><?=$ingrediente['preco']?></td>
                                <td><a href="../pages/editarIngrediente.php?id=<?=$ingrediente['ID']?>" class="btn btn-info">Editar</a> <a href="../php/removerIngredienteBD.php?id=<?=$ingrediente['ID']?>" class="btn btn-danger">Apagar</a></td>
                            </tr>
                    <?php } ?>
                    <form action="../php/criarIngredienteBD.php" method="post" enctype="multipart/form-data">
                        <tr>
                            <td>ID</td>
                            <td><input type="text" class="form-control" id="inputNome" name="inputNome" required></td>
                            <td>
                                <div class="input-group input-file">
                                    <div class="form-control">Nenhuma Imagem selecionada!</div>
                                    <span class="input-group-addon">
                                        <a class='btn btn-primary' href='javascript:'>Procurar
                                          <input type="file" id="inputFoto" name="inputFoto" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" required>
                                        </a>
                                  </span>
                                </div>
                            </td>
                            <td><input type="number" class="form-control" id="inputPreco" name="inputPreco" step="0.01" required></td>
                            <td><button type="submit" class="btn btn-success">Criar</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>