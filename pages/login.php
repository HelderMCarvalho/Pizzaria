<?php
    require_once './partials/header1.html';
?>
    <title>Login | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Login</b></h1>
    </div>
    <form action="../php/loginBD.php" method="post">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="inputEmail">Email:</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="inputPassword">Password:</label>
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center paddingLess">
            <button type="submit" class="btn btn-danger">Login</button>
            <a href="registar.php" class="btn btn-info">Registar</a>
        </div>
    </form>
</div>
<?php
    require_once './partials/footer.html';
?>