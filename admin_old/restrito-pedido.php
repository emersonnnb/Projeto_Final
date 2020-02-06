<?php

// para mostrar os erros (padrão)
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

try{
    
	if($_SERVER['REQUEST_METHOD'] != 'POST')
    header("Location: form-restrito.php");
    
   // Variáveis ligando ao formulário
$codpedido = $_POST['codpedido'];
    if($codpedido=="") throw new Exception("Cod Peddido Inválido!");
    
$qtl = $_POST['qtl'];
    if($qtl=="") throw new Exception("Quantidade Inválido!");
    
$preco = $_POST['preco'];
    if($preco=="") throw new Exception("Preço Inválido");
	
$total = $_POST['total'];
    if($total=="") throw new Exception("Total Inválido");
	
$codcliente = $_POST['codcliente'];
    if($codcliente=="") throw new Exception("Cod Cliente Inválida");
	
$codproduto = $_POST['codproduto'];
    if($codproduto=="") throw new Exception("Cod Produto Inválida");
	
$codcfucionario = $_POST['codfucionario'];
    if($codfucionario=="") throw new Exception("Cod Fucionario Inválida");
	
	
	
	
   
// inclue a conexao e faz a instancia (padrão) // 
require_once "Restrito.class.php";

    $restrito = new Restrito(); 
	$restrito->codpedido = $codpedido;
	$restrito->qtd = $qtd;
	$restrito->preco = $preco;
    $restrito->total = $total;
	$restrito->codcliente = $codcliente;
	$restrito->codproduto = $codproduto;
	$restrito->codfucionario = $codcfucionario;
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
	
	
	