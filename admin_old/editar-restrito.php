<?php
	include_once("conexao.php");
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_restrito = "SELECT * FROM acesso_restrito WHERE pk_restrito = '$id' LIMIT 1";
	$resultado_restrito= mysqli_query($conn, $result_restrito);
	$row_restrito = mysqli_fetch_assoc($resultado_restrito);	
?>
<?php include "includes/header.php" ?>
		
<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Editar Usuário</h1>
			</div>
			
			
			<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  	<div class="panel-body">
					
			
			<form class="form-horizontal" method="POST" action="processar_editar_restrito.php" enctype="multipart/form-data">
			
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" value="<?php echo $row_restrito['nome']; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Telefone</label>
					<div class="col-sm-10">
						<input type="text" name="telefone" class="form-control" id="inputEmail3" placeholder="Telefone" value="<?php echo $row_restrito['telefone']; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						<input type="text" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" value="<?php echo $row_restrito['email']; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Login</label>
					<div class="col-sm-10">
						<input type="text" name="login" class="form-control" id="inputEmail3" placeholder="E-mail" value="<?php echo $row_restrito['login']; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-10">
						<input type="text" name="senha" class="form-control" id="inputEmail3" placeholder="E-mail" value="<?php echo $row_restrito['senha']; ?>">
					</div>
				</div>
				
					
				<input type="hidden" name="id" value="<?php echo $row_restrito['pk_restrito']; ?>">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-warning">Alterar</button>
						<a href="restrito-lista.php"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
					</div>
				</div>
			</form>
		  			</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>
	</section>
<?php include "includes/footer.php" ?>