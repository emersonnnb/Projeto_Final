   <?php require "includes/header.php" ?>


  <div class="col-md-10">
		  	<div class="row" style="background-color: white; border-radius: 2em; padding: 2em;">
		<div class="col-md-12">
		  			<div class="content-box-large" >
		  				<div class="panel-heading">
							<div class="panel-title">
				  <h1>Cadastre o Usuário Restrito</h1>
			</div>
			
			
			<div class="panel-options">
								<a href="restrito-lista.php"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
					<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  	<div class="panel-body">
			<form class="form-horizontal" method="post" action="restrito-cadastrar.php" enctype="multipart/form-data">
			
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome:</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="text" name="email" class="form-control">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Telefone</label>
					<div class="col-sm-10">
						<input type="text" name="telefone" class="form-control"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Login</label>
					<div class="col-sm-10">
						<input type="text" name="login" class="form-control"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-10">
						<input type="text" name="senha" class="form-control"/>
					</div>
				</div>
				
					
				<input type="hidden" name="id" value="<?php echo $row_restrito['pk_restrito']; ?>">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-warning">Cadastrar</button>
					</div>
				</div>
			</form>
		
		</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>
		
		
		
		
		
		
		
		
    </section>

     <?php require "includes/footer.php" ?>                                                                     