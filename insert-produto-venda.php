<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que está executando a ação
$caixa = $_SESSION['caixa'];
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$id_venda = $_POST['id_venda'];
$codigobarra = $_POST['codigobarra'];
$nome_produto = $_POST['nome_produto'];
//calcular valor total do produto
$precovenda = Moeda($_POST['precovenda']);
$estoqueatual = $_POST['estoqueatual'];
$quantidade = $_POST['quantidade'];
$valor_total_produto = $quantidade * $precovenda;
$situacao = 'aberta';

    if($estoqueatual >= $quantidade){
    mysql_query("INSERT INTO vendas (id_venda,codigobarra,nome_produto,quantidade_produto,
    valor_produto,valor_total_produto,id_usuario,data_venda,caixa_venda,situacao) 
    VALUES ('$id_venda','$codigobarra','$nome_produto','$quantidade','$precovenda',
    '$valor_total_produto','$iduser',NOW(),'$caixa','$situacao')") or die (mysql_error());

    $sql_p = mysql_query("SELECT * FROM produtos WHERE codigobarra='$codigobarra'") or die (mysql_error());
    $dados_p = mysql_fetch_array($sql_p);
    $resto = $dados_p['estoqueatual'] - $quantidade;

    mysql_query("UPDATE produtos SET estoqueatual='$resto' WHERE codigobarra='$codigobarra'") or die (mysql_error());

    //logs
    $sql = mysql_query("INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Venda', 'Vendas', 'Usuário vendeu novo produto $nome_produto, QUANT:$quantidade', NOW(), '$hostname', '$ip')") 
    or die (mysql_error());
    //logs

    }else{ echo "<script>alert('Estoque menor do que estoque atual');</script>";}

echo "<script>history.back();</script>";

//aqui em baixo entrar o códigos de alteração do produto




?>