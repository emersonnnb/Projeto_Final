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
@$cpf = $_POST['cpf'];
@$situacao = $_POST['situacao'];
@$caixa = $_POST['caixa'];

mysql_query("UPDATE usuario SET nome='$nome',cpf='$cpf',caixa='$caixa',situacao='$situacao' WHERE id='$id'") or die (mysql_error());

//logs
mysql_query("INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Alterou', 'Usuarios', 'Alterou $nome', NOW(), '$hostname', '$ip')") 
or die (mysql_error());
//logs

echo alertatualizacao();
?>