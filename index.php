<?php
    require_once('./php/bd.php');
    require_once './pages/partials/header1.html';
?>
    <title>Home | Pizza's</title>
<?php
    require_once './pages/partials/header2.php';
?>
<div class="container-fluid fill paddingLess">
    <div id="homeCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="active item">
                <div class="fill" style="background-image:url('./img/pizza1.jpg');">
                    <div class="carousel-caption">
                        <!--<p>Pizza 1</p>
                        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>-->
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('./img/pizza2.jpg');">
                    <div class="carousel-caption">
                        <!--<p>Pizza 2</p>
                        <a href="#" class="btn btn-success">Adicionar ao carrinho</a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="pull-center">
            <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    <!--<div>mais coisas</div>-->
</div>
<?php
    require_once './pages/partials/footer.html';
?>