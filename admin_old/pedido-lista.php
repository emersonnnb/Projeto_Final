<?php
    require "Pedido.class.php";
    $pedido = new Pedido ();
    $dados = $pedido->lista();
?> 

<?php $title = "Listagem de Pedido"; ?>
<?php include "includes/header.php" ?>


<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Listar Pedido</h1>
			</div>
			
			
			
			<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								
							</div>
						</div>
		  	<div class="panel-body">
     <?php if($dados==null){ ?>
            <p>Nenhum pedido cadastrado</p>
        
        <?php } else{ ?>
        
        <table class="lista-dados">
        
		   <div class="col-md-10">

		  	<div class="row">
  				<div class="col-md-6">
  					
		
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
											
												echo '<td>  <a href="visualizar-pedido.php?codpedido='.$coluna['codpedido'].  "&qtd=" . $coluna['qtd'] . "&sub=" . $coluna['sub'] . "&total=" . $coluna['total'] . "&codcliente=" . $coluna['codcliente']."&codproduto=" . $coluna['codproduto'] .  "&datacompra=" . $coluna['datacompra'].'"><input type="submit" class="btn btn-primary"  value="Visualizar"/> 
												</td>
												<td>
												 <a href="pedido-excluir.php?codpedido='.$coluna['codpedido'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td>
												 
												 </td>';
												echo "</tr>";
												echo "</tr>";
											}
											
											
								?>
								
								
								   <?php } ?>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			</div>
  				
		   
	</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>

    
     
    
 </section>

  <?php include "includes/footer.php" ?>
    
        