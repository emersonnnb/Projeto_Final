<?php
include('conexao.php');

$id = $_GET['id']; //id da venda
//select na venda
$sql = mysql_query("SELECT * FROM vendas WHERE id='$id'") or die (mysql_error());
$dados_venda = mysql_fetch_array($sql);
$codigobarra = $dados_venda['codigobarra'];
$quantidade_venda =  $dados_venda['quantidade_produto'];

//select no estoque atual
$sql_e = mysql_query("SELECT * FROM produtos WHERE codigobarra='$codigobarra'") or die (mysql_error());
$dados_e = mysql_fetch_array($sql_e);
$estoque_atual = $dados_e['estoqueatual'];

//retorno ao estoque
$atualizaestoque = $quantidade_venda + $estoque_atual;
mysql_query("UPDATE produtos SET estoqueatual='$atualizaestoque' WHERE codigobarra='$codigobarra'") or die (mysql_error());

//exclui o produto da venda
mysql_query("DELETE FROM vendas WHERE id='$id'") or die (mysql_error());

echo"<script>history.back();</script>";

?>