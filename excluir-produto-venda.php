<?php
include('conexao.php');

$id = $_GET['id']; //id da venda
//select na venda
$sql = mysqli_query($conexao,"SELECT * FROM vendas WHERE id='$id'") or die (mysqli_error($conexao));
$dados_venda = mysqli_fetch_array($sql);
$codigobarra = $dados_venda['codigobarra'];
$quantidade_venda =  $dados_venda['quantidade_produto'];

//select no estoque atual
$sql_e = mysqli_query($conexao,"SELECT * FROM produtos WHERE id='$codigobarra'") or die (mysqli_error($conexao));
$dados_e = mysqli_fetch_array($sql_e);
$estoque_atual = $dados_e['estoqueatual'];

//retorno ao estoque
$atualizaestoque = $quantidade_venda + $estoque_atual;
mysqli_query($conexao,"UPDATE produtos SET estoqueatual='$atualizaestoque' WHERE codigobarra='$codigobarra'") or die (mysqli_error($conexao));

//exclui o produto da venda
mysqli_query($conexao,"DELETE FROM vendas WHERE id='$id'") or die (mysqli_error($conexao));

echo"<script>history.back();</script>";

?>