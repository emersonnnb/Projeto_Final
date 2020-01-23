<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que est� executando a a��o
$caixa = $_SESSION['caixa'];
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

@$codigo = $_POST['codigo']; 
$idvenda = $_POST['id_venda'];
 $valor_cartao = Moeda($_POST['valor_cartao']);
 $valor_dinheiro = Moeda($_POST['valor_dinheiro']);
 $valor_recebido = Moeda($_POST['valor_recebido']);
 $valor_compra = Moeda($_POST['valor_compra']);
 $valor_troco = Moeda($_POST['valor_troco']);
 $situacao = 'fechada';

mysqli_query($conexao,"INSERT INTO movcaixa (id_produto,idCaixa,idVenda,valorCartao,valorDinheiro,valorRecebido,valorCompra,valorTroco,id_usuario,dataMov,situacao) 
VALUES ('$codigo','$caixa','$idvenda','$valor_cartao','$valor_dinheiro','$valor_recebido','$valor_compra',
'$valor_troco','$iduser',NOW(),'$situacao')") or die (mysqli_error($conexao));

/* fechar vendas */
mysql_query("UPDATE vendas SET situacao='$situacao' WHERE id_venda='$idvenda'") or die (mysql_error());

    //logs
    $sql = mysqli_query($conexao,"INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Caixa', 'Fechou', 'Usu�rio fechou venda: $idvenda, valor total: $valor_compra', NOW(), '$hostname', '$ip')") 
    or die (mysqli_error());
    //logs

    echo "<script>location.href='pdv.php?imprimir=".$idvenda."';</script>";	
?>