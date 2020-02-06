<?php
include "header.php";
?>
  <?php
// Conexão com o banco de dados
require_once 'conexao.php';
	
	if(isset($_GET['codcliente']) && !empty($_GET['codcliente']))
	{
		
	$codcliente = $_REQUEST['cliente'];
		$sql = "select * from cliente where codcliente=$codcliente";
		$consulta = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($consulta);
	}
	else{
		echo "Cliente não cadastrado";
	}
	if (isset($_GET['alterar'])) {
		// Recupera os dados dos campos
		$nome = $_GET['nome'];
		$cpf = $_GET['cpf'];
		$dtnasc = $_GET['dtnasc'];
		$cep = $_GET['cep'];
		$endereco = $_GET['endereco'];
		$numero = $_GET['numero'];
		$complemento = $_GET['complemento'];
		$bairro = $_GET['bairro'];
		$cidade = $_GET['cidade'];
		$estado = $_GET['estado'];
		$telefone = $_GET['telefone'];
		$celular = $_GET['celular'];
		$email = $_GET['email'];
		$senha = $_GET['senha'];
		$imagem = $_FILES["imagem"];
		// Se a foto estiver sido selecionada
	if (!empty($imagem["name"])) {
		// Largura máxima em pixels
		$largura = 95000;
		// Altura máxima em pixels
		$altura = 980000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000000000;
		$error = array();
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
     	   $error[1] = "Isso não é uma imagem válida.";
   	 	} 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($imagem["tmp_name"]);
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}	
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($imagem["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
		// Se não houver nenhum erro
		if (count($error) == 0) {
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotoscliente/" . $nome_imagem;
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
			// Insere os dados no banco
	$sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', dtnasc = '$dtnasc', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade',estado = '$estado',telefone = '$telefone',celular = '$celular', email = '$email', senha = '$senha', imagem = '$nome_imagem' WHERE codcliente= $codcliente'";


			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
			if ($sql){
					echo "
				<script type=\"text/javascript\">
					alert(\"Alterado com Sucesso.\");
				</script>
			";
			}
		}
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
		}
	}
?>
<body>
<div class="container">
  <h2>Alterar  cliente</h2>
  
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" enctype="multipart/form-data" name="alterar" >

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome" value="<?php echo $nome; ?>" name="nome">
    </div>
	<div class="form-group">
      <label for="cpf">CPF:</label>
      <input type="text" class="form-control" value="<?php echo $cpf; ?>"id="cpf" placeholder="CPF" name="cpf">
    </div> 
<div class="form-group">
      <label for="dtnasc">Data de Nascimento:</label>
<input type="date" class="form-control" value="<?php echo $dtnasc; ?>"id="dtnasc" placeholder="Data de Nascimento" name="dtnasc">
    </div> 	
<div class="form-group">
      <label for="cep">CEP:</label>
<input type="text" class="form-control" value="<?php echo $cep; ?>" id="cep" placeholder="CEP" name="cep">
   
	
<span class="input-group-btn">
   <button class="btn btn-secondary" type="button" id="buscaCEP">Buscar</button>
</span>
 </div> 
 
 
<div id="cepstatus" ></div>	
	
<div class="form-group">
      <label for="endereco">Endereço:</label>
<input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" readonly/>
</div> 		
<div class="form-group">
      <label for="numero">Número:</label>
<input type="text" class="form-control" id="numero" value="<?php echo $numero; ?>" placeholder="Número" name="numero">
</div> 
<div class="form-group">
      <label for="complemento">Complemento:</label>
<input type="text" value="<?php echo $complemento; ?>" class="form-control" id="complemento" placeholder="Complemento" name="complemento">
</div> 

<div class="form-group">
      <label for="bairro">Bairro:</label>
<input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" readonly/>
</div>

<div class="form-group">
      <label for="cidade">Cidade:</label>
<input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" readonly/>
</div>
<div class="form-group">
<label for="estado">Estado:</label>
<input type="text" class="form-control" id="uf" placeholder="Estado" name="estado" readonly/></div>
<div class="form-group">
<label for="telefone">Telefone:</label>
<input type="text"  value="<?php echo $telefone; ?>" class="form-control" id="telefone" placeholder="Telefone" name="telefone"></div>
<div class="form-group">
<label for="celular">Celular:</label>
<input type="text"  value="<?php echo $celular; ?>" class="form-control" id="celular" placeholder="Celular" name="celular"></div>
<div class="form-group">
<label for="email">E-mail:</label>
<input type="email" value="<?php echo $email; ?>" class="form-control" id="email" placeholder="E-mail" name="email"></div>

<div class="form-group">
<label for="senha">Senha:</label>
<input type="password"  value="<?php echo $senha; ?>"class="form-control" id="senha" placeholder="Senha" name="senha"></div>

<div class="form-group">
<label for="imagem">Imagem:</label>
<input type="file" class="form-control" value="<?php echo $imagem; ?>" id="imagem" placeholder="Imagem" name="imagem"></div>


<input type="submit" name="alterar" class="btn btn-primary"value="Alterar"/>
<button type="reset" class="btn-primary">Limpar</button>
</form>
</div>
<script src="js/cep.js" type="text/javascript"></script>
<?php include "footer.php"; ?>
