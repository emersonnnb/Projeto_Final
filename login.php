<?php
session_start();
?>

<?php  include ('header2.php'); ?>
<hr>
<div class="container">
	<br><br><br>
	<div class="form-group">
	<h1>Login</h1>
	<form name="formlogin" method="post" action="admc/fazlogin.php">
		Email:<br> <input type="email" placeholder="Digite o seu e-mail" name="email">
		<br>
		Senha:<br> <input type="password" placeholder="Digite o sua senha"  name="senha">
	<br><br>
	<input type="submit" value="Login" class="btn-success">
	<input type="reset" value="Limpar" class="btn-danger">
	
	</form>
	</div>
</div>

