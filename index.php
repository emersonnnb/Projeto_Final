

<?php
include('conexao.php');
$sql = "select * from produto";
$sql2 = "SELECT * FROM produto where preco <=100";
$resultado2 = mysqli_query($conexao,$sql2);
$resultado = mysqli_query($conexao,$sql);
include 'header2.php';
?>

<div class="container" style="width:80%;">
<hr>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="img-responsive" src="img/a.png"  style="width:100%;height:30em;">
    </div>
    <div class="carousel-item">
    <img class="img-responsive" src="img/b.jpg" style="width:100%;height:30em;">
    </div>
    <div class="carousel-item">
    <img class="img-responsive" src="img/c.png"style="width:100%;height:30em;">
    </div>
    <div class="carousel-item">
    <img class="img-responsive" src="img/d.jpg"style="width:100%;height:30em;">
    </div>
    <div class="carousel-item">
    <img class="img-responsive" src="img/e.jpg"style="width:100%;height:30em;">
    </div>
    <div class="carousel-item">
    <img class="img-responsive" src="img/f.jpg"style="width:100%;height:30em;">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<br>
   
 <div class="container" style="width:100%;">
 <div class="frase container">
    <h3>Produtos de Infomática</h3>
     <hr>
 </div>
      <div class="row">
        <?php 
        $i = 1;
        do {
            ($dados = mysqli_fetch_array($resultado)); 
		?>
        <div class="col-sm-3">
         <a href="produtop.php?codproduto=<?= $dados['codproduto']; ?>">
            <div class="card"   >
              <div class="card-body">
                <img class="card-img-top" src="fotosprodutos/<?= $dados['imagem']; ?>" style="width:80%;" alt="Card image cap"> 
               
                <p id='cartoes' class="card-title"><b><?php echo $dados['descricao'] ?></b></p>
                  <p class="card-text"><strong><?php echo $dados['categoria'] ?></strong></p>
                  <h5><p class="cart-text">POR: R$ <?php echo $dados['preco'] ?></p></h5>
                  <a href="carrinho.php?acao=add&codproduto=<?= $dados['codproduto']; ?>" id="botao" class="btn btn-danger" role="button" value="<?= $dados['codproduto']; ?>">Comprar</a>

                </div>
           </div></a>
        </div>
        <?php 
         $i++;
        } while ($i<9); ?>
      </div>
   </div>
        
</div>
 <div class="container" style="width:80%;">
            <img class="img-responsive" src="img/b.png"style="width:100%;height:20em;">
</div>

<section class="container row-fluid">
<br>
   <div class="frase">
    <h3>Produtos com descontos especiais abaixo de R$ 100,00</h3>
    <hr>
    <div class="row">
        <?php 
        $i = 1;
        do {
            ($dados = mysqli_fetch_array($resultado2)); 
		?>
        <div class="col-sm-3">
         <a href="produtop.php?codproduto=<?= $dados['codproduto']; ?>">
            <div class="card"   >
              <div class="card-body">
                <img class="card-img-top" src="fotosprodutos/<?= $dados['imagem']; ?>" style="width:80%;" alt="Card image cap"> 
               
                <p id='cartoes' class="card-title"><b><?php echo $dados['descricao'] ?></b></p>
                  <p class="card-text"><strong><?php echo $dados['categoria'] ?></strong></p>
                  <h5><p class="cart-text">POR: R$ <?php echo $dados['preco'] ?></p></h5>
                  <a href="carrinho.php?acao=add&codproduto=<?= $dados['codproduto']; ?>" id="botao" class="btn btn-danger" role="button" value="<?= $dados['codproduto']; ?>">Comprar</a>

                </div>
           </div></a>
        </div>
        <?php 
         $i++;
        } while ($i<9); ?>
      </div>
   </div>
   <br>
</section>


<?php include "include/footer.php";?>


