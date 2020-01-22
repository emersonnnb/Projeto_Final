<?php 
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que estс executando a aчуo
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

@$id = $_POST['id'];
@$nome = utf8_decode($_POST['nome']);
@$senha = md5(utf8_decode($_POST['senha']));

mysql_query("UPDATE usuario SET senha='$senha' WHERE id='$id'") or die (mysql_error());

//logs
mysql_query("INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Alterou', 'Usuarios', 'Alterou senha do usuсrio: $nome', NOW(), '$hostname', '$ip')") 
or die (mysql_error());
//logs

echo alertatualizacao();
?>