<?php
    require_once './partials/header1.html';
?>
    <title>Pizza X | Pizza's</title>
<?php
    require_once './partials/header2.php';
?>
<div class="container-fluid paddingLess marTop">
    <div class="col-md-12 text-center">
        <h1><b>Pizza X</b></h1>
        <div class="col-md-6">
            <img src="../img/pizzaPepperoni.png" class="img-responsive center-block" alt="Pizza Pepperoni">
        </div>
        <div class="col-md-6 text-left">
            <form action="#">
                <div class="form-group">
                    <label for="inputSize">Size:</label>
                    <select class="form-control" name="inputSize" title="inputSize" id="inputSize">
                        <option value="personal">Personal</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                        <option value="extraLarge">Extra Large</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputSize">Crust:</label>
                    <select class="form-control" name="inputCrust" title="inputCrust" id="inputCrust">
                        <option value="original">Original</option>
                        <option value="pan">Pan</option>
                        <option value="skinny">Skinny</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox">Extra chesse
                    </label>
                </div>
                <button type="submit" class="btn btn-danger">Order</button>
            </form>
            <h2 class="black">Price: <span>0.00€</span></h2>
        </div>
        <div class="col-md-12">
            <h1>Ingredients</h1>
            <div class="col-md-3">Ingrediente 1</div>
            <div class="col-md-3">Ingrediente 2</div>
            <div class="col-md-3">Ingrediente 3</div>
            <div class="col-md-3">Ingrediente 4</div>
        </div>
    </div>
</div>
<?php
    require_once './partials/footer.html';
?>