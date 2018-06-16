<?php

	require_once '../../util/conexao.php';

	function validaUk($descricao, $unidade, $porcao){
		
		$select = "select count(1) as valor from ingrediente where descricao = ".$descricao." and unidademedida = ".$unidade." and porcao = ".$porcao;
        $query  = $bd->query($select);
        
        $dados  = $query->fetchAll();
		
		return $dados['valor'];
		//return 'teste';
	}
	
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];
    }else{
        $acao = 'listar';
    }
	
	 if($acao == "listar"){
        $select = "SELECT * FROM ingrediente order by descricao, unidademedida, porcao";
        $query  = $bd->query($select);
        
        $dados  = $query->fetchAll();
        require './consultar.php';
    }else if($acao == "excluir"){
        $id = $_GET['id'];
        $delete = "DELETE FROM ingrediente "
                . " WHERE idingrediente=$id";
        if($bd->query($delete)){
            header('Location: crud_ingrediente.php?acao=listar');
        }else{
            echo "Erro ao tentar remover o registro $id";
        }
    }
	 else if($acao == "novo"){
        $action = "crud_ingrediente.php?acao=inserir";
        require './form_ingrediente.php';
    }else if($acao == "inserir"){
		
		
		$selectuk = "select * from ingrediente where descricao = '".$_POST['nome']."' and unidademedida = '".$_POST['unidade']."'	 and porcao = ".$_POST['porcao'];
        $queryuk = $bd->prepare($selectuk);
		$queryuk->execute();
		$registros = $queryuk->fetchAll();
		$count = count($registros);
		

		
		if($count == 0 ){
		
			$insert = "INSERT INTO ingrediente (idingrediente, descricao, unidademedida, porcao, preco) "
                . " VALUES(nextval('seqidingrediente'), :nome, :unidade, :porcao, :preco)";
			$query  = $bd->prepare($insert);
			$result = $query->execute($_POST);
		
			
		
			 if($result){
				header('Location: crud_ingrediente.php?acao=listar');
			}else{
				echo "Erro ao tentar inserir";
			}	
		} else{
			$action = "crud_ingrediente.php?acao=inserir";	
			$ErroMessage = "Já existe um registro para o ingrediente ".$_POST['nome']." com a Unidade de medida ".$_POST['unidade']." e porção ".$_POST['porcao'];
			
			require './form_ingrediente.php';
		}
		
    }
	else if($acao == "chamarAlteracao"){
		
		$select = "Select * from ingrediente where idingrediente = ".$_GET['id']; 
   
		$query = $bd->query($select);
    
		$Ingrediente = $query->fetch();
		$action = "crud_ingrediente.php?acao=atualizar&id=".$_GET['id']; 
    
    
		require './form_ingrediente.php';
	}
	else if($acao == "atualizar"){
		
		$selectuk = "select * from ingrediente where descricao = '".$_POST['nome']."' and unidademedida = '".$_POST['unidade']."'	 and porcao = ".$_POST['porcao'].' and idingrediente <> '.$_GET['id'];
        $queryuk = $bd->prepare($selectuk);
		$queryuk->execute();
		$registros = $queryuk->fetchAll();
		$count = count($registros);
		

		
		if($count == 0 ){
		
		
			$update = 'Update ingrediente set descricao = :descricao, unidademedida = :unidademedida, porcao = :porcao, preco = :preco where idingrediente = :idingrediente';

			$dados = array(
				'idingrediente' => $_GET['id'],
				'descricao' => $_POST['nome'],
				'unidademedida' => $_POST['unidade'],  
				'porcao' => $_POST['porcao'],
				'preco' => $_POST['preco']
			);
    
			$query = $bd->prepare($update);        
			$r = $query->execute($dados);
    
			if($r)        header('Location: crud_ingrediente.php?acao=listar');
			else echo 'Erro ao tentar alterar';
		} else{
			
			$action = "crud_ingrediente.php?acao=inserir";	
			$ErroMessage = "Já existe um registro para o ingrediente ".$_POST['nome']." com a Unidade de medida ".$_POST['unidade']." e porção ".$_POST['porcao'];
			$Ingrediente['descricao'] = $_POST['nome'];
			$Ingrediente['unidademedida'] = $_POST['unidade'];
			$Ingrediente['preco'] = $_POST['preco'];
			$Ingrediente['porcao'] = $_POST['porcao'];
			
			require './alterarIngrediente.php';
		}
	}
	
?>