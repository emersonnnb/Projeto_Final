<?php 
require "Conexao.class.php";
class Cliente{ 
    public $codcliente;
	public $nome;
	public $cpf;
	public $dtnasc;
	public $cep;
	public $endereco;
	public $numero;
	public $complemento;
	public $bairro;
	public $cidade;
	public $estado;

	public $celular;
    public $email;
    public $senha;
	public $imagem;
    
    public function autenticarCliente(){
        $pdo = Conexao::conexao();
        $sql = "SELECT email,senha FROM cliente WHERE email = '$this->email' AND senha ='$this->senha'";
        $consulta = $pdo->query($sql);
        $dados = false;
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados = true;
        }
        return $dados;
    }
    
    
    public function inserir(){
    
        $pdo = Conexao::conexao();
        $sql = 'Insert into cliente values(default, :nome, :cpf, :dtnasc, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :estado, :celular, :email, :senha, :imagem)';
        $stmt = $pdo->prepare($sql);

        $stmt->execute(array(
        ':nome' => $this->nome,
		':cpf' => $this->cpf,
		':dtnasc' => $this->dtnasc,
		':cep' => $this->cep,
		':endereco' => $this->endereco,
		':numero' => $this->numero,
		':complemento' => $this->complemento,
		':bairro' => $this->bairro,
		':cidade' => $this->cidade,
		':estado' => $this->estado,
	
		':celular' => $this->celular,
        ':email' => $this->email,
        ':senha' => $this->senha,
		':imagem' => $this->imagem
         
    ));    
}
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM cliente;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codcliente" => $linha['codcliente'],
            "nome" => $linha['nome'],
			"cpf" => $linha['cpf'],
			"dtnasc" => $linha['dtnasc'],
			"cep" => $linha['cep'],
			"endereco" => $linha['endereco'],
			"numero" => $linha['numero'],
			"complemento" => $linha['complemento'],
		    "bairro" => $linha['bairro'],
			"cidade" => $linha['cidade'],
		    "estado" => $linha['estado'],
		
			"celular" => $linha['celular'],
            "email" => $linha['email'],    
            "senha" => $linha['senha'],
			"imagem" => $linha['imagem']
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    
       public function pesquisarPorNome($nome){
        $pdo = Conexao::conexao();
        
        $sql = "SELECT * FROM cliente WHERE nome like '%$nome%'";
        $consulta = $pdo->query($sql);
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
			
            "codcliente" => $linha['codcliente'],
            "nome" => $linha['nome'],
			"cpf" => $linha['cpf'],
			"dtnasc" => $linha['dtnasc'],
			"cep" => $linha['cep'],
			"endereco" => $linha['endereco'],
			"numero" => $linha['numero'],
			"complemento" => $linha['complemento'],
		    "bairro" => $linha['bairro'],
			"cidade" => $linha['cidade'],
		    "estado" => $linha['estado'],
			
			"celular" => $linha['celular'],
            "email" => $linha['email'],    
            "senha" => $linha['senha'],
			"imagem" => $linha['imagem']
                
               
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM cliente WHERE codcliente = :codcliente';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codcliente'=>$this->codcliente
        ));        
        
    }
    
 
    
}
    
    
    
    
