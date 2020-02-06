<?php
require "Pedido.class.php";

$codpedido = $_POST['codpedido'];
$pedido= new Pedido();
$dados = $pedido->pesquisarcodpedido($codpedido);
if ($dados <=0) {
	?>
	 '<script>
		alert('O Código do pedido não existe');
	window.location.href='pedido-form-pesquisa-nome.php';
				</script>'
		<?php		
}
?>

<?php $title = "Listagem de Pedidos"; ?>
<?php include "includes/header.php" ?>

    <section class="container">
        <h1>Pesquisa por: <?php echo $codpedido; ?></h1>
        
        <?php if(isset($dados)){ ?>
       <div class="col-md-10">

		  	<div class="row">
  				<div class="col-md-10">
  					
		
		  				<div class="panel-body">
		  						<div class="table-responsive">
	<table class="table table-strip">
				              <thead>
				                <tr>
				                  <th>COD PEDIDO</th>
				                  <th>QUANTIDADE</th>
				                  <th>SUB</th>
				                  <th>TOTAL</th>
				                  <th>COD CLIENTE</th>
				                  <th>COD PRODUTO</th>
				                  <th>DATA DA COMPRA</th>
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
    </section>

<?php include "includes/footer.php" ?>