  <?php require "includes/header.php" ?>
<?php
// Conexão com o banco de dados
	include "conexao.php";
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$descricao = $_POST["descricao"];
	
		$categoria = $_POST["categoria"];
		$preco = $_POST["preco"];	
		$imagem = $_FILES["imagem"];
		// Se a foto estiver sido selecionada
	if (!empty($imagem["name"])) {
		// Largura máxima em pixels
		$largura = 95000;
		// Altura máxima em pixels
		$altura = 980000;
		// Tamanho máximo do arquivo em bytes
		$tamanhoi = 1000000000;
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
		if($imagem["size"] > $tamanhoi) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanhoi." bytes";
		}
		// Se não houver nenhum erro
		if (count($error) == 0) {
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "../fotosprodutos/" . $nome_imagem;
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
			// Insere os dados no banco
			$sql = "insert into produto values(null,'".$descricao."','".$categoria."','".$preco."','".$nome_imagem."')";
			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "
				<script type=\"text/javascript\">
				     alert(\"Produto cadastrado com sucesso.\");
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
				  <h1>Cadastro Produto</h1>
			</div>
			
			
			<div class="panel-options">
								
								<a href="produto-lista.php">
						<button type='button' class='btn btn-sm btn-success'>Listar</button></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</a>
					
					</div>
						</div>
		  	<div class="panel-body">
	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro" >
		<div class="form-group">
		<label class="col-sm-2">descricao:</label>
		<input type="text" name="descricao" class="col-sm-5" id="descricao">
		</div>
		
		<div class="form-group">
		<label class="col-sm-2">categoria:</label>
		 <input type="text" name="categoria" id="categoria" class="col-sm-5" id="categoria">
      	
        
		</div>
		<div class="form-group">
		<label class="col-sm-2"> Preço:</label>
		<input type="text" name="preco" class="col-sm-5" id="preco">
		</div>
	
		<div class="form-group">
		<label class="col-sm-2">Imagem:</label>
		<input type="file" name="imagem" class="btn btn-primary" id="imagem">
		</div><br><br>
		<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="cadastrar" class="btn btn-primary"value="Cadastrar"/>
		</div>
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
     <?php require "includes/footer.php" ?>                                        