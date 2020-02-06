<?php
include "header2.php";
include "conexao.php";
?>
<div class="container">
   <h1> Produtos</h1>
	<div class="row">
		<!--Imagens diretas do banco-->       
<?php
		$sql = "select * from produto";
        $resultado = mysqli_query($conexao, $sql);      
      while ( $dados = mysqli_fetch_assoc($resultado) ) 
	   {  
 ?>
	<div class="col-sm-3">
        <a href="produtop.php?codproduto=<?= $dados['codproduto']; ?>">

            <div class="card"   >
              <div class="card-body">
                <img class="card-img-top" src="fotosprodutos/<?= $dados['imagem']; ?> "style="width:80%;" alt="Card image cap"> 
               
                <p id='cartoes' class="card-title"><b><?php echo $dados['descricao'] ?></b></p>
                  <p class="card-text"><strong><?php echo $dados['categoria'] ?></strong></p>
                  <h5><p class="cart-text">POR: R$ <?php echo $dados['preco'] ?></p></h5>
               </p>
              </div>
          </div>
         </div>
 <?php 
		 } ?>
     </div>
	 </div>
<?php include "footer.php"; ?>