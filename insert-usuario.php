<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que estс executando a aчуo
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$nome = utf8_decode($_POST['nome']);
$cpf = $_POST['cpf'];
$senha = md5(utf8_decode($_POST['senha']));
$caixa = $_POST['caixa'];

    mysql_query("INSERT INTO usuario (nome,cpf,senha,caixa) VALUES ('$nome','$cpf','$senha','$caixa')") or die (mysql_error());

    //logs
    $sql = mysql_query("INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Cadastrou', 'Usuсrio', 'Usuсrio cadastrou usuсrio novo $nome', NOW(), '$hostname', '$ip')") 
    or die (mysql_error());
    //logs

    echo alertsucesso();

?>