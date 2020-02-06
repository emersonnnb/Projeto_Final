<?php
	include_once("conexao.php");
	$codpedido = $_GET['codpedido'];
	//Buscar os dados referente ao produto situado neste id
	$result_cliente= "SELECT * FROM pedido WHERE codpedido = '$codpedido' LIMIT 1";
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
						<h1>Visualizar Pedidos</h1>
					</div>
					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<a href="pedido-lista.php">
						<button type='button' class='btn btn-sm btn-success'>Listar</button>
					</a>
					<a href="editarformpedido.php?codpedido=<?php echo $row_cliente['codpedido']; ?>">
						<button type="button" class="btn btn-info">
							Editar
						</button>
					</a>
					<a href="pedido-excluir.php?codpedido=<?php echo $row_cliente['codpedido']; ?>">
						<button type="button" class="btn btn-sm btn-danger">
							Apagar
						</button>
					</a>
					<dl class="dl-horizontal">	
						<br><br><dt>Cod Pedido: </dt>
								<dd><?php echo $row_cliente['codpedido']; ?></dd>
								<dt>Quantidade : </dt>
								<dd><?php echo $row_cliente['qtd']; ?></dd>
								
								<dt>Sub-Total: </dt>
								<dd><?php echo $row_cliente['sub']; ?></dd>
								<dt>Total: </dt>
								<dd><?php echo $row_cliente['total']; ?></dd>
								<dt>Cod Cliente: </dt>
								<dd><?php echo $row_cliente['codcliente']; ?></dd>
								<dt>Cod Produto: </dt>
								<dd><?php echo $row_cliente['codproduto']; ?></dd>
								<dt>Data da Compra: </dt>
								<dd><?php echo $row_cliente['datacompra']; ?></dd>
					</dl>
				</div>
			</div>		  		
		</div> 	
	</div>
</div>
</div>
</section>
		
<?php include "includes/footer.php" ?>



