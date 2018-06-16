<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!--<meta charset="utf-8">-->
    <title></title>
	<!-- CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- Script de funcoes -->
	<script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/funcoes.js"></script>
  </head>
  <script>
		$(document).ready(function(){
			
			$('input[name=lucro]').val(0);
			
			$(document).on('click', '#addIngrediente', function(){
				$('<br>').appendTo('#listaIngredientes');
				var sel = $('<select name="ingrediente[]">');
				sel.appendTo('#listaIngredientes');
				sel.append($("<option>").attr('value',0).text('Selecionar Ingrediente'));
				$.ajax({
					type:'post', 
					dataType: 'json', 
					url: 'getIngredientes.php',
					success: function(dados){
						
						for(var i=0;dados.length>i;i++){
							sel.append($("<option>").attr('value',dados[i].idingrediente).text(dados[i].descricao+" - "+dados[i].porcao+"("+dados[i].unidademedida+")"));
						}
					}
	
				});
				var qnt = $('<input name="quantidadeIngrediente[]" type="number" required>');
				qnt.appendTo('#listaIngredientes').attr('value',0);
				
				var precoTotal = $('<input type="text" name="precoItem[]" value="0"  readonly required/>');
				precoTotal.appendTo('#listaIngredientes');
				var precoUnitario = $('<input type="hidden" name="precoUnitario[]" value=""	>');
				precoUnitario.appendTo('#listaIngredientes');
				var btn = $('<div name="delete">');
				btn.attr('id', 'deleteIngrediente');	
				btn.attr('class', 'botoes');
				btn.appendTo('#listaIngredientes').text('Excluir');
			});
			
			
			//$('select[name=$('td[name=tcol1]')]').on('change', function (e) {
			//$('select').on('change', function (e) {
			$(document).on('change', 'select', function(e){
				var optionSelected = $("option:selected", this);
				var valueSelected = this.value;
				var precoUnitario = 0;
				var precoTotal = 0;
				var precoUnitarioCampo = $(this).next().next().next();
				var precoCampo = $(this).next().next();
				var precoVenda;
				var n = $('input[name^=precovenda]').val().length;
				
				
				if (n == 0){
					precoVenda = 0;
				}else {
					precoVenda = parseFloat($('input[name^=precovenda]').val());
				}
				
				$(this).next().val(1);
				
				var quantidade = $(this).next().val();
				$.ajax({
					type:'post', 
					dataType: 'json', 
					url: 'getValorUnitario.php',
					data: {
						filtro: valueSelected
					},
					success: function(dados){
						
					//	for(var i=1;i>dados.length;i++){
							precoUnitario = parseFloat(dados[0].preco);
							precoUnitarioCampo.val(precoUnitario);
							precoTotal = parseFloat(quantidade) * precoUnitario;
							precoCampo.val(precoTotal);
							precoVenda = parseFloat(precoVenda) + parseFloat(precoTotal);
							$('input[name^=precovenda]').val(precoVenda);
							
							precoVenda = 0;
				
							$.each($('input[name^=precoItem]'), function(index){
								
								precoVenda = parseFloat(precoVenda) + parseFloat($(this).val());
								
							});
							
							var lucro = 0;
							n = $('input[name=lucro]').val().length;
				
				
							if (n == 0){
								lucro = 0;
							}else {
								lucro = parseFloat($('input[name=lucro]').val());
							}
							
							var precoVendaFinal =  (precoVenda *   (lucro/ 100) ) + precoVenda;
							
							$('input[name^=precovenda]').val(precoVendaFinal);
							
					//	}
						
						
					}
	
				});
				
			
				
				
				
				
			});
			
			$(document).on('change', 'input[name^=quantidadeIngrediente]', function(e){
				
				var quantidade = $(this).val();
				var precoUnitario = $(this).next().next().val();
				var precoTotal = quantidade * precoUnitario;
				$(this).next().val(precoTotal);
				
				
				var precoVenda = 0;
				
				$.each($('input[name^=precoItem]'), function(index){
					
					precoVenda = parseFloat(precoVenda) + parseFloat($(this).val());
					
				});
				
				var precoVendaFinal =  (precoVenda *   (parseFloat($('input[name=lucro]').val())/ 100) ) + precoVenda;
				
				$('input[name^=precovenda]').val(precoVendaFinal);
				
				
				
			});
			
			$(document).on('change', 'input[name^=precoItem]', function(e){
				
			
				
				
				var precoVenda = 0;
				
				$.each($('input[name^=precoItem]'), function(index){
					
					precoVenda = parseFloat(precoVenda) + parseFloat($(this).val());
					
				});
				
				var precoVendaFinal =  (precoVenda *   (parseFloat($('input[name=lucro]').val())/ 100) ) + precoVenda;
				
				$('input[name^=precovenda]').val(precoVendaFinal);
				
				
				
			});
			
			$(document).on('change', 'input[name^=lucro]', function(e){
				
				
				var precoVenda = 0;
				
				$.each($('input[name^=precoItem]'), function(index){
					
					precoVenda = parseFloat(precoVenda) + parseFloat($(this).val());
					
				});
				
				var precoVendaFinal =  (precoVenda *   (parseFloat($('input[name=lucro]').val())/ 100) ) + precoVenda;
				
				$('input[name^=precovenda]').val(precoVendaFinal);
				
				
				
			});
			
			$(document).on('click', 'div[name^=delete]', function(e){
				var precoVenda = 0;
				
				$(this).prev().remove();$(this).prev().remove();$(this).prev().remove();$(this).prev().remove();$(this).remove();
				
				$.each($('input[name^=precoItem]'), function(index){
					
					precoVenda = parseFloat(precoVenda) + parseFloat($(this).val());
					
				});
				
				var precoVendaFinal =  (precoVenda *   (parseFloat($('input[name=lucro]').val())/ 100) ) + precoVenda;
				
				$('input[name^=precovenda]').val(precoVendaFinal);
			});
			
			
		});
		
	
	
  
  </script>
  <body>
	<div class="row">
		<header>
			<div class="header-col-12" id="linhaPreta"> </div>
			<a href="../../index.html"><div class="header-col-2" id="logo"> </div></a>
			<div class="header-col-10"/> </div>
			<div class="header-col-12" id="linhaPreta"> </div>
		</header>
	</div>
<!--	<div class="row">
		<nav id="menuSup">
			<ul>
				<a href="index.html"><li class="col-1">Home</li></a>
				<a href="ingrediente/consultarIngredientes.html"><li class="col-2">Ingredientes</li></a>
			</ul>
		</nav>
	</div>  -->
	
	<div class="row">
		
		<div class="col-3">
			<div class="row">
				<div class="col-12" >
				</div>
			</div>
		</div>
		
		<div class="col-9">
			
			
				 <h2>Cadastro do Cardápio</h2>
				 
					<form name="crudCardapio" action="<?php echo $action;?>" method="POST">
					<div class="row">
						<div>
							<label>Descrição</label>
							<input type="text" name="nome" value="<?php if (isset($itens)) echo $itens['descricao'] ?>" required/>
						</div>
						<div>
							<label>Percentual de Lucro desejado</label>
							<input type="text" name="lucro" value="<?php if (isset($itens)) echo $itens['percentuallucro'] ?>" required/>
						</div>
							<div>
							<label>Preço de venda</label>
							<input type="text" name="precovenda" readonly value="<?php if (isset($itens)) echo $itens['precovendaindicado'] ?>" required/>
						</div>
						
						
						
						<?php 
						
						if (isset($itens)){
						?>
							<div class="row" id="ingredientes">
								
								<h5> Ingredientes </h5>
								
								<div id="listaIngredientes">
								
									<?php
									
									$aux =  0;
									
									 foreach($itemIngriente as $linha) {
										 
										 $aux++;
										
										?>
												
										<select name = "ingrediente[]">
								
											<option>Selecionar Ingrediente</option>
												<?php foreach($ingredientes as $linhaIngredientes){ ?>
										
													<option value ="<?php echo $linhaIngredientes['idingrediente'];?>" <?php if($linhaIngredientes['idingrediente'] == $linha['idingrediente']) echo "selected"; ?>> <?php echo $linhaIngredientes['descricao'] . " - " . $linhaIngredientes['porcao']."(".$linhaIngredientes['unidademedida'].")";  ?> </option>
												
											<?php } ?>
										</select>
										<input type="number" placeholder="quantidade..." name="quantidadeIngrediente[]" value="<?php echo $linha['quantidade'] ?>" required />
										<input type="text" name="precoItem[]"  readonly value="<?php echo $linha['precototal']  ?>"  required/>
										<input type="hidden" name="precoUnitario[]" value="<?php echo $linha['preco'] ?>"	> <?php if($aux == 1) echo '<br>'; ?>
										<?php if($aux > 1) { ?>
											<div name="delete" id = "deleteIngrediente" class = "botoes"/>  Excluir </div><br>
										<?php } ?>

									<?php
									 }
									
									?>
								
								</div>
								
								<div id="addIngrediente" class="botoes" >Novo Ingrediente</div>
								
							</div>
							
							
						<?php	
						} else{
							
						?>

						<div class="row" id="ingredientes">
							<h5> Ingredientes </h5>
							<div id="listaIngredientes">
								<select name = "ingrediente[]">
								
									<option>Selecionar Ingrediente</option>
									<?php foreach($ingredientes as $linha){ ?>
										
										<option value ="<?php echo $linha['idingrediente'];?>"> <?php echo $linha['descricao'] . " - " . $linha['porcao']."(".$linha['unidademedida'].")";  ?> </option>
												
									<?php } ?>
								</select>
								<input type="number" placeholder="quantidade..." name="quantidadeIngrediente[]" value="0" required/>
								<input type="text" name="precoItem[]"  readonly value="0"  required/>
								<input type="hidden" name="precoUnitario[]" value=""	>
							</div>
							
							
							<div id="addIngrediente" class="botoes" >Novo Ingrediente</div>
						</div>
						
						<?php
						}
						?>
						
						<input type="submit" value="Enviar" />
					</form>

			</div>
		</div>
		
	</div>
	<footer>
       Direitos Reservados. Página desenvolvida por: Danrlei Ludwig
	</footer>
	
  </body>
</html>
