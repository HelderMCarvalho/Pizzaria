<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Lista de Tamanhos | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT * FROM tamanhoPizza;';
    $result = $PDO->query($sql);
    $listaTamanhos = $result->fetchAll();
?>
<div class="container marTop">
    <div class="col-md-12 text-center">
        <h1 class="text-center"><b>Lista de Tamanhos</b></h1>
        <?php if(empty($listaTamanhos)){
            echo '<br><br><br><br><b>Não existem Tamanhos criados!</b>';
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
                        foreach($listaTamanhos as $tamanho){ ?>
                            <tr>
                                <td><?=$tamanho['ID']?></td>
                                <td><?=$tamanho['nome']?></td>
                                <td><?=$tamanho['preco']?></td>
                                <td><a href="../pages/editarTamanho.php?id=<?=$tamanho['ID']?>" class="btn btn-info">Editar</a> <a href="../php/removerTamanhoBD.php?id=<?=$tamanho['ID']?>" class="btn btn-danger">Apagar</a></td>
                            </tr>
                    <?php } ?>
                    <form action="../php/criarTamanhoBD.php" method="post">
                        <tr>
                            <td>ID</td>
                            <td><input type="text" class="form-control" id="inputNome" name="inputNome" required></td>
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