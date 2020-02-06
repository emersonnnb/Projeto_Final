<?php
   include ('header2.php');
?>
 <hr>
 <?php
 include('conexao.php');  
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
    $sql = "SELECT * from produto";
    $resultado = mysqli_query($conexao, $sql);
    $total_produto = mysqli_num_rows($resultado);
    $quantidade_pg = 12;
    $num_pagina = ceil($total_produto/$quantidade_pg);
    $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
    $sqls = "SELECT * FROM produto limit $inicio, $quantidade_pg";   
    $resultados = mysqli_query($conexao, $sqls);    
    $total_produto = mysqli_num_rows($resultados);
        ?>

    <div class="container" style="width:100%;">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h1>Produto</h1>
            </div>
      <div class="col-sm-6 col-md-6">
        <form class="form-inline" method="GET" action="pesquisar.php">
          <div class="form-group">
            <label for="exampleInputName2"></label>
            <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Digite sua pesquisa...">
          </div>
		      <button type="submit" class="btn btn-danger">Pesquisar</button>
			  </form>
			</div>
           <hr>
        </div><br><br>
      <div class="row">
        <?php while ( $dados = mysqli_fetch_assoc($resultados) ) { ?>
        <div class="col-sm-3">
         <a href="produtop.php?codproduto=<?= $dados['codproduto']; ?>">
            <div class="card"   >
              <div class="card-body">
                <img class="card-img-top" src="fotosprodutos/<?= $dados['imagem']; ?>" style="width:80%;" alt="Card image cap"> 
               
                <p id='cartoes' class="card-title"><b><?php echo $dados['descricao'] ?></b></p>
                  <p class="card-text"><strong><?php echo $dados['categoria'] ?></strong></p>
                  <h5><p class="cart-text">POR: R$ <?php echo $dados['preco'] ?></p></h5>
                  <a href="carrinho.php?acao=add&codproduto=<?= $dados['codproduto']; ?>" id="botao" class="btn btn-danger" role="button" value="<?= $dados['codproduto']; ?>">Comprar</a>

                </div>
           </div></a>
        </div>
        <?php } ?>
      </div>
   </div>
        
</div>

        <?php
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
        ?>
        
        <nav class="nav">
        <div class="container">
         <div class="row-fluid">
          <ul class="pagination justify-content-center">
            <li class="page-item">
            
                <?php
				if($pagina_anterior != 0){ ?>
                
              <a class="page-link" href="comprar.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                <span aria-hidden="true"><i class="fa fa-backward"></i></span>
                  </a>
                <?php }else{ ?>
                <span class="sr-only">Previous</span>
              <?php }  ?>
            </li>
             
              	<?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li class="page-item"><a class="page-link" href="comprar.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php } ?>
              
              <?php
                if($pagina_posterior <= $num_pagina){ ?>
                <li class="page-item">  
               <a class="page-link" href="comprar.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                <span aria-hidden="true"><i class="fa fa-forward"></i></span>
                    </a>
                  <?php }else{ ?>
                <span class="sr-only">Next</span>
              <?php }  ?>
            </li>
          </ul>
          </div>
          </div>
        </nav>
        
    </div>

    
      <?php include "footer.php";?>