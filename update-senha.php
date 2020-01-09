<?php 
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que est� executando a a��o
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

@$id = $_POST['id'];
@$nome = utf8_decode($_POST['nome']);
@$senha = md5(utf8_decode($_POST['senha']));

mysqli_query($conexao,"UPDATE usuario SET senha='$senha' WHERE id='$id'") or die (mysqli_error($conexao,));

//logs
mysqli_query($conexao,"INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Alterou', 'Usuarios', 'Alterou senha do usu�rio: $nome', NOW(), '$hostname', '$ip')") 
or die (mysqli_error($conexao,));
//logs

echo alertatualizacao();
?>