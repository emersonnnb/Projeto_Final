<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<title>PDV-YES</title>
	<meta charset="iso8859-1">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	<script src="js/jquery.min.js"></script>


</head>
<body>
<div  id="retorno"></div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="" method="post" id="form-login" autocomplete="off">
					<span class="login100-form-title">
						PDV - YES
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Digite sua Matricula">
						<input class="input100" type="number" name="cpf" placeholder="Digite sua Matricula" pattern="[^a-zA-Z0-9_]+^+$">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Digite sua Senha">
						<input class="input100" type="password" name="senha" placeholder="Digite sua senha" minlength="6">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
					
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Entrar
						</button>
					</div>

					<div class="flex-col-c p-t-50 p-b-40">

					<img src="\Projeto_Final\images\1.png" alt="some text" width=100 height=100>
				
					</div>
				</form>
                
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
	
    <script>
			jQuery('#form-login').submit(function(){
			  jQuery.ajax({
				type:'POST',
				url:'proc_login.php',
				data:jQuery('#form-login').serialize(),
				success:function(data){
				  jQuery('#retorno').show().html(data);
				  jQuery('#retorno').show().fadeOut(3000).html(data);
				  jQuery('#form-login').each(function(){this.reset();});
				}
			  });
			  return false;
			});
	</script>
			</div>
			


		</div>
		
	</div>
</body>
</html>