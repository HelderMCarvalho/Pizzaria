    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
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
                    <li <?php if($_SERVER['REQUEST_URI']=='/index.php'){echo 'class="active"';} ?>><a href="/index.php">Home<span class="sr-only">(current)</span></a></li>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/menus.php'){echo 'class="active"';} ?>><a href="/pages/menus.php">Menus</a></li>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/criarPizza.php'){echo 'class="active"';} ?>><a href="/pages/criarPizza.php">Criar pizza</a></li>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/sobre.php'){echo 'class="active"';} ?>><a href="/pages/sobre.php">Sobre</a></li>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/login.php'){echo 'class="active"';} ?>><a href="/pages/login.php">Login</a></li>
                    <li <?php if($_SERVER['REQUEST_URI']=='/pages/registar.php'){echo 'class="active"';} ?>><a href="/pages/registar.php">Registar</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" id="cart">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span>  Carrinho  <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li>
                                <span class="item">
                                   <span class="item-left">
                                      <img src="http://lorempixel.com/50/50/" alt="" />
                                      <span class="item-info">
                                          <span>Item name</span>
                                          <span>233333333$</span>
                                      </span>
                                   </span>
                                   <span class="item-right">
                                      <button class="btn btn-xs btn-danger pull-right removeFromCart"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                   </span>
                                </span>
                            </li>
                            <li>
                                <span class="item">
                                    <span class="item-left">
                                        <img src="http://lorempixel.com/50/50/" alt="" />
                                        <span class="item-info">
                                            <span>Item name</span>
                                            <span>23$</span>
                                        </span>
                                    </span>
                                    <span class="item-right">
                                        <button class="btn btn-xs btn-danger pull-right removeFromCart"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="item">
                                    <span class="item-left">
                                        <img src="http://lorempixel.com/50/50/" alt="" />
                                        <span class="item-info">
                                            <span>Item name</span>
                                            <span>23$</span>
                                        </span>
                                    </span>
                                    <span class="item-right">
                                        <button class="btn btn-xs btn-danger pull-right removeFromCart"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="item">
                                    <span class="item-left">
                                        <img src="http://lorempixel.com/50/50/" alt="" />
                                        <span class="item-info">
                                            <span>Item name</span>
                                            <span>23$</span>
                                        </span>
                                    </span>
                                    <span class="item-right">
                                        <button class="btn btn-xs btn-danger pull-right removeFromCart"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </span>
                                </span>
                            </li>
                            <li class="divider"></li>
                            <li><a class="text-center" href="">View Cart</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>