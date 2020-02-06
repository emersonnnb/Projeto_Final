<?php
    require "Produtos.class.php";
    $produto = new Produto ();
    $dados = $produto->lista();
?> 

<?php $title = "Listagem de Produtos"; ?>
<?php include "includes/header.php" ?>


<div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Listar Produtos</h1>
			</div>
			
			
			
			<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								
							</div>
						</div>
		  	<div class="panel-body">
     <?php if($dados==null){ ?>
            <p>Nenhum produto cadastrado</p>
        
        <?php } else{ ?>
        
        <table class="lista-dados">
        
		   <div class="col-md-10">

		  	<div class="row">
  				<div class="col-md-6">
  					
		
		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>COD PRODUTO</th>
				                  <th>DESCRIÇÃO</th>
				                
				                  <th>CATEGORIA</th>
				                  <th>PREÇO</th>
				                
				                  <th>IMAGEM</th>
				                </tr>
				              </thead>
							  
	<?php
    
								
								 foreach($dados as $dado => $coluna){
												echo "<tr>";
												echo "<td>".$coluna['codproduto']."</td>"; 
												echo "<td>".$coluna['descricao']."</td>";
										
												echo "<td>".$coluna['categoria']."</td>";
												echo "<td>".$coluna['preco']."</td>";
											 
												echo "<td><img src='../fotosprodutos/".$coluna['imagem']."' width='100' height='80'/></td>";
												echo '<td>  <a href="visualizar-produto.php?codproduto='.$coluna['codproduto'].  "&descricao=" . $coluna['descricao'] ."&categoria=" . $coluna['categoria'] . "&preco=" . $coluna['preco'] . "&imagem=" . $coluna['imagem'] . '"> <input type="submit" class="btn btn-primary"  value="Visualizar"/>
												</td>
												<td>
												 <a href="produto-excluir.php?codproduto='.$coluna['codproduto'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td>
												 
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
    
        