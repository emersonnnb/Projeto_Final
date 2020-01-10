<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que est� executando a a��o
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$codigobarra = utf8_decode($_POST['codigobarra']);
$nome = utf8_decode($_POST['nome']);
$unidade = $_POST['unidade'];
$precocompra = Moeda($_POST['precocompra']);
$precovenda = Moeda($_POST['precovenda']);
$estoqueminimo = $_POST['estoqueminimo'];
$estoqueatual = $_POST['estoqueatual'];
$vencimento1 = $_POST['vencimento1'];
$vencimento2 = $_POST['vencimento2'];
$vencimento3 = $_POST['vencimento3'];
@$status = $_POST['status'];
@$id = $_POST['id'];
 
if($id == ''){
    mysqli_query($conexao,"INSERT INTO produtos
    (codigobarra,nome,unidade,precocompra,precovenda,estoqueminimo,estoqueatual,
    vencimento1,vencimento2,vencimento3,datacad,usuariocad) 
    VALUES ('$codigobarra','$nome','$unidade','$precocompra','$precovenda',
    '$estoqueminimo','$estoqueatual','$vencimento1','$vencimento2','$vencimento3',NOW(),'$usuario')
    ") or die (mysqli_error($conexao));

    //logs
    $sql = mysqli_query($conexao,"INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Cadastrou', 'Produto', 'Usu�rio cadastrou $nome', NOW(), '$hostname', '$ip')") 
    or die (mysqli_error($conexao));
    //logs

    echo alertsucesso();
}else{
    mysqli_query($conexao,"UPDATE produtos SET
    codigobarra='$codigobarra',
    nome='$nome',
    unidade='$unidade',
    precocompra='$precocompra',
    precovenda='$precovenda',
    estoqueminimo='$estoqueminimo',
    estoqueatual='$estoqueatual',
    vencimento1='$vencimento1',
    vencimento2='$vencimento2',
    vencimento3='$vencimento3',
    status='$status'
    WHERE id='$id'") or die (mysqli_error($conexao));

    //logs
    $sql = mysqli_query($conexao,"INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Alterou', 'Produto', 'Usu�rio alterou produto: $id, $nome', NOW(), '$hostname', '$ip')") 
    or die (mysql_error($conexao));
    //logs

    echo alertatualizacao();
}


?>