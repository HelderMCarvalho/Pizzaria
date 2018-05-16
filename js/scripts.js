//Ingredient Slider
$('.btn-toggle').click(function () {
    var quantity = $(this).parent().children('div.form-group').children('input').val();
    $(this).parent().children('div.form-group').children('input').toggle().val(0).next('.buttonAddIngredient').toggle().next('.buttonRemoveIngredient').toggle();
    var price = parseFloat($('#price').text()) - (quantity * parseFloat($(this).parent().children('div.form-group').children('input').attr('price')));
    $('#price').html(price.toFixed(2));
});
$('.btn-toggle').parent().children('div.form-group').children('input').focus(function () {
    anterior = parseFloat(($(this).val())) * parseFloat($(this).attr('price'));
}).keyup(function () {
    if($(this).val()){
        var price = parseFloat($('#price').text()) + (parseFloat(($(this).val())) * parseFloat($(this).attr('price'))) - anterior;
        $('#price').html(price.toFixed(2));
        anterior = parseFloat(($(this).val())) * parseFloat($(this).attr('price'));
    }
});
$('.buttonAddIngredient').click(function () {
    if($(this).prevAll('input').val()<10){
        $(this).prevAll('input').val(eval(+$(this).prevAll('input').val()+1));
        var price = parseFloat($('#price').text()) + parseFloat($(this).prevAll('input').attr('price'));
        $('#price').html(price.toFixed(2));
    }
});
$('.buttonRemoveIngredient').click(function () {
    if($(this).prevAll('input').val()>0){
        $(this).prevAll('input').val(eval(+$(this).prevAll('input').val()-1));
        var price = parseFloat($('#price').text()) - parseFloat($(this).prevAll('input').attr('price'));
        $('#price').html(price.toFixed(2));
    }
});

//Quantity of Pizzas
$('#buttonAddQuantity').click(function () {
    if($('#inputQuantity').val()<10){
        $('#inputQuantity').val(eval(+$('#inputQuantity').val()+1));
    }
});
$('#buttonRemoveQuantity').click(function () {
    if($('#inputQuantity').val()>1){
        $('#inputQuantity').val(eval(+$('#inputQuantity').val()-1));
    }
});

//Remover Pizza do Carrinho
$('.removeFromCart').click(function(event) {
    $(this).closest('li').remove();
    event.stopPropagation();
});

//Calcular Preço da Pizza
var anterior;
$('select.form-control').focus(function () {
    anterior = parseFloat($(this).find('option:selected').attr('price'));
}).change(function () {
    var price = parseFloat($('#price').text()) + parseFloat($(this).find('option:selected').attr('price')) - anterior;
    $('#price').html(price.toFixed(2));
    anterior = parseFloat($(this).find('option:selected').attr('price'));
});

//Adicionar ao carrinho (O carrinho será guardado na BD logo, o conteudo do Carrinho está na BD)