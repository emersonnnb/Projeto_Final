<?php
include "includes/header.php";
?>
  <?php
// Conexão com o banco de dados
	include "conexao.php";
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$dtnasc = $_POST['dtnasc'];
		$cep = $_POST['cep'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
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
        	$caminho_imagem = "../fotoscliente/" . $nome_imagem;
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
			// Insere os dados no banco
			$sql = "insert into cliente values(null,'".$nome."','".$cpf."','".$dtnasc."','".$cep."','".$endereco."','".$numero."','".$complemento."','".$bairro."','".$cidade."','".$estado."','".$telefone."','".$celular."','".$email."','".$senha."','".$nome_imagem."')";

			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
			if ($sql){
					echo "
				<script type=\"text/javascript\">
					alert(\"Cadastrado com Sucesso.\");
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
<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Cadastro Cliente</h1>
			</div>
			
			
			<div class="panel-options">
								
								<a href="cliente-lista.php">
						<button type='button' class='btn btn-sm btn-success'>Listar</button></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</a>
					
					</div>
						</div>
		  	<div class="panel-body">
  
  
  
  
  
  
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro" >

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
    </div>
	<div class="form-group">
      <label for="cpf">CPF:</label>
      <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf">
    </div> 
<div class="form-group">
      <label for="dtnasc">Data de Nascimento:</label>
<input type="date" class="form-control" id="dtnasc" placeholder="Data de Nascimento" name="dtnasc">
    </div> 	
<div class="form-group">
      <label for="cep">CEP:</label>
<input type="text" class="form-control" id="cep" placeholder="CEP" name="cep">
   
	
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
<input type="text" class="form-control" id="numero" placeholder="Número" name="numero">
</div> 
<div class="form-group">
      <label for="complemento">Complemento:</label>
<input type="text" class="form-control" id="complemento" placeholder="Complemento" name="complemento">
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
<input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone"></div>
<div class="form-group">
<label for="celular">Celular:</label>
<input type="text" class="form-control" id="celular" placeholder="Celular" name="celular"></div>
<div class="form-group">
<label for="email">E-mail:</label>
<input type="email" class="form-control" id="email" placeholder="E-mail" name="email"></div>

<div class="form-group">
<label for="senha">Senha:</label>
<input type="password" class="form-control" id="senha" placeholder="Senha" name="senha"></div>

<div class="form-group">
<label for="imagem">Imagem:</label>
<input type="file" class="form-control" id="imagem" placeholder="Imagem" name="imagem"></div>


<input type="submit" name="cadastrar" class="btn btn-primary"value="Cadastrar"/>
<button type="reset" class="btn-primary">Limpar</button>
</form>
</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>
	
    </section>
</body>
</html>
 
<script src="js/cep.js" type="text/javascript"></script>
<?php include "footer.php"; ?>








