<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Lista de Pizza's predefinidas | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT ID, nome, imagem FROM pizza WHERE pizzaPredefinida=1;';
    $result = $PDO->query($sql);
    $listaPizzas = $result->fetchAll();
?>
<div class="container marTop">
    <div class="col-md-12 text-center">
        <h1 class="text-center"><b>Lista de Pizza's predefinidas</b></h1>
        <?php if(empty($listaPizzas)){
            echo '<br><br><br><br><b>Não existem Pizzas Predefinidas criadas!</b>';
        }else{ ?>
            <table class="table table-bordered table-hover tabelaMinhasPizzas" style="background-color: white;">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Imagem</th>
                    <th class="text-center">Opções</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($listaPizzas as $pizza){ ?>
                            <tr>
                                <td><?=$pizza['ID']?></td>
                                <td><?=$pizza['nome']?></td>
                                <td><img src="<?=$pizza['imagem']?>" style="height: 100px; width: auto" alt="<?=$pizza['nome']?>"></td>
                                <td><a href="../pages/editarPizzaPredefinida.php?id=<?=$pizza['ID']?>" class="btn btn-info">Editar</a> <a href="../php/removerPizzaPredefinidaBD.php?id=<?=$pizza['ID']?>" class="btn btn-danger">Apagar</a></td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="../pages/criarPizzaPredefinida.php" class="btn btn-success">Criar Pizza predefinida</a>
        <?php } ?>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>