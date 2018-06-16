<?php

	require_once '../../util/conexao.php';

	
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];
    }else{
        $acao = 'listar';
    }
	
	 if($acao == "listar"){
        $select = "SELECT id, descricao, precovendaindicado FROM itemcardapio order by descricao";
        $query  = $bd->query($select);
        
        $dados  = $query->fetchAll();
        require './consultar.php';
    }else if($acao == "excluir"){
        $id = $_GET['id'];
        $delete = "DELETE FROM ingredienteitemcardapio "
                . " WHERE iditem=$id";
        if($bd->query($delete)){
			$delete = "DELETE FROM itemcardapio  WHERE id=$id";
			if($bd->query($delete)){
				header('Location: crud_cardapio.php?acao=listar');
			}else{
				echo $delete;
			}
        }else{
            echo "Erro ao tentar remover o registro $id";
        }
    }
	 else if($acao == "novo"){
		 
		$select = "SELECT idingrediente, descricao , unidademedida , porcao from ingrediente";
		$query = $bd->query($select);
		$ingredientes = $query->fetchAll();

		
        $action = "crud_cardapio.php?acao=inserir";
        require './form_cardapio.php';
    }else if($acao == "inserir"){
		
		$selectId = "select nextval('seqIdItemCardapio') as id";
        $queryId = $bd->prepare($selectId);
		$queryId->execute();
		$id = $queryId->fetch();
			
		$insert = "INSERT INTO itemCardapio (id, descricao, percentuallucro, precovendaindicado ) "
            . " VALUES(".$id[0].", '".$_POST['nome']."', '".$_POST['lucro']."', '".$_POST['precovenda']."')";
		$query  = $bd->prepare($insert);
		$result = $query->execute();
		
		$precoUnitario = $_POST['precoUnitario'];
		$precoItem = $_POST['precoItem'];
		$quantidadeIngrediente = $_POST['quantidadeIngrediente'];
		$ingrediente = $_POST['ingrediente'];
		$count = count($quantidadeIngrediente);
		
		for($i = 0; $i < $count; $i++){
			$insert = "INSERT INTO ingredienteItemCardapio (idIngrediente, idItem, quantidade ) "
            . "VALUES (".$ingrediente[$i].", ".$id[0].", '".$quantidadeIngrediente[$i]."')";
			$query  = $bd->prepare($insert);
			$result = $query->execute();
		}
		
		
		 if($result){
			header('Location: crud_cardapio.php?acao=listar');
		}else{
			echo "Erro ao tentar inserir";
		}	

		
    }
	else if($acao == "chamarAlteracao"){
		
		$select = "Select * from itemcardapio where id = ".$_GET['id']; 
   
		$query = $bd->query($select);
    
		$itens = $query->fetch();
		$action = "crud_cardapio.php?acao=atualizar&id=".$_GET['id']; 
		
		$select = "select ii.idingrediente, i.descricao, ii.quantidade, i.preco, (i.preco*ii.quantidade) as precototal from ingredienteItemCardapio ii join ingrediente i on ii.idingrediente = i.idingrediente where ii.iditem = ".$_GET['id']; 
		$query = $bd->query($select);
		$itemIngriente = $query->fetchAll();
		
		$select = "SELECT idingrediente, descricao , unidademedida , porcao from ingrediente";
		$query = $bd->query($select);
		$ingredientes = $query->fetchAll();
		$action = "crud_cardapio.php?acao=atualizar&id=".$_GET['id']; 
    
    
		require './form_cardapio.php';
	}
	else if($acao == "atualizar"){
		
			$deleteIngredientes = 'delete from ingredienteitemcardapio where iditem = '.$_GET['id'];
			
			if($bd->query($deleteIngredientes)){
						
				$precoUnitario = $_POST['precoUnitario'];
				$precoItem = $_POST['precoItem'];
				$quantidadeIngrediente = $_POST['quantidadeIngrediente'];
				$ingrediente = $_POST['ingrediente'];
				$count = count($quantidadeIngrediente);
				
				for($i = 0; $i < $count; $i++){
					$insert = "INSERT INTO ingredienteItemCardapio (idIngrediente, idItem, quantidade ) "
					. "VALUES (".$ingrediente[$i].", ".$_GET['id'].", '".$quantidadeIngrediente[$i]."')";
					$query  = $bd->prepare($insert);
					$result = $query->execute();
				}
						
			}else{
				echo $delete;
			}
			
			 header('Location: crud_cardapio.php?acao=listar');
   

	}
	
?>