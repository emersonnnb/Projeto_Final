<?php session_start(); ?>
<?php
   if(!isset($_SESSION['login'])) header("location: login.php");  
?>



<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <title>Acesso Restrito</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   

    <link href="css/styles.css" rel="stylesheet">

  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">TecInfo</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['login']; ?> <b class="caret"></b></a>
							
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="restrito-sair.php">Sair</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Início</a></li>
					
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-user"></i>Acesso Restrito
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
							<li><a href="restrito-cadastrar.php"><i class="icon-inbox"></i>Cadastrar Usuários administrativos</a></li>
							<li><a href="restrito-lista.php"><i class="icon-inbox"></i>Lista de Usuários </a></li>
							<li><a href="restrito-form-pesquisa-nome.php"><i class="icon-inbox"></i>Pesquisar Usuários </a></li>
                        </ul>
                    </li>  
					
					<li class="submenu">
                         <a href="#">
                      <i class="glyphicon glyphicon-user"></i>Cliente
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
							<li><a href="form-cliente.php"><i class="icon-inbox"></i>Cadastrar Cliente </a></li>
							<li><a href="cliente-lista.php">Clientes Cadastrados</a></li>
							<li><a href="cliente-form-pesquisa-nome.php">Pesquisar cliente</a></li> 
                        </ul>
                    </li>
						<li class="submenu">
                         <a href="#">
                      <i class="glyphicon glyphicon-user"></i>Produto
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
							<li><a href="form-produto.php"><i class="icon-inbox"></i>Cadastrar Produto </a></li>
							<li><a href="produto-lista.php">Produtos Cadastrados</a></li>
							<li><a href="produto-form-pesquisa-nome.php">Pesquisar Produto</a></li> 
                        </ul>
                    </li>
					
					<li class="submenu">
                         <a href="#">
                      <i class="glyphicon glyphicon-user"></i>Pedido
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
							
							<li><a href="pedido-lista.php">Pedidos Cadastrados</a></li>
							<li><a href="pedido-pesquisaporcliente.php">Pedidos por cliente</a></li>
							<li><a href="pedido-form-pesquisa-nome.php">Pesquisar Pedido</a></li> 
                        </ul>
                    </li>
					
					
					
					
					 <li class="current"><a href="cliente-sair.php"><i class="glyphicon glyphicon-log-out"></i>Sair</a></li>		
                </ul>
             </div>
		  </div>