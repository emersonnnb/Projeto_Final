<?php

// para mostrar os erros (padrão)
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

try{
    
	if($_SERVER['REQUEST_METHOD'] != 'POST')
    header("Location: form-restrito.php");
    
   // Variáveis ligando ao formulário
$nome = $_POST['nome'];
    if($nome=="") throw new Exception("Login Inválido!");
    
$email = $_POST['email'];
    if($email=="") throw new Exception("email Inválido!");
    
$telefone = $_POST['telefone'];
    if($telefone=="") throw new Exception("telefone Inválido");
	
$login = $_POST['login'];
    if($login=="") throw new Exception("Login Inválido");
	
$senha = $_POST['senha'];
    if($senha=="") throw new Exception("Senha Inválida");
	
	
	
	
   
// inclue a conexao e faz a instancia (padrão) // 
require_once "Restrito.class.php";

    $restrito = new Restrito(); 
	$restrito->nome = $nome;
	$restrito->telefone = $telefone;
	$restrito->email = $email;
    $restrito->login = $login;
        if($restrito->loginExiste()) throw new Exception ("O Usuário já existe!");
    $restrito->senha = $senha;
    $restrito->inserir();    	
	
    
   
    $msg = "Cadastrado com sucesso";

}catch(PDOException $e){
    $msg = "Contate o administrador";   
    echo $e->getMessage();
}catch(Exception $e){
    $msg = $e->getMessage();
}

?>
    
    
   <?php require "includes/header.php" ?>

<?php $title ="Cadastro"; ?>

<section class="container">
    
    <?php echo $msg; ?>
    
</section>


    <?php require "includes/footer.php" ?>
	
	
	