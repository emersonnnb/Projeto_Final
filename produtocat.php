<?php
include "header2.php";
include "conexao.php";
?>
<hr>
<div class="container" style="width:100%;">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h1>Produto</h1>
            </div>
      <div class="col-sm-6 col-md-6">
        <form class="form-inline" method="GET" action="pesquisar.php">
          <div class="form-group">
            <label for="exampleInputName2"></label>
            <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Digite sua pesquisa...">
          </div>
		      <button type="submit" class="btn btn-danger">Pesquisar</button>
			  </form>
			</div>
		<!--Imagens diretas do banco-->       
<?php
		// select * from nometabela retorna todos os produtos//
//criar critérios utiliza se where campo(bd)operador matemático item
// que esteja no bd
		$sql = "select * from produto where categoria='Ferramentas'";
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
                  <a href="carrinho.php?acao=add&codproduto=<?= $dados['codproduto']; ?>" id="botao" class="btn btn-danger" role="button" value="<?= $dados['codproduto']; ?>">Comprar</a>
               </p>
              </div>
          </div>
         </div>
 <?php 
		 } ?>
     </div>
	 </div>
<?php include "footer.php"; ?>