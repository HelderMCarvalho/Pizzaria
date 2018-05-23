<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Menus | Pizza's</title>
<?php
    require_once './partials/header2.php';
    $sql='SELECT ID, nome, imagem FROM pizza WHERE pizzaPredefinida=1;';
    $result = $PDO->query($sql);
    $listaPizzas = $result->fetchAll();
?>
<div class="container-fluid paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Pizza's</b></h1>
        <?php foreach ($listaPizzas as $pizza){ ?>
            <a href="./pizza.php?id=<?=$pizza['ID']?>" class="noDecoration">
                <div class="col-md-4">
                    <img src="<?=$pizza['imagem']?>" class="img-responsive" alt="<?=$pizza['nome']?>">
                    <h2><b><?=$pizza['nome']?></b></h2>
                </div>
            </a>
        <?php } ?>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>