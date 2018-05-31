<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Sobre nós | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Sobre nós</b></h1>
    </div>
    <div class="col-md-6 paddingLess">
        <form action="#">
            <div class="col-md-12 paddingLess">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputEmail">Email:</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                    </div>
                </div>
                <div class="col-md-6 paddingLess">
                    <div class="form-group">
                        <label for="inputNome">Nome:</label>
                        <input type="text" class="form-control" id="inputNome" name="inputNome">
                    </div>
                </div>
            </div>
            <div class="col-md-12 paddingLess">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputNumeroTelemovel">Número de telemóvel:</label>
                        <input type="number" class="form-control" id="inputNumeroTelemovel" name="inputNumeroTelemovel">
                    </div>
                </div>
            </div>
            <div class="col-md-12 paddingLess">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputMensagem">Mensagem:</label>
                        <textarea name="inputMensagem" id="inputMensagem" class="form-control" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <iframe class="mapa" width="100%" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJBSrEIMtTJA0RiC7Dx0AHhA8&key=AIzaSyC63vvrWj3GX4U1kN635vajeHSARrUIvjs" allowfullscreen></iframe>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>