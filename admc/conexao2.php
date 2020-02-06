<?php
$servidor = 'localhost';
$usuario  = 'root';
$senha 	  = '';
$banco 	  = '';
	try{
	  $conexao = new PDO('mysql:host='.$servidor.';dbname=comercio', $usuario, $senha);  
	  
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>