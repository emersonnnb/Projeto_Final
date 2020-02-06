<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop</title>
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/font-awesome.min.css" rel="stylesheet">
    <link href="css2/prettyPhoto.css" rel="stylesheet">
    <link href="css2/price-range.css" rel="stylesheet">
    <link href="css2/animate.css" rel="stylesheet">
	<link href="css2/main.css" rel="stylesheet">
	<link href="css2/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js2/html5shiv.js"></script>
    <script src="js2/respond.min.js"></script>
    <![endif]-->       
    
</head><!--/head-->	
<?php
include ('header2.php');
include ('conexao.php');
$codproduto = $_REQUEST['codproduto'];
$sql = "select * from produto where codproduto=$codproduto";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);
 ?>	
<div class="container-fluid"> 
		<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="fotosprodutos/<?=$dados['imagem']; ?>" style="height:0 auto;width:80%;padding:10px;" alt="imagem" id="alignleft" class="img-responsivo">
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images2/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?= $dados['descricao']; ?></h2>
								<p>Web ID: 1089772</p>
								 
							
									<span>Preço: </b> R$  <?=$dados['preco']; ?></span>
									
								<a href="carrinho.php?acao=add&codproduto=<?php echo $dados['codproduto']?>" id="botao" class="btn btn-primary" role="button" value="<?= $dados['codproduto']; ?>">Comprar</a>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						
							
							
					
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Nome</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>Hora</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>Data</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Avaliação: </b> <img src="images2/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Enviar
										</button>
									</form>
								</div>
							</div>
							
						</div>
			</div><!--/category-tab-->
					
	</div>				
				
		
