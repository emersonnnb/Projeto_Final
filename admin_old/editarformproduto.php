<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['codproduto']) && !empty($_GET['codproduto']))
	{
		$codproduto = $_GET['codproduto'];
		$sql = 'SELECT descricao, categoria, preco, imagem FROM produto WHERE codproduto =:codproduto';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':codproduto'=>$codproduto));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Produto não cadastrado";
	}
	
	if(isset($_POST['alterar']))
	{
		
	
	
		$descricao = $_POST['descricao'];
		$categoria = $_POST['categoria'];
		$preco = $_POST['preco'];
		
		$imgFile = $_FILES['imagem']['name'];
		$tmp_dir = $_FILES['imagem']['tmp_name'];
		$imgSize = $_FILES['imagem']['size'];
					
		if($imgFile)
		{
			$upload_dir = '../fotosprodutos/'; // pasta das imagens
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //extensões
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // validar extensões
			$imagem = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$_row['imagem']);
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
		
			$sql = 'UPDATE produto SET descricao=:descricao,categoria=:categoria,preco=:preco,imagem=:imagem WHERE codproduto=:codproduto';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':descricao',$descricao);
		
			$stmt->bindParam(':categoria',$categoria);
			$stmt->bindParam(':preco',$preco);
		
			$stmt->bindParam(':codproduto',$codproduto);
			$stmt->bindParam(':imagem',$imagem);
		
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='produto-lista.php';
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
				  <h1>Editar Produto</h1>
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
					<label class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
						<input type="text" name="descricao" class="form-control" id="inputEmail3" placeholder="descrição do produto" value="<?php echo $row['descricao']; ?>">
					</div>
				</div>

	
		<div class="form-group">
		<label class="col-sm-2 control-label">categoria:</label>
		 <input type="text" name="categoria"  type="text" style="width:80%;" id="categoria" class="col-sm-2 form-control " id="categoria"  value="<?php echo $row['categoria']; ?>">
      	 
		</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Preço</label>
					<div class="col-sm-10">
						<input type="text" name="preco" class="form-control" id="inputEmail3" placeholder="Preço" value="<?php echo $row['preco']; ?>">
					</div>
				</div>
		
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Imagem</label>
					<div class="col-sm-10">
						<a href="#" class="thumbnail">
						 <img src="../fotosprodutos/<?=$row['imagem']?>" height="190" width="150">
						     
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
		  
    
	
</form>
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



