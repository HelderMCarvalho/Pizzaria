<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Menus | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container-fluid paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Pizza's</b></h1>
        <a href="./pizza.php" class="noDecoration">
            <div class="col-md-4">
                <img src="../img/pizzaPepperoni.png" class="img-responsive" alt="Pizza Pepperoni">
                <h2><b>Pizza Pepperoni</b></h2>
            </div>
        </a>
        <a href="./pizza.php" class="noDecoration">
            <div class="col-md-4">
                <img src="../img/pizzaMeatEater.png" class="img-responsive" alt="Pizza Meat Eater">
                <h2><b>Pizza Meat Eater</b></h2>
            </div>
        </a>
        <a href="./pizza.php" class="noDecoration">
            <div class="col-md-4">
                <img src="../img/pizzaSupreme.png" class="img-responsive" alt="Pizza Supreme">
                <h2><b>Pizza Supreme</b></h2>
            </div>
        </a>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>