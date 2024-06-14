var preco = $('#preco').maskMoney()

$(document).ready(function(){
    $('.date').mask('00/00/0000');
    $('#cpf').mask('000.000.000-00', {reverse: true});
});