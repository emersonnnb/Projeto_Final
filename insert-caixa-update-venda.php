<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que está executando a ação
$caixa = $_SESSION['caixa'];
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

 $idvenda = $_POST['id_venda'];
 $valor_cartao = Moeda($_POST['valor_cartao']);
 $valor_dinheiro = Moeda($_POST['valor_dinheiro']);
 $valor_recebido = Moeda($_POST['valor_recebido']);
 $valor_compra = Moeda($_POST['valor_compra']);
 $valor_troco = Moeda($_POST['valor_troco']);
 $situacao = 'fechada';

mysql_query("INSERT INTO caixa (id_caixa,id_venda,valor_cartao,valor_dinheiro,valor_recebido,valor_compra,valor_troco,
id_usuario,data_caixa,situacao) VALUES ('$caixa','$idvenda','$valor_cartao','$valor_dinheiro','$valor_recebido','$valor_compra',
'$valor_troco','$iduser',NOW(),'$situacao')") or die (mysql_error());

/* fechar vendas */
mysql_query("UPDATE vendas SET situacao='$situacao' WHERE id_venda='$idvenda'") or die (mysql_error());

    //logs
    $sql = mysql_query("INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Caixa', 'Fechou', 'Usuário fechou venda: $idvenda, valor total: $valor_compra', NOW(), '$hostname', '$ip')") 
    or die (mysql_error());
    //logs

    echo "<script>location.href='pdv.php?imprimir=".$idvenda."';</script>";	
?>