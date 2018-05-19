<?php
    require_once './partials/header1.html';
?>
    <title>Registar | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Registar</b></h1>
    </div>
    <form action="../php/registarBD.php" method="post">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputNome">Name:</label>
                    <input type="text" class="form-control" id="inputNome" name="inputNome" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputApelido">Apelido:</label>
                    <input type="text" class="form-control" id="inputApelido" name="inputApelido" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputEmail">Email:</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputDataNascimento">Data nascimento:</label>
                    <input type="date" class="form-control" id="inputDataNascimento" name="inputDataNascimento" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputMorada">Morada:</label>
                    <input type="text" class="form-control" id="inputMorada" name="inputMorada" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputCodigoPostal">Código Postal:</label>
                    <input type="text" class="form-control" id="inputCodigoPostal" name="inputCodigoPostal" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputFreguesia">Freguesia:</label>
                    <input type="text" class="form-control" id="inputFreguesia" name="inputFreguesia" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputDistrito">Distrito:</label>
                    <input type="text" class="form-control" id="inputDistrito" name="inputDistrito" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="inputPassword">Password:</label>
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center paddingLess">
            <button type="submit" class="btn btn-danger">Registar</button>
            <a href="login.php" class="btn btn-info">Login</a>
        </div>
    </form>
</div>
<?php
    require_once './partials/footer.html';
?>