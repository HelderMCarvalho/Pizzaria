//Ingredient Slider
$('.btn-toggle').click(function () {
    var quantidade = $(this).parent().children('div.form-group').children('input').val();
    $(this).parent().children('div.form-group').children('input').toggle().val(0).next('.buttonAddIngrediente').toggle().next('.buttonRemoveIngrediente').toggle();
    var preco = parseFloat($('#preco').text()) - (quantidade * parseFloat($(this).parent().children('div.form-group').children('input').attr('preco')));
    $('#preco').html(preco.toFixed(2));
});
$('.btn-toggle').parent().children('div.form-group').children('input').focus(function () {
    anterior = parseFloat(($(this).val())) * parseFloat($(this).attr('preco'));
}).keyup(function () {
    if($(this).val()){
        var preco = parseFloat($('#preco').text()) + (parseFloat(($(this).val())) * parseFloat($(this).attr('preco'))) - anterior;
        $('#preco').html(preco.toFixed(2));
        anterior = parseFloat(($(this).val())) * parseFloat($(this).attr('preco'));
    }
});
$('.buttonAddIngrediente').click(function () {
    if($(this).prevAll('input').val()<10){
        $(this).prevAll('input').val(eval(+$(this).prevAll('input').val()+1));
        var preco = parseFloat($('#preco').text()) + parseFloat($(this).prevAll('input').attr('preco'));
        $('#preco').html(preco.toFixed(2));
    }
});
$('.buttonRemoveIngrediente').click(function () {
    if($(this).prevAll('input').val()>0){
        $(this).prevAll('input').val(eval(+$(this).prevAll('input').val()-1));
        var preco = parseFloat($('#preco').text()) - parseFloat($(this).prevAll('input').attr('preco'));
        $('#preco').html(preco.toFixed(2));
    }
});

//Quantity of Pizzas
$('#buttonAddQuantidade').click(function () {
    if($('#inputQuantidade').val()<10){
        $('#inputQuantidade').val(eval(+$('#inputQuantidade').val()+1));
    }
});
$('#buttonRemoveQuantidade').click(function () {
    if($('#inputQuantidade').val()>1){
        $('#inputQuantidade').val(eval(+$('#inputQuantidade').val()-1));
    }
});

//Calcular Preço da Pizza
var anterior;
$('select.form-control').focus(function () {
    anterior = parseFloat($(this).find('option:selected').attr('preco'));
}).change(function () {
    var preco = parseFloat($('#preco').text()) + parseFloat($(this).find('option:selected').attr('preco')) - anterior;
    $('#preco').html(preco.toFixed(2));
    anterior = parseFloat($(this).find('option:selected').attr('preco'));
});