<?php
	include_once("conexao.php");
	$codproduto = $_GET['codproduto'];
	//Buscar os dados referente ao produto situado neste id
	$result_cliente= "SELECT * FROM produto WHERE codproduto = '$codproduto' LIMIT 1";
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
				  <h1>Visualizar Produtos</h1>
			</div>
			
			
			<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  	<div class="panel-body">
					<a href="produto-lista.php">
						<button type='button' class='btn btn-sm btn-success'>Listar</button>
					</a>
					
					<a href="editarformproduto.php?codproduto=<?php echo $row_cliente['codproduto']; ?>">
						<button type="button" class="btn btn-info">
							Editar
						</button>
					</a>
					
					<a href="produto-excluir.php?codproduto=<?php echo $row_cliente['codproduto']; ?>">
						<button type="button" class="btn btn-sm btn-danger">
							Apagar
						</button>
					</a>
				
			
			<dl class="dl-horizontal">	
			<br><br>	<dt>Cod Produto: </dt>
				<dd><?php echo $row_cliente['codproduto']; ?></dd>
				<dt>Descrição : </dt>
				<dd><?php echo $row_cliente['descricao']; ?></dd>
				
				<dt>Categoria: </dt>
				<dd><?php echo $row_cliente['categoria']; ?></dd>
				<dt>Preço: </dt>
				<dd><?php echo $row_cliente['preco']; ?></dd>
				
				
				
				<dt>Imagem: </dt>
				<dd><?php echo "<td><img src='../fotosprodutos/".$row_cliente['imagem']."' height='100'/>";?></dd>
				<dt>Inserido: </dt>
				<dd><?php 
					if(isset($row_cliente['created'])){
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