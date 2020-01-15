<?php
session_start();
include('conexao.php');
$login = $_POST['login'];
$senha = md5($_POST['senha']);

$res = "SELECT * FROM usuario WHERE cpf='$login' AND senha='$senha' AND situacao='0' ";
$sql = mysqli_query ($conexao,$res) or die (mysqli_error($conexao));
$dados_uu = mysqli_fetch_array($sql);

	if(empty($dados_uu)){ echo '<div class="alert alert-danger">Usu�rio ou senha <strong>inv�lido.</strong></div>';}  //se $dados_uu for vazio mostrar o erro
	else{
			$_SESSION['iduser'] = $dados_uu['idUsuario'];
			$_SESSION['nomeuser'] = $dados_uu['nome'];
			$_SESSION['caixa'] = $dados_uu['id_pdv'];

			$iduser = $_SESSION['idUsuario'];
			$usuario = $_SESSION['nome'];//pega usuario que est� executando a a��o
			$caixa = $_SESSION['id_pdv'];
			$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina
		
			//logs
			$sql = mysqli_query($conexao,"INSERT INTO logs(nome_user, tipo, tabela, descricao, datatime, pc, ip) VALUES('$usuario', 'Entrou', 'Usuario', 'Usurio entrou no sistema', NOW(), '$hostname', '$ip')") or die ($conexao());
			//logs
			echo "<script>location.href='index.php';</script>";
		}
?>