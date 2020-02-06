<?php

// para mostrar os erros (padrão)
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

try{
    
	if($_SERVER['REQUEST_METHOD'] != 'POST')
    header("Location: form-cliente.php");
    
   // Variáveis ligando ao formulário
$nome = $_POST['nome'];
    if($nome=="") throw new Exception("nomeInválido!");
    

    
$email = $_POST['email'];
    if($email=="") throw new Exception("email Inválido");
	

	
$senha = $_POST['senha'];
    if($senha=="") throw new Exception("Senha Inválida");
	
	
	
	
   
// inclue a conexao e faz a instancia (padrão) // 
require_once "Cliente.class.php";

    $cliente = new Cliente(); 
	$cliente->nome = $nome;
	$cliente->cpf = $cpf;
	$cliente->dtnasc = $dtnasc;
	$cliente->cep = $cep;
	$cliente->endereco = $endereco;
	$cliente->numero = $numero;
	$cliente->complemento = $complemento;
	$cliente->bairro = $bairro;
	$cliente->cidade = $cidade;
	$cliente->estado = $estado;
	
	$cliente->celular = $celular;
	$cliente->email = $email;  
    $cliente->senha = $senha;
	$cliente->imagem = $imagem;
    $cliente->inserir();    	
	
    
   
    $msg = "Cadastrado com sucesso";

}catch(PDOException $e){
    $msg = "Contate o administrador";   
    echo $e->getMessage();
}catch(Exception $e){
    $msg = $e->getMessage();
}

?>
    
    


<?php $title ="Cadastro"; ?>

<section class="container">
    
    <?php echo $msg; ?>
    
</section>


    
	
	
	