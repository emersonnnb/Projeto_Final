<?php $title ="Pesquisa de produtos"; ?>
<?php include "includes/header.php" ?>
  
    <div class="col-md-10">
		  	<div class="row">
		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Pesquisa Produtos</h1>
			</div>
			
			
			<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  	<div class="panel-body">
				<form class="form-system" method="post" 
					  action="produto-pesquisa-nome.php">

					<div class="form-group">
							<label class="col-sm-1 control-label">Descrição</label>
							<div class="col-sm-3">
								<input type="text"  name="descricao" class="form-control"/>
							</div>
							
							
					</div>		
					
					
			<label></label>
			<input type="submit"  class="btn btn-warning" name="botao" value="Pesquisar" /> 
		</form>
        </div>
		</div>
		</div>
		</div></div></div>
</section>
    
    <?php include "includes/footer.php"; ?>
    
