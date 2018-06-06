<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Minhas Pizza'a | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT ID, nome, imagem FROM pizza WHERE pessoaID='.$_SESSION['pessoaLogada']['ID'].';';
    $result = $PDO->query($sql);
    $listaPizzas = $result->fetchAll();
?>
<div class="container marTop">
    <div class="col-md-12 text-center">
        <h1 class="text-center"><b>Minhas pizza's</b></h1>
        <?php if(empty($listaPizzas)){
            echo '<br><br><br><br><b>Ainda não criou nenhuma pizza!</b>';
        }else{ ?>
            <table class="table table-bordered table-hover tabelaMinhasPizzas" style="background-color: white;">
                <thead>
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Ingredientes</th>
                    <th class="text-center">Opções</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($listaPizzas as $pizza){
                            $sql='SELECT ingredientePizza.nome, ingredientePizza.imagem, ingredientePizzaPorPizza.quantidade FROM ingredientePizza INNER JOIN ingredientePizzaPorPizza ON ingredientePizza.ID=ingredientePizzaPorPizza.ingredientePizzaID WHERE ingredientePizzaPorPizza.pizzaID='.$pizza['ID'].';';
                            $result = $PDO->query($sql);
                            $ingredientesPizza = $result->fetchAll();
                    ?>
                    <tr>
                        <td><?=$pizza['nome']?></td>
                        <td>
                            <?php
                                foreach($ingredientesPizza as $ingredientePizza){ ?>
                                    <img src="<?=$ingredientePizza['imagem']?>" alt="<?=$ingredientePizza['nome']?>"><b>x<?=$ingredientePizza['quantidade'].'</b>'?>
                            <?php } ?>
                        </td>
                        <td><a href="./pizza.php?id=<?=$pizza['ID']?>" class="btn btn-danger">+ Info</a></td>
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