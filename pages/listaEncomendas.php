<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Lista de Encomendas | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT encomenda.ID, CONCAT(pessoa.nome, " ", pessoa.apelido) nomeCompletoCliente, encomenda.tipoEntrega FROM encomenda INNER JOIN pessoa ON encomenda.pessoaID=pessoa.ID WHERE entregue=0;';
    $result = $PDO->query($sql);
    $listaEncomendas = $result->fetchAll();
?>
<div class="container marTop">
    <div class="col-md-12 text-center">
        <h1 class="text-center"><b>Lista de Encomendas</b></h1>
        <?php if(empty($listaEncomendas)){
            echo '<br><br><br><br><b>Não existem encomendas criadas!</b>';
        }else{ ?>
            <table class="table table-bordered table-hover tabelaMinhasPizzas" style="background-color: white;">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome do Cliente</th>
                    <th class="text-center">Tipo de Entrega</th>
                    <th class="text-center">Opções</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($listaEncomendas as $encomenda){ ?>
                    <tr>
                        <td><?=$encomenda['ID']?></td>
                        <td><?=$encomenda['nomeCompletoCliente']?></td>
                        <td><?php if($encomenda['tipoEntrega']==0){
                                echo 'Levantamento em Loja';
                            }else{
                                echo 'Entrega em Casa';
                            } ?>
                        </td>
                        <td><a href="./encomenda.php?id=<?=$encomenda['ID']?>" class="btn btn-danger">+ Info</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>