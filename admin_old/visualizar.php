<?php
	include_once("conexao2.php");
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_restrito = "SELECT * FROM acesso_restrito WHERE pk_restrito = '$id' LIMIT 1";
	$resultado_restrito = mysqli_query($conn, $result_restrito);
	$row_restrito = mysqli_fetch_assoc($resultado_restrito);	
?>

<?php include "includes/header.php" ?>

		<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Visualizar Restrito</h1>
			</div>
			
			
			<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  	<div class="panel-body">
					<a href="restrito-lista.php">
						<button type='button' class='btn btn-sm btn-success'>Listar</button>
					</a>
					
					<a href="editar-restrito.php?id=<?php echo $row_restrito['pk_restrito']; ?>">
						<button type="button" class="btn btn-sm btn-warning">
							Editar
						</button>
					</a>
					
					<a href="restrito-excluir.php?id=<?php echo $row_restrito['pk_restrito']; ?>">
						<button type="button" class="btn btn-sm btn-danger">
							Apagar
						</button>
					</a>
				
			
			<dl class="dl-horizontal">	
			<br> <br>
				<dt>Id: </dt>
				<dd><?php echo $row_restrito['pk_restrito']; ?></dd>
				<dt>Nome: </dt>
				<dd><?php echo $row_restrito['nome']; ?></dd>
				<dt>Telefone: </dt>
				<dd><?php echo $row_restrito['telefone']; ?></dd>
				<dt>E-mail: </dt>
				<dd><?php echo $row_restrito['email']; ?></dd>
				
				<dt>Login: </dt>
				<dd><?php echo $row_restrito['login']; ?></dd>
				
				<dt>Senha: </dt>
				<dd><?php echo $row_restrito['senha']; ?></dd>
				<dt>Inserido: </dt>
				<dd><?php 
					if(isset($row_restrito['created'])){
						$inserido = $row_niveis_acessos['created'];
						echo date('d/m/Y H:i:s', strtotime($inserido)); 
					}?>
				</dd>
			</dl>
		
				</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>
		</section>
		
<?php include "includes/footer.php" ?>