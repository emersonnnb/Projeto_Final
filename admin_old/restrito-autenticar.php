<?php
    session_start();
    require "Restrito.class.php";
    
    try{
    
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        
        $restrito = new Restrito();
        $restrito->login = $login;
        $restrito->senha = $senha;
        
        if(!$restrito->autenticarUsuario()) throw new Exception("Usuário Inválido");
		
        
		 
        $msg = "Usuário Autenticado";
        $_SESSION['login'] = $restrito->login;
        header("location: index.php");
     
    }catch(Exception $e){
        $msg = $e->getMessage();
    }

?>

<?php echo $msg; ?>