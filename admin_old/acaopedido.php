		<?php 
		require 'conexao2.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$codpedido = (isset($_POST['codpedido'])) ? $_POST['codpedido'] : '';
		$qtd = (isset($_POST['qtd'])) ? $_POST['qtd'] : '';	
		$sub = (isset($_POST['sub'])) ? $_POST['sub'] : '';
		$total = (isset($_POST['total'])) ? $_POST['total'] : '';
		$codcliente = (isset($_POST['codcliente'])) ? $_POST['codcliente'] : '';
		$codproduto = (isset($_POST['codproduto'])) ? $_POST['codproduto'] : '';
		$datacompra = (isset($_POST['datacompra'])) ? $_POST['datacompra'] : '';
		


		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $codpedido == ''):
		    $mensagem .= '<li>ID do Pedido é desconhecido.</li>';
	    endif;

	   
		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

			
 
			            
			          
			               echo "Houve um erro ao gravar arquivo na pasta de destino!"; 
			          endif;  
			     endif;
			else:

			 	  $nomeimagem = $imagem_atual;

			endif;

			$sql = 'UPDATE produto SET codpedido=:codpedido,qtd=:qtd,sub=:sub,total=:total,codcliente=:codcliente,codproduto=:codproduto,datacompra=:datacompra, WHERE codpedido=:codpedido';
			$sql .= 'WHERE codpedido = :codpedido';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':codpedido', $codpedido);
			$stm->bindValue(':qtd', $qtd);
			$stm->bindValue(':sub', $sub);
			$stm->bindValue(':total', $total);
			$stm->bindValue(':codcliente', $codcliente);
			$stm->bindValue(':codproduto', $codproduto);
			$stm->bindValue(':datacompra', $datacompra);
			
			$retorno = $stm->execute();
   
   if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;


			
		endif;	

			?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conexao) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/pedido-lista.php'>
			
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/pedido-lista.php'>
				
			";	
		}
			
		?>
	</body>
</html>
	