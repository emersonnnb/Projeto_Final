<?php

// para mostrar os erros (padrão)
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

try{
    
	if($_SERVER['REQUEST_METHOD'] != 'POST')
    header("Location: form-produto.php");
    
   // Variáveis ligando ao formulário
$descricao = $_POST['descricao'];
    if($descricao=="") throw new Exception("Descrição  Inválida!");
    
$categoria = $_POST['categoria'];
    if($categoria=="") throw new Exception("categoria Inválida!");
    
$preco = $_POST['preco'];
    if($preco=="") throw new Exception("Preço Inválido");
	

	

	
	
	
	
   
// inclue a conexao e faz a instancia (padrão) // 
require_once "Produto.class.php";

    $produto = new Produto(); 
	$produto->descricao = $descricao;
	$produto->categoria = $categoria;
	$produto->preco = $preco;
	
	$produto->imagem = $imagem;
	$produto = (isset($_POST['imagem'])) ? $_POST['imagem'] : '';
    $produto->inserir();    	
	
    $nome_foto = 'padrao.jpg';
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
			          $nome_imagem = date('dmY') . '_' . $_FILES['imagem']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['imagem']['tmp_name'], 'fotos/'.$nome_imagem)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;  
			endif;

			$sql = 'INSERT INTO produto (descricao, categoria, preco, imagem)
							   VALUES(:descricao, :categoria, :preco, :imagem)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':descricao', $descricao);
			$stm->bindValue(':categoria', $categoria);
			$stm->bindValue(':preco', $preco);
		
			$stm->bindValue(':imagem', $nome_imagem);
			$retorno = $stm->execute();
   
    $msg = "Cadastrado com sucesso";

}catch(PDOException $e){
    $msg = "Contate o administrador";   
    echo $e->getMessage();
}catch(Exception $e){
    $msg = $e->getMessage();
}

?>
    
    
   <?php require "includes/header.php" ?>

<?php $title ="Cadastro"; ?>

<section class="container">
    
    <?php echo $msg; ?>
    
</section>


    <?php require "includes/footer.php" ?>
	
	
	