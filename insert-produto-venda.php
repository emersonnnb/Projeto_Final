<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que est� executando a a��o
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
    mysqli_query($conexao,"INSERT INTO vendas (id_venda,codigobarra,nome_produto,quantidade_produto,
    valor_produto,valor_total_produto,id_usuario,data_venda,caixa_venda,situacao) 
    VALUES ('$id_venda','$codigobarra','$nome_produto','$quantidade','$precovenda',
    '$valor_total_produto','$iduser',NOW(),'$caixa','$situacao')") or die (mysqli_error($conexao));

    $sql_p = mysqli_query($conexao,"SELECT * FROM produtos WHERE idProduto='$codigobarra'") or die (mysqli_error($conexao));
    $dados_p = mysqli_fetch_array($sql_p);
    $resto = $dados_p['estoqueatual'] - $quantidade;

    mysqli_query($conexao,"UPDATE produtos SET estoqueatual='$resto' WHERE codigobarra='$codigobarra'") or die (mysqli_error($conexao));

    //logs
    $sql = mysqli_query($conexao,"INSERT INTO logs 
    (usuario, tipo, tabela, descricao, datatime, pc, ip) VALUES 
    ('$usuario', 'Venda', 'Vendas', 'Usu�rio vendeu novo produto $nome_produto, QUANT:$quantidade', NOW(), '$hostname', '$ip')") 
    or die (mysqli_error($conexao));
    //logs

    }else{ echo "<script>alert('Estoque menor do que estoque atual');</script>";}

echo "<script>history.back();</script>";

//aqui em baixo entrar o c�digos de altera��o do produto




?>