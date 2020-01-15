<?php
$banco="bd_pdv2";
$usuario="root";
$senha="";
$hostname='localhost';
$conexao = mysqli_connect($hostname,$usuario,$senha,$banco) or die ("Nao Foi possivel conectar ao Banco MySQL");
//$conn = mysqli_connect($hostname,$usuario,$senha,$banco);

@header('Content-Type: text/html; charset=iso-8859-1');
ini_set('default_charset','UTF-8');
mysqli_query($conexao,"SET NAMES 'iso-8859-1'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=iso-8859-1');
mysqli_query($conexao,'SET character_set_results=iso-8859-1');
?>