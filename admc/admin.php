

<?php
   if(!isset($_SESSION['clientenome']));  
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
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['clientenome']; ?> <b class="caret"></b></a>
							
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="logoff.php">Sair</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
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
    
       
	   Área do Cliente
       
	  
    					
	
	<li><a href="listacliente.php"><i class="icon-inbox"></i>Dados cliente </a></li>
	<li><a href="finalizarcompra.php"><i class="icon-inbox"></i>Finalizar compra </a></li>
	<li><a href="pedidos2.php"><i class="icon-inbox"></i>Meus Pedidos </a></li>
	
	
	</li>  
					
	<li class="current"><a href="logoff.php"><i class="glyphicon glyphicon-log-out"></i>Sair</a></li>		
	</ul>
   </div>

 </div>


