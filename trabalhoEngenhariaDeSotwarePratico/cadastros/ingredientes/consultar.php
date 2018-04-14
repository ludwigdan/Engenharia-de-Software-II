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
	function alterar(id){
		location.href="crud_ingrediente.php?acao=chamarAlteracao&id="+id;
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
				<H2> Ingredientes Cadastrados</H2>
				
				
				<table>
					<thead>
						<th>Código</th>
						<th>Descrição</	th>
						<th>Unidade de Medida</th>
						<th>Porção</th>
						<th>Preço</th>
						<th/>
						<th/>
					</thead>
					<tbody>
						<?php foreach($dados as $linha){ ?>
						<tr>
							<td><?= $linha['idingrediente']; ?></td>
							<td><?= $linha['descricao']; ?></td>
							<td><?= $linha['unidademedida']; ?></td>
							<td><?= $linha['porcao']; ?></td>
							<td><?= $linha['preco']; ?></td>
							<td><input type = "button" value="Excluir" onclick="confirmExclusao(<?php echo $linha['idingrediente']; ?>)"/></td>
							<td><input type = "button" value="Alterar" onclick="alterar(<?php echo $linha['idingrediente']; ?>)"/></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<br>
				<a id="novo" href="crud_ingrediente.php?acao=novo">Cadastrar novo ingrediente</a>
				
				
			</div>
		</div>
		
	</div>
	<footer>
       Direitos Reservados. Página desenvolvida por: Danrlei Ludwig
	</footer>
	
  </body>
</html>
