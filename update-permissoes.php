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
mysqli_query($conexao,"UPDATE permissoes SET valor='' WHERE id_usuario='$id'") or die (mysqli_error($conexao));
if(isset($_POST['permissoes'])!=''){foreach($_POST['permissoes'] as $item) { Permissao($item,$id);}}

//logs
mysqli_query($conexao,"INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Alterou', 'Usuarios', 'Alterou permissуo do usuсrio $id', NOW(), '$hostname', '$ip')") 
or die (mysqli_error($conexao));
//logs

echo alertatualizacao();

?>