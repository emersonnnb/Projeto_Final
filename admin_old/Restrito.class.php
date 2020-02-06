<?php 

require "Conexao.class.php";

class Restrito{
    
    public $id;
	public $nome;
    public $telefone;
    public $email;
    public $login;
    public $senha;
    
    public function autenticarUsuario(){
        $pdo = Conexao::conexao();
        $sql = "SELECT login,senha FROM acesso_restrito WHERE login = '$this->login' AND senha ='$this->senha'";
        $consulta = $pdo->query($sql);
        $dados = false;
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados = true;
        }
        return $dados;
    }
    
    
    public function inserir(){
    
        $pdo = Conexao::conexao();
        $sql = 'Insert into acesso_restrito values(default, :nome, :telefone, :email, :login, :senha)';
        $stmt = $pdo->prepare($sql);

        $stmt->execute(array(
        ':nome' => $this->nome,
        ':telefone' => $this->telefone,
        ':email' => $this->email,
        ':login' => $this->login,
        ':senha' => $this->senha
         
    ));    
}
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM acesso_restrito;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "id" => $linha['pk_restrito'],
            "nome" => $linha['nome'],
            "telefone" => $linha['telefone'],
            "email" => $linha['email'],    
            "login" => $linha['login'],    
            "senha" => $linha['senha']   
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    
         public function pesquisarPorNome($nome){
        $pdo = Conexao::conexao();
        
        $sql = "SELECT * FROM acesso_restrito WHERE login like '%$nome%'";
        $consulta = $pdo->query($sql);
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
                "id" => $linha['pk_restrito'],
                "nome" => $linha['nome'],
                "telefone" => $linha['telefone'],
                "email" => $linha['email'],
                "login" => $linha['login'],
                "senha" => $linha['senha'],
                
               
            );     
        }
        $pdo = null;
        return $dados;
    }
	
	
	public function visualizar($restrito){
        $pdo = Conexao::conexao();
        $sql = "SELECT * FROM acesso_restrito where pk_restrito =".$restrito->getId();
        $consulta = $pdo->query($sql);
        
        $dados = null;
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados = new Restrito();
            $dados -> $linha['pk_restrito'];
            $dados -> $linha['nome'];
            $dados -> $linha['telefone'];
            $dados -> $linha['email'];
            $dados -> $linha['login'];
            $dados -> $linha['senha'];
           
            
        }
        $pdo = null;
        return $dados;
        
        
        }
	
	
	
	
	
	
    
    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM acesso_restrito WHERE pk_restrito = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id'=>$this->id
        ));        
        
    }
    
     public function loginExiste(){
        $pdo = Conexao::conexao();
        $sql = "SELECT * FROM acesso_restrito WHERE login = '$this->login'";
        $consulta = $pdo->query($sql);
        $total = $consulta->rowCount();
        
        if($total>0){
            return true;
        }else{
            return false;    
        }
    }
    
}
    
    
    
    
