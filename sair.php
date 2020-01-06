<?php
ob_start();
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que está executando a ação
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

//logs
$sql = mysql_query("INSERT INTO logs 
(usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
('$usuario', 'Saiu', 'Usuário', '$usuario saiu do sistema', NOW(), '$hostname', '$ip')") 
or die (mysql_error());
//logs


session_unset();
session_destroy(); //destroi sessão do usuário
ob_end_clean();// Já podemos encerrar o buffer e limpar tudo que há nele*/
echo "<script>location.href='login.php'</script>";
?>
