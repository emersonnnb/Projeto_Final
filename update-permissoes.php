<?php 
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que estс executando a aчуo
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$id = $_POST['id'];

//permissoes
mysql_query("UPDATE permissoes SET valor='' WHERE id_usuario='$id'") or die (mysql_error());
if(isset($_POST['permissoes'])!=''){foreach($_POST['permissoes'] as $item) { Permissao($item,$id);}}

//logs
mysql_query("INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Alterou', 'Usuarios', 'Alterou permissуo do usuсrio $id', NOW(), '$hostname', '$ip')") 
or die (mysql_error());
//logs

echo alertatualizacao();

?>