<?php
    require_once('../php/bd.php');
    require_once './partials/header1.html';
?>
    <title>Criar pizza | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Cria a tua própria Pizza</b></h1>
    </div>
    <div class="col-md-12 text-left">
        <form action="#">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="inputSize">Tamanho:</label>
                    <select class="form-control" name="inputSize" title="Size" id="inputSize">
                        <option value="personal" price="1" selected>Personal</option>
                        <option value="small" price="2">Small</option>
                        <option value="medium" price="3">Medium</option>
                        <option value="large" price="4">Large</option>
                        <option value="extraLarge" price="5">Extra Large</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCrust">Crust:</label>
                    <select class="form-control" name="inputCrust" title="Crust" id="inputCrust">
                        <option value="original" price="1" selected>Original</option>
                        <option value="pan" price="2">Pan</option>
                        <option value="skinny" price="3">Skinny</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="inputSauce">Sauce:</label>
                    <select class="form-control" name="inputSauce" title="Sauce" id="inputSauce">
                        <option value="TomatoOregos" price="1">Tomato and Oregos</option>
                        <option value="barbecue" price="2">Barbecue</option>
                        <option value="carbonara" price="3">Carbonara</option>
                        <option value="mexicanSpicy" price="4">Mexican Spicy</option>
                        <option value="kebab" price="5">Kebab</option>
                        <option value="noSauce" price="0" selected>No Sauce</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputChesse">Cheese:</label>
                    <select class="form-control" name="inputChesse" title="Chesse" id="inputChesse">
                        <option value="extra" price="1">Extra</option>
                        <option value="none" price="0" selected>None</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 ingredientPicker">
                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <img src="../img/smokedSausage.png" alt="Smoked Sausage">
                        <label for="inputSmokedSausage">Smoked Sausage</label>
                        <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                        <div class="form-group">
                            <input type="number" class="form-control" value="0" name="inputSmokedSausage" id="inputSmokedSausage" min="0" max="10" style="display: none" price="0.1">
                            <button type="button" class="btn btn-default buttonAddIngredient" style="display: none"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                            <button type="button" class="btn btn-default buttonRemoveIngredient" style="display: none"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <img src="../img/potatoDipper.png" alt="Potato dipper">
                        <label for="inputPotatoDipper">Potato dipper</label>
                        <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                        <div class="form-group">
                            <input type="number" class="form-control" value="0" name="inputPotatoDipper" id="inputPotatoDipper" min="0" max="10" style="display: none" price="0.2">
                            <button type="button" class="btn btn-default buttonAddIngredient" style="display: none"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                            <button type="button" class="btn btn-default buttonRemoveIngredient" style="display: none"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 ingredientPicker">
                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <img src="../img/bacon.png" alt="Bacon">
                        <label for="inputBacon">Bacon</label>
                        <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                        <div class="form-group">
                            <input type="number" class="form-control" value="0" name="inputBacon" id="inputBacon" min="0" max="10" style="display: none" price="0.3">
                            <button type="button" class="btn btn-default buttonAddIngredient" style="display: none"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                            <button type="button" class="btn btn-default buttonRemoveIngredient" style="display: none"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <img src="../img/ham.png" alt="Ham">
                        <label for="inputHam">Ham:</label>
                        <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                        <div class="form-group">
                            <input type="number" class="form-control" value="0" name="inputHam" id="inputHam" min="0" max="10" style="display: none" price="0.4">
                            <button type="button" class="btn btn-default buttonAddIngredient" style="display: none"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                            <button type="button" class="btn btn-default buttonRemoveIngredient" style="display: none"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 ingredientPicker">
                <div class="col-md-6 text-center form-inline">
                    <div class="form-group">
                        <label for="inputQuantity">Quantity of Pizzas:</label>
                        <input type="number" class="form-control" value="1" name="inputQuantity" id="inputQuantity" min="1" max="10">
                        <button type="button" class="btn btn-default" id="buttonAddQuantity"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-default" id="buttonRemoveQuantity"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <label for="price">Price:</label> <span id="price">2.00</span>€
                    <button type="submit" class="btn btn-danger">Order</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>