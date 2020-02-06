<?php
require "Produtos.class.php";

$descricao = $_POST['descricao'];
$produto= new Produto();
$dados = $produto->pesquisarPorNome($descricao);

?>

<?php $title = "Listagem de Produtos"; ?>
<?php include "includes/header.php" ?>

    <section class="container">
        <h1>Pesquisa por: <?php echo $descricao; ?></h1>
        
        <?php if(isset($dados)){ ?>
       <div class="col-md-10">

		  	<div class="row">
  				<div class="col-md-10">
  					
		
		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>COD PRODUTO</th>
				                  <th>DESCRIÇÃO</th>
				               
				                  <th>CATEGORIA</th>
				                  <th>PREÇO</th>
				           
				                  <th>IMAGENS</th>
				                </tr>
				              </thead>
				               <?php
    
								
								 foreach($dados as $dado => $coluna){
												echo "<tr>";
												echo "<td>".$coluna['codproduto']."</td>"; 
												echo "<td>".$coluna['descricao']."</td>";
											
												echo "<td>".$coluna['categoria']."</td>";
												echo "<td>".$coluna['preco']."</td>";
											 
												echo "<td><img src='../fotosprodutos/".$coluna['imagem']."' height='100'/>";"</td>";
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