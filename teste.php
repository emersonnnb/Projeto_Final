<?php
include('conexao.php');

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM usuario WHERE id='$id'") or die (mysql_error());
$dados = mysql_fetch_array($sql);

echo $dados['nome'];


?>