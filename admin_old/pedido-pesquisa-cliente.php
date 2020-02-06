<?php
require "Pedido.class.php";

$codcliente = $_POST['codcliente'];
$pedido= new Pedido();
$dados = $pedido->pesquisarPorNome($codcliente);
if ($dados <=0) {
	?>
	 '<script>
		alert('O Código do cliente não existe');
	window.location.href='pedido-pesquisaporcliente.php';
				</script>'
		<?php		
}
?>




<?php $title = "Listagem de Pedido"; ?>
<?php include "includes/header.php" ?>

    <section class="container">
        <h1>Pesquisa por: <?php echo $codcliente; ?></h1>
        
        <?php if(isset($dados)){ ?>
       <div class="col-md-10">

	   <div class="table-responsive">
     <table class="table table-strip">
		  	<div class="row">
  				<div class="col-md-10">
  					
		
		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>CODPEDIDO</th>
				                  <th>QTD</th>
				                  <th>SUB</th>
				                  <th>TOTAL</th>
									<th>CODCLIENTE</th>
				                  <th>CODPRODUTO</th>
								  <th>DATACOMPRA</th>
				                </tr>
				              </thead>
				               <?php
    
								
								 foreach($dados as $dado => $coluna){
												echo "<tr>";
												echo "<td>".$coluna['codpedido']."</td>"; 
												echo "<td>".$coluna['qtd']."</td>";
												echo "<td>".$coluna['sub']."</td>";
												echo "<td>".$coluna['total']."</td>";
												echo "<td>".$coluna['codcliente']."</td>";
												echo "<td>".$coluna['codproduto']."</td>";
												echo "<td>".$coluna['datacompra']."</td>";
												
												echo "</tr>";
											
											}
											
											
								?>
								
								
								   <?php } ?>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			</div>
			</table>
			</div>
    </section>

<?php include "includes/footer.php" ?>