<?php
include ('header2.php');
include ('conexao.php');
$codproduto = $_REQUEST['codproduto'];
$sql = "select * from produto where codproduto=$codproduto";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);
 ?>
<hr>
<section class="container">
  <br> 
   <div class="row">
  <div class="col-sm-6">
    <img src="fotosprodutos/<?=$dados['imagem']; ?>" style="height:0 auto;width:80%;padding:10px;" alt="imagem" id="alignleft" class="img-responsivo">
  </div>
<div class="col-sm-6">
<br/><br/><br/>
    <h3><?= $dados['descricao']; ?></h3>
    <br/>
	<b>Categoria:</b> <?=$dados['categoria'];?>
	<br/><br/>
	<b>Preço: </b> R$  <?=$dados['preco']; ?>
	<br/><br/>
  <img src="img/estrela.png">
  <br/><br/><br/>
  <a href="carrinho.php?acao=add&codproduto=<?php echo $dados['codproduto']?>" id="botao" class="btn btn-danger" style="backgound-color:#FF5656;" role="button" value="<?= $dados['codproduto']; ?>">Comprar</a>
  
</div>
</div>
</section>
<hr>
<?php include "include/footer2.php";?>