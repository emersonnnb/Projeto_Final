<?php 

require "Conexao.class.php";

class Produto{
    
    public $codproduto;
	public $descricao;
  
    public $categoria;
    public $preco;
    public $imagem;
    
 
    
    public function inserir(){
    
        $pdo = Conexao::conexao();
        $sql = 'Insert into produto values(default, :descricao, :categoria, :preco, :imagem)';
        $stmt = $pdo->prepare($sql);

        $stmt->execute(array(
        ':descricao' => $this->descricao,
      
        ':categoria' => $this->categoria,
        ':preco' => $this->preco,
        ':imagem' => $this->imagem
         
    ));    
}
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM produto;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codproduto" => $linha['codproduto'],
            "descricao" => $linha['descricao'],
            "categoria" => $linha['categoria'],
            "preco" => $linha['preco'],       
            "imagem" => $linha['imagem']   
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    
         public function pesquisarPorNome($descricao){
        $pdo = Conexao::conexao();
        
        $sql = "SELECT * FROM produto WHERE descricao like '%$descricao%'";
        $consulta = $pdo->query($sql);
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
                "codproduto" => $linha['codproduto'],
                "descricao" => $linha['descricao'],
                "categoria" => $linha['categoria'],
                "preco" => $linha['preco'],
                "imagem" => $linha['imagem'],
                
               
            );     
        }
        $pdo = null;
        return $dados;
    }
    
	public function visualizar($produto){
        $pdo = Conexao::conexao();
        $sql = "SELECT * FROM produto where codproduto =".$codproduto->getcodproduto();
        $consulta = $pdo->query($sql);
        
        $dados = null;
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados = new Produto();
            $dados -> $linha['codproduto'];
            $dados -> $linha['descricao'];
        
            $dados -> $linha['categoria'];
            $dados -> $linha['preco'];
            $dados -> $linha['imagem'];
           
            
        }
        $pdo = null;
        return $dados;
        
        
        }
	
    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM produto WHERE codproduto = :codproduto';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codproduto'=>$this->codproduto
        ));        
        
    }
    
   
    
}
    
    
    
    
