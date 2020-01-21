<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que estс executando a aчуo
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

@$codigo = utf8_decode($_POST['codigo']);
$nome = utf8_decode($_POST['nome']);
$descricao = utf8_decode($_POST['descricao']);
$unidade = $_POST['unidade'];
$precocompra = Moeda($_POST['precocompra']);
$precovenda = Moeda($_POST['precovenda']);
$estoqueminimo = $_POST['estoqueminimo'];
$estoqueatual = $_POST['estoqueatual'];
$codigobarra = utf8_decode($_POST['codigobarra']);
$vencimento1 = $_POST['vencimento1'];
$vencimento2 = $_POST['vencimento2'];
$status = $_POST['status'];
$id = $_POST['idProduto'];
 
if($id == ''){
    mysqli_query($conexao,"INSERT INTO produtos(codigo,nome,descricao,unidade,precocompra,precovenda,estoqueminimo,estoqueatual,codigobarra,vencimento1,vencimento2,datacad,usuariocad,status)
    VALUES('$codigo','$nome','$descricao',$unidade,$precocompra,$precovenda,'$estoqueminimo','$estoqueatual','$codigobarra','$vencimento1','$vencimento2', now(),'$usuario',1)") 
    or die (mysqli_error($conexao));

    //logs
    $sql = mysqli_query($conexao,"INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Cadastrou', 'Usuсrio', 'Usuсrio cadastrou usuсrio novo $nome', NOW(), '$hostname', '$ip')") 
    or die (mysqli_error($conexao));
    //logs

    echo alertsucesso();
}else{
    mysqli_query($conexao,"UPDATE produtos SET
    nome='$nome',
    descricao='$descricao',
    unidade='$unidade',
    precocompra='$precocompra',
    precovenda='$precovenda',
    estoqueminimo='$estoqueminimo',
    estoqueatual='$estoqueatual',
    codigobarra='$codigobarra',
    vencimento1='$vencimento1',
    vencimento2='$vencimento2',    
    status='$status'
    WHERE idProduto='$id'") or die (mysqli_error($conexao));

    //logs
    $sql = mysqli_query($conexao,"INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Alterou', 'Produto', 'Usuсrio alterou produto: $id, $nome', NOW(), '$hostname', '$ip')") 
    or die (mysqli_error($conexao));
    //logs

    echo alertatualizacao();
}


?>