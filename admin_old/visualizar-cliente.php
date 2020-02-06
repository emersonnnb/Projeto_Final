<?php
	include_once("conexao.php");
	$codcliente = $_GET['codcliente'];
	//Buscar os dados referente ao cliente situado neste id
	$result_cliente= "SELECT * FROM cliente WHERE codcliente = '$codcliente' LIMIT 1";
	$resultado_cliente = mysqli_query($conn, $result_cliente);
	$row_cliente = mysqli_fetch_assoc($resultado_cliente);	
?>

<?php include "includes/header.php" ?>

<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Visualizar Cliente</h1>
			</div>
			
			
			<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  	<div class="panel-body">
			<div class="table-responsive">
					<a href="cliente-lista.php">
						<button type='button' class='btn btn-sm btn-success'>Listar</button>
					</a>
					
					<a href="editar-cliente.php?codcliente=<?php echo $row_cliente['codcliente']; ?>">
						<button type="button" class="btn btn-sm btn-warning">
							Editar
						</button>
					</a>
					
					<a href="cliente-excluir.php?codcliente=<?php echo $row_cliente['codcliente']; ?>">
						<button type="button" class="btn btn-sm btn-danger">
							Apagar
						</button>
					</a>
				
			
			<dl class="dl-horizontal">	
			<br><br>	<dt>Id Usuário: </dt>
				<dd><?php echo $row_cliente['codcliente']; ?></dd>
				<dt>Nome: </dt>
				<dd><?php echo $row_cliente['nome']; ?></dd>
				<dt>CPF: </dt>
				<dd><?php echo $row_cliente['cpf']; ?></dd>
				<dt>Data de Nascimento: </dt>
				<dd><?php echo $row_cliente['dtnasc']; ?></dd>
				<dt>CEP: </dt>
				<dd><?php echo $row_cliente['cep']; ?></dd>
				<dt>Endereço: </dt>
				<dd><?php echo $row_cliente['endereco']; ?></dd>
				<dt>Número: </dt>
				<dd><?php echo $row_cliente['numero']; ?></dd>
				<dt>Complemento: </dt>
				<dd><?php echo $row_cliente['complemento']; ?></dd>
				<dt>Bairro: </dt>
				<dd><?php echo $row_cliente['bairro']; ?></dd>
				<dt>Cidade: </dt>
				<dd><?php echo $row_cliente['cidade']; ?></dd>
				<dt>Estado: </dt>
				
				
				<dd><?php echo $row_cliente['estado']; ?></dd>
			
				<dt>Celular: </dt>
				<dd><?php echo $row_cliente['celular']; ?></dd>
				<dt>email: </dt>
				<dd><?php echo $row_cliente['email']; ?></dd>
				<dt>Senha: </dt>
				<dd><?php echo $row_cliente['senha']; ?></dd>
				
				<dt>Imagem: </dt>
				<dd><?php echo "<td><img src='../fotoscliente/".$row_cliente['imagem']."' height='100'/>";?></dd>
				
				
			</dl>
			</div>
				</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>
		</section>
		
<?php include "includes/footer.php" ?>