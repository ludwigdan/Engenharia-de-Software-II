$(document).ready(function(){
	$('#formLoginJs').submit(function(){
		var login = $('#login').val();
		var senha = $('#senha').val();
		
		if(senha != 'admin' || login != 'admin'){
			$('#mensagemErroLogin').text('Usuário ou senha incorretos')
			return false;
		}else{
			return true;
		}
		
	})
});

$(document).ready(function(){
	$('#pesquisaButton').click(function(){
		var campoPesquisa = $('#pesquisa').val().toUpperCase();
		var campoPesquisaMostrar = $('#pesquisa').val();
		var contador = 0;
		var campoMostrar = "";
		$('p').each(function(index){
			var campoResultado = $( this ).text().toUpperCase();
			if (campoPesquisa == campoResultado){
				contador = contador + 1;
				campoMostrar = $( this ).text();
			}
		});
		if (contador == 0){
			$('#resultadoPesquisa').text('Cidade '+campoPesquisaMostrar+' não opera com uber.')
		}else{
			$('#resultadoPesquisa').text('Cidade '+campoMostrar+' opera com uber, solicite sua viajem pelo aplicativo!');
		}
	});
});