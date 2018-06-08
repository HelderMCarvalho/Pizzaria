    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<?php session_start(); ?>
<body class="woodBackground">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.php">Pizza's</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if(($_SERVER['REQUEST_URI']=='/index.php') || ($_SERVER['REQUEST_URI']=='/')){echo 'class="active"';} ?>><a href="/index.php">Home<span class="sr-only">(current)</span></a></li>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/menus.php'){echo 'class="active"';} ?>><a href="/pages/menus.php">Menus</a></li>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/criarPizza.php'){echo 'class="active"';} ?>><a href="/pages/criarPizza.php">Criar pizza</a></li>
                    <?php if(isset($_SESSION['pessoaLogada'])){ ?>
                        <li <?php if($_SERVER['REQUEST_URI']=='/pages/minhasPizzas.php'){echo 'class="active"';} ?>><a href="/pages/minhasPizzas.php">Minhas pizza's</a></li>
                    <?php } ?>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/sobre.php'){echo 'class="active"';} ?>><a href="/pages/sobre.php">Sobre</a></li>
                    <?php if(!isset($_SESSION['pessoaLogada'])){ ?>
                        <li <?php if($_SERVER['REQUEST_URI']=='/pages/login.php'){echo 'class="active"';} ?>><a href="/pages/login.php">Login</a></li>
                        <li <?php if($_SERVER['REQUEST_URI']=='/pages/registar.php'){echo 'class="active"';} ?>><a href="/pages/registar.php">Registar</a></li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['pessoaLogada'])){ ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>  Conta  <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Bem-vindo <?=$_SESSION['pessoaLogada']['nome'].' '.$_SESSION['pessoaLogada']['apelido']?></a></li>
                                <li <?php if($_SERVER['REQUEST_URI']=='/pages/perfil.php'){echo 'class="active"';} ?>><a href="/pages/perfil.php">Perfil</a></li>
                                <li><a href="/php/logout.php">Logout</a></li>
                                <?php if($_SESSION['pessoaLogada']['tipoPessoa']==1){ ?>
                                    <li class="divider"></li>
                                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/listaEncomendas.php'){echo 'class="active"';} ?>><a href="/pages/listaEncomendas.php">Lista de Encomendas</a></li>
                                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/listaTamanhos.php'){echo 'class="active"';} ?>><a href="/pages/listaTamanhos.php">Lista de Tamanhos</a></li>
                                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/listaCrostas.php'){echo 'class="active"';} ?>><a href="/pages/listaCrostas.php">Lista de Crostas</a></li>
                                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/listaMolhos.php'){echo 'class="active"';} ?>><a href="/pages/listaMolhos.php">Lista de Molhos</a></li>
                                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/listaIngredientes.php'){echo 'class="active"';} ?>><a href="/pages/listaIngredientes.php">Lista de Ingredientes</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }?>
                    <li class="dropdown" id="cart">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span>  Carrinho  <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <?php if(!isset($_SESSION['pessoaLogada'])){ ?>
                            <li>
                                <span class="item">
                                   Não tem sessão iniciada!
                                </span>
                            </li>
                            <?php }else{
                                $sql = 'SELECT ID FROM carrinho WHERE pessoaID="'.$_SESSION['pessoaLogada']['ID'].'";';
                                $result = $PDO->query($sql);
                                $carrinho = $result->fetch();

                                $sql = 'SELECT itemCarrinho.ID, pizza.nome, pizza.imagem, itemCarrinho.quantidade, itemCarrinho.preco, ROUND(itemCarrinho.quantidade*itemCarrinho.preco, 2) TotalPorPizza FROM itemCarrinho INNER JOIN pizza ON pizza.ID=itemCarrinho.pizzaID WHERE itemCarrinho.carrinhoID="'.$carrinho['ID'].'";';
                                $result = $PDO->query($sql);
                                $itemsCarrinho = $result->fetchAll();
                            }
                            if(empty($itemsCarrinho) && isset($_SESSION['pessoaLogada'])){ ?>
                                <li>
                                    <span class="item">
                                       Carrinho vazio!
                                    </span>
                                </li>
                            <?php }else{
                                $totalCarrinho=0;
                                foreach ($itemsCarrinho as $itemCarrinho){
                                    $totalCarrinho+=$itemCarrinho['TotalPorPizza'];
                            ?>
                                <li>
                                    <span class="item">
                                        <span class="item-left">
                                            <img src="<?=$itemCarrinho['imagem']?>" width="84" height="auto" alt="<?=$itemCarrinho['nome']?>"/>
                                            <span class="item-info">
                                                <span><?=$itemCarrinho['nome']?></span>
                                                <span><?=sprintf('%0.2f', $itemCarrinho['preco'])?>€<b> x <?=$itemCarrinho['quantidade']?></b></span>
                                            </span>
                                        </span>
                                        <span class="item-right">
                                            <a href="/php/removerItemCarrinhoBD.php?id=<?=$itemCarrinho['ID']?>">
                                                <button class="btn btn-xs btn-danger pull-right"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            </a>
                                        </span>
                                    </span>
                                </li>
                            <?php
                                }
                            }
                            if(!empty($itemsCarrinho) && isset($_SESSION['pessoaLogada'])){?>
                                <li>
                                    <span class="item">
                                        <span class="item-left">
                                            <span class="item-info">
                                                <span><b>Total: <?=$totalCarrinho?>€</b></span>
                                            </span>
                                        </span>
                                    </span>
                                </li>
                                <li class="divider"></li>
                                <li><a class="text-center" href="/pages/carrinho.php">Ver carrinho</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>