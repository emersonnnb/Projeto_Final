<?php
session_start();

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
	$_SESSION['clientecpf'] = $dados['cpf'];
	$_SESSION['clientedtnasc'] = $dados['dtnasc'];
	$_SESSION['clientecep'] = $dados['cep'];
	$_SESSION['clienteendereco'] = $dados['endereco'];
	$_SESSION['clientenumero'] = $dados['numero'];
	$_SESSION['clientecomplemento'] = $dados['complemento'];
	$_SESSION['clientebairro'] = $dados['bairro'];
	$_SESSION['clientecidade'] = $dados['cidade'];
	$_SESSION['clienteestado'] = $dados['estado'];
	$_SESSION['clientetelefone'] = $dados['telefone'];
	$_SESSION['clientecelular'] = $dados['celular'];
	$_SESSION['clienteemail'] = $dados['email'];
	$_SESSION['clientesenha'] = $dados['senha'];
	$_SESSION['clienteimagem'] = $dados['imagem'];
	        header("location: index.php");
	     
} else {
	echo "<script>
	        alert('Cliente não encontrado');
	        location.href='../login.php';
	      </script>";
}

?>