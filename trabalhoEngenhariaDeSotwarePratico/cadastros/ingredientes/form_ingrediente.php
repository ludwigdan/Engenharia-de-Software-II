<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!--<meta charset="utf-8">-->
    <title></title>
	<!-- CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- Script de funcoes -->
	<script src="js/jquery.js"></script>
    <script src="js/funcoes.js"></script>
  </head>
  <script>
  
	function confirmExclusao(id){
		
		if (confirm("Tem certeza que deseja excluir esse ingrediente?")){
			location.href="crud_ingrediente.php?acao=excluir&id="+id;
		}
		
	}
	
	function validaPreco(){
		if (isNaN(document.getElementById("preco").value)){
			alert('"'+document.getElementById("preco").value+'" não é um valor válido para o campo preço, utilize o formato "99.99"');
			document.getElementById("preco").value = '';
		}
			
	}
	
	
  
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
			<div class="row">
			
			
				 <h2>Cadastro de Ingredientes</h2>
				 
				 <?php
				 
					if(isset($ErroMessage))
							echo $ErroMessage;
				 
				 ?>
				 
				<form name="crudIngrediente" action="<?php echo $action;?>" method="POST">
					<div>
						<label>Descrição</label>
						<input type="text" name="nome" value="<?php if (isset($ErroMessage)) echo $_POST['nome'] ?>" required/>
					</div>
					<div>
						<label>Unidade de Medida</label>
						<select name="unidade">
								<option value="Unidade" <?php if(isset($ErroMessage)){if($_POST['unidade'] == 'Unidade') echo "selected"; } ?> >Unidade</option>
								<option value="ML" <?php if(isset($ErroMessage)){if($_POST['unidade'] == 'ML') echo "selected"; } ?>>ML</option>
								<option value="MG" <?php if(isset($ErroMessage)){if($_POST['unidade'] == 'MG') echo "selected"; } ?>>MG</option>
							</select>
					</div>
						<div>
						<label>Porção</label>
						<input type="number" name="porcao" value="<?php if (isset($ErroMessage)) echo $_POST['porcao'] ?>" required/>
					</div>
						<div>
						<label>Preço</label>
						<input type="text" name="preco" id="preco" onChange="validaPreco();" value="<?php if (isset($ErroMessage)) echo $_POST['preco'] ?>" required/>
					</div>
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
