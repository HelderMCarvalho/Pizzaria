<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Lista de Molhos | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT * FROM molhoPizza;';
    $result = $PDO->query($sql);
    $listaMolhos = $result->fetchAll();
?>
<div class="container marTop">
    <div class="col-md-12 text-center">
        <h1 class="text-center"><b>Lista de Molhos</b></h1>
        <?php if(empty($listaMolhos)){
            echo '<br><br><br><br><b>Não existem Molhos criados!</b>';
        }else{ ?>
            <table class="table table-bordered table-hover tabelaMinhasPizzas" style="background-color: white;">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Opções</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($listaMolhos as $molho){ ?>
                            <tr>
                                <td><?=$molho['ID']?></td>
                                <td><?=$molho['nome']?></td>
                                <td><?=$molho['preco']?></td>
                                <td><a href="../pages/editarMolho.php?id=<?=$molho['ID']?>" class="btn btn-info">Editar</a> <a href="../php/removerMolhoBD.php?id=<?=$molho['ID']?>" class="btn btn-danger">Apagar</a></td>
                            </tr>
                    <?php } ?>
                    <form action="../php/criarMolhoBD.php" method="post">
                        <tr>
                            <td>ID</td>
                            <td><input type="text" class="form-control" id="inputNome" name="inputNome"></td>
                            <td><input type="number" class="form-control" id="inputPreco" name="inputPreco" step="0.01"></td>
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