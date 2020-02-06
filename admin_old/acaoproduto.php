		<?php 
		require 'conexao2.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$codproduto = (isset($_POST['codproduto'])) ? $_POST['codproduto'] : '';
		$descricao = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';	
		$tamanho = (isset($_POST['tamanho'])) ? $_POST['tamanho'] : '';
		$categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : '';
		$preco = (isset($_POST['preco'])) ? $_POST['preco'] : '';
		
		$imagem_atual = (isset($_POST['imagem_atual'])) ? $_POST['imagem_atual'] : '';
	
		


		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $codproduto == ''):
		    $mensagem .= '<li>ID do Produto é desconhecido.</li>';
	    endif;

	   
		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

			if(isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0): 

				
				

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['imagem']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nomeimagem = date('dmY') . '_' .$_FILES['imagem']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['imagem']['tmp_name'], 'fotos/'.$nomeimagem)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!"; 
			          endif;  
			     endif;
			else:

			 	  $nomeimagem = $imagem_atual;

			endif;

			$sql = 'UPDATE produto SET descricao=:descricao, tamanho=:tamanho, categoria=:categoria, preco=:preco, imagem=:imagem';
			$sql .= 'WHERE codproduto = :codproduto';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':descricao', $descricao);
			$stm->bindValue(':tamanho', $tamanho);
			$stm->bindValue(':categoria', $categoria);
			$stm->bindValue(':preco', $preco);
	
			$stm->bindValue(':imagem', $nomeimagem);
			
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/produto-lista.php'>
			
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/produto-lista.php'>
				
			";	
		}
			
		?>
	</body>
</html>
	