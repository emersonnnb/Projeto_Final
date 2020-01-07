<?php
ob_start();
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que est� executando a a��o
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

//logs
$sql = mysqli_query($conexao,"INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Saiu', 'Usu�rio', '$usuario saiu do sistema', NOW(), '$hostname', '$ip')") 
or die (mysql_error());
//logs


session_unset();
session_destroy(); //destroi sess�o do usu�rio
ob_end_clean();// J� podemos encerrar o buffer e limpar tudo que h� nele*/
echo "<script>location.href='login.php'</script>";
?>
