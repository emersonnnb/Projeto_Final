<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que estс executando a aчуo
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$nome_empresa = utf8_decode($_POST['nome_empresa']);
$cpf_cnpj = $_POST['cpf_cnpj'];
$endereco_empresa = utf8_decode($_POST['endereco_empresa']);
$bairro_empresa = utf8_decode($_POST['bairro_empresa']);
$cidade_empresa = utf8_decode($_POST['cidade_empresa']);
$uf_empresa = strtoupper($_POST['uf_empresa']);
$contato_empresa = $_POST['contato_empresa'];

    mysql_query("UPDATE empresa SET
    nome_empresa='$nome_empresa',
    cpf_cnpj='$cpf_cnpj',
    endereco_empresa='$endereco_empresa',
    bairro_empresa='$bairro_empresa',
    cidade_empresa='$cidade_empresa',
    uf_empresa='$uf_empresa',
    contato_empresa='$contato_empresa'
    WHERE id_empresa=1") or die (mysql_error());

    //logs
    $sql = mysql_query("INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Alterou', 'Empresa', 'Usuсrio alterou dados da empresa', NOW(), '$hostname', '$ip')") 
    or die (mysql_error());
    //logs

    echo alertatualizacao();

?>