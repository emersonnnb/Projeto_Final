<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['codcliente']) && !empty($_GET['codcliente']))
	{
		$codcliente = $_GET['codcliente'];
		$sql = 'SELECT nome,cpf,dtnasc,cep,endereco,numero,complemento,bairro,cidade,estado,celular,email,senha,imagem FROM cliente WHERE codcliente =:codcliente';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':codcliente'=>$codcliente));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Cliente não cadastrado";
	}
	
	if(isset($_POST['alterar']))
	{
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
	
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$imagem = $_POST['imagem'];
		$imgFile = $_FILES['imagem']['name'];
		$tmp_dir = $_FILES['imagem']['tmp_name'];
		$imgSize = $_FILES['imagem']['size'];
					
		if($imgFile)
		{
			$upload_dir = '../fotoscliente/'; // pasta das imagens
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //extensões
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // validar extensões
			$imagem = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
				
					move_uploaded_file($tmp_dir,$upload_dir.$imagem);
				}
				else
				{
					$errMSG = "Desculpe seu arquivo tem mais de 5MB";
				}
			}
			else
			{
				$errMSG = "Desculpe mas só são permitidas as extensões   JPG, JPEG, PNG & GIF.";		
			}	
		}
		else
		{
			//antiga imagem
			$imagem = $row['imagem']; // imagem antiga do banco de dados
		}	
		if(!isset($errMSG))
		{				
		
			$sql = 'UPDATE cliente SET nome=:nome,cpf=:cpf,dtnasc=:dtnasc,cep=:cep,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cidade=:cidade,estado=:estado,celular=:celular,email=:email,senha=:senha,imagem=:imagem WHERE codcliente=:codcliente';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nome',$nome);
			$stmt->bindParam(':cpf',$cpf);
			$stmt->bindParam(':dtnasc',$dtnasc);
			$stmt->bindParam(':cep',$cep);
			$stmt->bindParam(':endereco',$endereco);
			$stmt->bindParam(':numero',$numero);
			$stmt->bindParam(':complemento',$complemento);
			$stmt->bindParam(':bairro',$bairro);
			$stmt->bindParam(':cidade',$cidade);
			$stmt->bindParam(':estado',$estado);
		
			$stmt->bindParam(':celular',$celular);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':senha',$senha);
			$stmt->bindParam(':imagem',$imagem);
			$stmt->bindParam(':codcliente',$codcliente);
		   
			
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='cliente-lista.php';
				</script>
                <?php
			
			}else{
				$errMSG = "Não foi possível realizar a alteração";
			}
		
		}
		
						
	}
	
?>
<?php include "includes/header.php" ?>
<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Editar Cliente</h1>
			</div>
<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								
							</div>
						</div>
		  	<div class="panel-body">
			
			
   

<form method="post"  method="POST" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
   
   <div class="form-group">
	<label class="col-sm-2 control-label">Nome</label>
	<div class="col-sm-10">
	<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do cliente" value="<?php echo $row['nome']; ?>">
	</div>
    </div>
	<div class="form-group">
	<label class="col-sm-2 control-label">CPF</label>
	<div class="col-sm-10">
	<input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF do cliente" value="<?php echo $row['cpf']; ?>">
	</div>
    </div>
	<div class="form-group">
      <label for="cep" class="col-sm-2 control-label">CEP:</label>
	 <div class="col-sm-10">
	<input type="text" class="form-control" id="cep" placeholder="CEP" name="cep" value="<?php echo $row['cep']; ?>">

	<span class="input-group-btn">
	<button class="btn btn-secondary" type="button" id="buscaCEP">Buscar</button>
	</span>
	</div>
	</div> 
 
 
	<div id="cepstatus" ></div>	
	
	
	<div class="form-group">
	<label class="col-sm-2 control-label">Endereço</label>
	<div class="col-sm-10">
	<input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" value="<?php echo $row['endereco']; ?>" readonly/>
	</div>
    </div>
	<div class="form-group">
	<label class="col-sm-2 control-label">Número</label>
	<div class="col-sm-10">
	<input type="text" name="numero" class="form-control" id="numero" placeholder="Número" value="<?php echo $row['numero']; ?>">
	</div>
    </div>
	<div class="form-group">
	<label class="col-sm-2 control-label">Complemento</label>
	<div class="col-sm-10">
	<input type="text" name="complemento" class="form-control" id="complemento" placeholder="Complemento" value="<?php echo $row['complemento']; ?>">
	</div>
    </div>
	<div class="form-group">
	<label class="col-sm-2 control-label">Bairro</label>
	<div class="col-sm-10">
	<input type="text" name="bairro" class="form-control" id="bairro"  placeholder="Bairro" value="<?php echo $row['bairro']; ?>" readonly/>
	</div>
    </div>
	<div class="form-group">
	<label class="col-sm-2 control-label">Cidade</label>
	<div class="col-sm-10">
	<input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="<?php echo $row['cidade']; ?>" readonly/>
	</div>
    </div>
	<div class="form-group">
	<label class="col-sm-2 control-label">Estado</label>
	<div class="col-sm-10">
	<input type="text" name="estado" class="form-control" id="uf" placeholder="Estado" value="<?php echo $row['estado']; ?>" readonly/>
	</div>
    </div>

	
	<div class="form-group">
	<label class="col-sm-2 control-label">Celular</label>
	<div class="col-sm-10">
	<input type="text" name="celular" class="form-control" id="celular" placeholder="Celular" value="<?php echo $row['celular']; ?>">
	</div>
    </div>
		<div class="form-group">
	<label class="col-sm-2 control-label">E-mail</label>
	<div class="col-sm-10">
	<input type="email" name="email" class="form-control" id="email" placeholder="E-mail" value="<?php echo $row['email']; ?>">
	</div>
    </div>
		<div class="form-group">
	<label class="col-sm-2 control-label">Senha</label>
	<div class="col-sm-10">
	<input type="password" name="senha" class="form-control" id="senha" placeholder="senha" value="<?php echo $row['senha']; ?>">
	</div>
    </div>
				
							
	<div class="form-group">
	<label class="col-sm-2 control-label">Imagem</label>
	<div class="col-sm-10">
		<a href="#" class="thumbnail">
		<img src="../fotoscliente/<?=$row['imagem']?>" height="190" width="150">
						     
		</a>
	<input  class="input-group" type="file" name="imagem" name="imagem" accept="image/*"  >
	</div>
	</div>
						
	<button type="submit" name="alterar" class="btn btn-default">
    <span class="glyphicon glyphicon-save"></span> Alterar
    </button>	
				
</div>
</div>
</form>
<script src="../js/cep.js" type="text/javascript"></script>	  
    

</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>
	</section>

<div class="alert alert-info">
    
</div>

<?php include "includes/footer.php" ?>



