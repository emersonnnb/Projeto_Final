

<?php session_start(); ?>
<?php
   if(!isset($_SESSION['cliente']));  
   if(!isset($_SESSION['clientenome']));  
   if(!isset($_SESSION['carrinho']));  
?>


<?php require "admin.php" ?>
<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		<div class="content-box-large">
		 <div class="panel-heading">
		<div class="panel-title">
		<h1>Listagem de Produtos</h1>
		<?php echo $_SESSION['clientenome']; ?>, seus  pedidos:
	</div>
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		</div>
		</div>
		<div class="panel-body">
		
	<?php
	
	include('conexao.php');
	$codcliente = $_SESSION['cliente'];
	$sql = "SELECT * FROM pedido INNER JOIN produto ON pedido.codproduto = produto.codproduto where codcliente = '$codcliente'";
	
	
	$executa = mysqli_query($conexao, $sql);
	if(mysqli_num_rows($executa) > 0 ){
		?>
		<div class="table-responsive">
     <table class="table table-strip">
		<thead>
			<tr>
				<th width="244">CODPEDIDO</th>
			<th width="244">CODCLIENTE</th>

				<th width="244">CODPRODUTO</th>
				<th width="244">DESCRIÇÃO</th>
			
				<th width="244">CATEGORIA</th>
				<th width="244">DATA COMPRA</th>
				<th width="244">QTD</th>
				<th width="244">PREÇO</th>
				<th width="244">TOTAL</th>
				
				
			</tr>
			 <?php
        while($row = mysqli_fetch_array($executa)){
            ?>
            <tr>
            	 <td><?php echo $row["codpedido"];?></td>

                <td><?php echo $row["codcliente"];?></td>
				<td><?php echo $row["codproduto"];?></td>
				<td><?php echo $row["descricao"];?></td>
			
				<td><?php echo $row["categoria"];?></td>
				<td><?php echo date('d/m/Y', strtotime($row["datacompra"])); ?></td>
							
				<td><?php echo $row["qtd"];?></td>
				<td><?php echo $row["preco"];?></td>
				<td><?php echo $row["total"];?></td>
			
            </tr>
            <?php
        } echo "</table>";
    }else{
        echo "Nenhum pedido encontrado!";
    }    mysqli_close($conexao); 
   
?>
			
			
			
		</thead>
		</div>
	
	
	
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
 </section>
  <?php require "footer.php" ?> 