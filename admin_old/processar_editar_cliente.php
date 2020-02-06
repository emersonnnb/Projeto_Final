<?php
	include_once("conexao.php");
	$codcliente = mysqli_real_escape_string($conn, $_POST['codcliente']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	
	$result_cliente = "UPDATE cliente SET nome='$nome', email='$email', senha='$senha' WHERE codcliente = '$codcliente'";
	
	$resultado_cliente = mysqli_query($conn, $result_cliente);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/cliente-lista.php'>
				<script type=\"text/javascript\">
					alert(\"Dados alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../admin/cliente-lista.php'>
				<script type=\"text/javascript\">
					alert(\"Dados não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>