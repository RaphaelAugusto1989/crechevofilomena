$(document).ready(function(){
	$(".cpf").mask("999.999.999-99");
	$(".fixo").mask("(99) 9999-9999");
	$(".cel").mask("(99) 99999-9999");
	$(".moeda").mask("#.##0,00", {reverse: true});
	$(".hora").mask("99:99");
	$(".data").mask("99/99/9999");
	$(".cep").mask("99.999-999");
})