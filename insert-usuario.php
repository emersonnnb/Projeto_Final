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

    mysqli_query($conexao,"INSERT INTO usuario (nome,cpf,senha,caixa) VALUES ('$nome','$cpf','$senha','$caixa')") or die (mysqli_error($conexao));

    //logs
    $sql = mysqli_query($conexao,"INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Cadastrou', 'Usuсrio', 'Usuсrio cadastrou usuсrio novo $nome', NOW(), '$hostname', '$ip')") 
    or die (mysqli_error($conexao));
    //logs

    echo alertsucesso();

?>