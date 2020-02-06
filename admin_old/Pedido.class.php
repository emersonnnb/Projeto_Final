<?php 

require "Conexao.class.php";

class Pedido{
    
    public $codpedido;
	public $qtd;
 
    public $sub;
    public $total;
    public $codcliente;
    public $codproduto;
    public $datacompra;
    
    public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM pedido;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codpedido" => $linha['codpedido'],
            "qtd" => $linha['qtd'],
          
            "sub" => $linha['sub'],
            "total" => $linha['total'],
            "codcliente" => $linha['codcliente'],
            "codproduto" => $linha['codproduto'],       
            "datacompra" => $linha['datacompra'],   
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
     public function pesquisarPorNome($codcliente){
        $pdo = Conexao::conexao();
        
        $sql = "SELECT * FROM pedido where codcliente =".$codcliente;
        $consulta = $pdo->query($sql);
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codpedido" => $linha['codpedido'],
            "qtd" => $linha['qtd'],
  
            "sub" => $linha['sub'],
            "total" => $linha['total'],       
            "codcliente" => $linha['codcliente'], 
            "codproduto" => $linha['codproduto'],
			"datacompra" => $linha['datacompra']
               
             
            );     
        }
        $pdo = null;
        return $dados;
    }

    
        public function pesquisarcodpedido($codpedido){
        $pdo = Conexao::conexao();    
        $sql = "SELECT * FROM pedido where codpedido ='$codpedido'";
        $consulta = $pdo->query($sql);   
         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
                "codpedido" => $linha['codpedido'],
                "qtd" => $linha['qtd'],
              
                "sub" => $linha['sub'],
                "total" => $linha['total'],
                "codcliente" => $linha['codcliente'],
                "codproduto" => $linha['codproduto'],
               "datacompra" => $linha['datacompra'],
            );     
        }
        $pdo = null;
        return $dados;
    }
         
    
	public function visualizar($pedido){
        $pdo = Conexao::conexao();
        $sql = "SELECT * FROM pedido where codpedido ='$codpedido'";
        $consulta = $pdo->query($sql);
        $dados = null;
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados = new pedido();
            $dados -> $linha['codpedido'];
            $dados -> $linha['qtd'];
    
            $dados -> $linha['sub'];
            $dados -> $linha['total'];
            $dados -> $linha['codcliente'];
            $dados -> $linha['codproduto'];
            $dados -> $linha['datacompra'];
           
            
        }
        $pdo = null;
        return $dados;
        
        
        }
	
    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM pedido WHERE codpedido = :codpedido';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codpedido'=>$this->codpedido
        ));        
        
    }
    
   
    
}
    
    
    
    
