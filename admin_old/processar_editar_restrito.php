<?php
	include_once("conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$login = mysqli_real_escape_string($conn, $_POST['login']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	
	$result_restrito = "UPDATE acesso_restrito SET nome='$nome', telefone='$telefone', email='$email', login='$login' , senha='$senha' WHERE pk_restrito = '$id'";
	
	$resultado_restrito = mysqli_query($conn, $result_restrito);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/restrito-lista.php'>
				<script type=\"text/javascript\">
					alert(\"Dados alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/restrito-lista.php'>
				<script type=\"text/javascript\">
					alert(\"Dados não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>