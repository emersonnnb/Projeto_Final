<?php
session_start();
 if(!isset($_SESSION['carrinho']));  
include('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select * from cliente where email='$email' and senha='$senha'";

$resultado = mysqli_query($conexao, $sql);
$total     = mysqli_num_rows($resultado);

if ( $total>0 ) {
	$dados = mysqli_fetch_array($resultado);
	$_SESSION['cliente']       = $dados['codcliente'];
	$_SESSION['clientenome']  = $dados['nome'];
	$_SESSION['clientecpf']  = $dados['cpf'];
	
	$_SESSION['clienteemail'] = $dados['email'];
	$_SESSION['clientesenha'] = $dados['senha'];
	echo "<script>
	        location.href='admc/index.php';
	      </script>";
} else {
	echo "<script>
	        alert('Cliente não encontrado');
	        location.href='../login.php';
	      </script>";
}

?>




