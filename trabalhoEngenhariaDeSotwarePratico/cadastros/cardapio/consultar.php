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
		
		if (confirm("Tem certeza que deseja excluir esse item?")){
			location.href="crud_cardapio.php?acao=excluir&id="+id;
		}
		
	}
	function alterar(id){
		location.href="crud_cardapio.php?acao=chamarAlteracao&id="+id;
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
				<H2> Cardápio</H2>
				
				
				<table>
					<thead>
						<th>Código</th>
						<th>Descrição</	th>
						<th>Preço</th>
						<th/>
						<th/>
					</thead>
					<tbody>
						<?php foreach($dados as $linha){ ?>
						<tr>
							<td><?= $linha['id']; ?></td>
							<td><?= $linha['descricao']; ?></td>
							<td><?= $linha['precovendaindicado']; ?></td>
							<td><input type = "button" value="Excluir" onclick="confirmExclusao(<?php echo $linha['id']; ?>)"/></td>
							<td><input type = "button" value="Alterar" onclick="alterar(<?php echo $linha['id']; ?>)"/></td>
						</tr>
						<tr>
							<td colspan="1"> </td>
							<td colspan="4">
								
								Ingredientes:
								
								<?php
									
									$countLoop = 0;
									$separador = '';
									$select = "select descricao||' - '|| (quantidade * porcao) || case  when unidademedida = 'Unidade' then '' else '('||unidademedida||')' end as descricao from ingredienteItemCardapio iic join ingrediente i on i.idIngrediente = iic.idIngrediente where iic.idItem = ".$linha['id'];
									$query  = $bd->query($select);
									$ingredientes  = $query->fetchAll();
									foreach($ingredientes as $ingrediente){
										
										if($countLoop > 0)
											$separador = ', ';
										
										echo $separador.$ingrediente['descricao'];
										
										$countLoop++;
									}
								
								?>
							
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<br>
				<a id="novo" href="crud_cardapio.php?acao=novo">Cadastrar novo item</a>
				
				
			</div>
		</div>
		
	</div>
	<footer>
       Direitos Reservados. Página desenvolvida por: Danrlei Ludwig
	</footer>
	
  </body>
</html>
