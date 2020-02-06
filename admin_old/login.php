<!DOCTYPE html>
<html>
  <head>
    <title>Acesso Restrito</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <link href="css/styles.css" rel="stylesheet">

  
  </head>

  
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="login.php">RESTRITO</h1></a>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	
	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
							
							<br/>
							<br/>
			                <h3>ACESSO RESTRITO</h3>
			               <br/>
				<form class="form-vertical" method="post" action="restrito-autenticar.php">			
			                <input class="form-control" type="text" name="login" id="login"  placeholder="Usuário">
			                <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha">
			                <div class="action">
			                    <button type="submit" class="btn btn-primary">Entrar</button>
			                    <button type="reset"  class="btn btn-danger">Limpar</button>
								<a href="../index.php" class="btn btn-primary" value="Home">Home</a>
			                </div>   
						</form>
								
			            </div>
			        </div>

			        
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>