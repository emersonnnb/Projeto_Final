<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['codpedido']) && !empty($_GET['codpedido']))
	{
		$codpedido = $_GET['codpedido'];
		$sql = 'SELECT codpedido, qtd, sub, total, codcliente, codproduto, datacompra FROM pedido WHERE codpedido =:codpedido';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':codpedido'=>$codpedido));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Pedido não cadastrado";
	}
	
	if(isset($_POST['alterar']))
	{
		
	
	
		$codpedido = $_POST['codpedido'];
		$qtd = $_POST['qtd'];
	
		$sub = $_POST['sub'];
		$total = $_POST['total'];
		$codcliente = $_POST['codcliente'];
		$codproduto = $_POST['codproduto'];
		$datacompra = $_POST['datacompra'];

			$sql = 'UPDATE pedido SET codpedido=:codpedido,qtd=:qtd,sub=:sub,total=:total,codcliente=:codcliente,codproduto=:codproduto,datacompra=:datacompra WHERE codpedido=:codpedido';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':codpedido',$codpedido);
			$stmt->bindParam(':qtd',$qtd);
			
			$stmt->bindParam(':sub',$sub);
			$stmt->bindParam(':total',$total);
			$stmt->bindParam(':codcliente',$codcliente);
			$stmt->bindParam(':codproduto',$codproduto);
			$stmt->bindParam(':datacompra',$datacompra);
		
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='pedido-lista.php';
				</script>
                <?php
			
			}else{
				$errMSG = "Não foi possível realizar a alteração";
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
					<h1>Editar Pedido</h1>
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
					<label class="col-sm-2 control-label">Cod Pedido</label>
					<div class="col-sm-10">
						<input type="text" name="codpedido" class="form-control" id="codpedido" placeholder="Código do pedido" value="<?php echo $row['codpedido']; ?>">
					</div>
				</div>
								
				<div class="form-group">
					<label class="col-sm-2 control-label">Quantidade</label>
					<div class="col-sm-10">
						<input type="text" name="qtd" class="form-control" id="qtd" placeholder="Quantidade do Pedido" value="<?php echo $row['qtd']; ?>">
					</div>
				</div>

		
								
				<div class="form-group">
					<label class="col-sm-2 control-label">Sub-Total</label>
					<div class="col-sm-10">
						<input type="text" name="sub" class="form-control" id="sub" placeholder="Sub-Total" value="<?php echo $row['sub']; ?>">
					</div>
				</div>
						
				<div class="form-group">
					<label class="col-sm-2 control-label">Cod Cliente</label>
					<div class="col-sm-10">
						<input type="text" name="codcliente" class="form-control" id="codcliente" placeholder="Código de Cliente" value="<?php echo $row['codcliente']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Cod Produto</label>
					<div class="col-sm-10">
						<input type="text" name="codproduto" class="form-control" id="codproduto" placeholder="Código de Produto" value="<?php echo $row['codproduto']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Data da Compra</label>
					<div class="col-sm-10">
						<input type="date" name="datacompra" class="form-control" id="datacompra" placeholder="Data da Compra" value="<?php echo $row['datacompra']; ?>">
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



