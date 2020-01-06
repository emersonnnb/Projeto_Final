<?php
session_start();
include('conexao.php');
$cpf = $_POST['cpf'];
$senha = md5($_POST['senha']);

$sql = mysql_query ("SELECT * FROM usuario WHERE cpf='$cpf' AND senha='$senha' AND situacao='0' LIMIT 1") or die (mysql_error());
$dados_uu = mysql_fetch_array($sql);

	if(empty($dados_uu)){ echo '<div class="alert alert-danger">Usuário ou senha <strong>inválido.</strong></div>';}  //se $dados_uu for vazio mostrar o erro
	else{
			$_SESSION['iduser'] = $dados_uu['id'];
			$_SESSION['nomeuser'] = $dados_uu['nome'];
			$_SESSION['caixa'] = $dados_uu['caixa'];

			$iduser = $_SESSION['iduser'];
			$usuario = $_SESSION['nomeuser'];//pega usuario que está executando a ação
			$caixa = $_SESSION['caixa'];
			$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina
		
			//logs
			$sql = mysql_query("INSERT INTO logs 
			(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
			('$usuario', 'Entrou', 'Usuário', 'Usuário entrou no sistema', NOW(), '$hostname', '$ip')") 
			or die (mysql_error());
			//logs
			echo "<script>location.href='index.php';</script>";
		}
?>