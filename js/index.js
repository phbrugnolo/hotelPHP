var preco = $('#preco').maskMoney()

$(document).ready(function(){
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#telefone').mask('(00) 0000-0000');
});