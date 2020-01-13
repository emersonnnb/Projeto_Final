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

mysqli_query($conexao,"UPDATE usuario SET nome='$nome',cpf='$cpf',caixa='$caixa',situacao='$situacao' WHERE id='$id'") or die (mysqli_error($conexao));

//logs
mysqli_query($conexao,"INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Alterou', 'Usuarios', 'Alterou $nome', NOW(), '$hostname', '$ip')") 
or die (mysqli_error($conexao));
//logs

echo alertatualizacao();
?>