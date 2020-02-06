
<?php
    require_once "Cliente.class.php";
    $cliente = new Cliente ();
    $dados = $cliente->lista();
?> 

<?php $title = "Listagem de Clientes"; ?>
<?php require "includes/header.php" ?>

<div class="col-md-10">
<div class="row">
<div class="col-md-12">

<div class="content-box-large">
<div class="panel-heading">
<div class="panel-title">
<h1>Listagem de Clientes</h1>
</div>
			
<div class="panel-options">
	<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
	<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
</div>
</div>
<div class="panel-body">
      <?php if($dados==null){ ?>
            <p>Nenhum cliente cadastrado</p>
        
        <?php } else{ ?>
        
<div class="table-responsive">
		  					<table class="table table-strip">
				              <thead>
				                <tr>
				                 	<th width="30">NOME</th>
				<th width="10">CPF</th>
				<th width="15">Nascimento</th>
				<th width="12">CEP</th>
				<th width="30">Endereço</th>
				<th width="13">Número</th>
				<th width="30">Complemento</th>
				<th width="30">Bairro</th>
				<th width="30">Cidade</th>
				<th width="4">Estado</th>
			
				<th width="14">Celular</th>
				<th width="10">E-mail</th>
				<th width="12">Senha</th>
				<th width="30">Imagem</th>
								  
				                </tr>
				              </thead>
				               <?php
    
								
								 foreach($dados as $dado => $coluna){
												echo "<tr>";
												 
												echo "<td>".$coluna['nome']."</td>";
												echo "<td>".$coluna['cpf']."</td>";
												echo "<td>".$coluna['dtnasc']."</td>";
													echo "<td>".$coluna['cep']."</td>";
												echo "<td>".$coluna['endereco']."</td>";
												echo "<td>".$coluna['numero']."</td>";
												echo "<td>".$coluna['complemento']."</td>";
												echo "<td>".$coluna['bairro']."</td>";
												echo "<td>".$coluna['cidade']."</td>";
												echo "<td>".$coluna['estado']."</td>";
											
												echo "<td>".$coluna['celular']."</td>";
												echo "<td>".$coluna['email']."</td>";
												echo "<td>".$coluna['senha']."</td>"; 
echo "<td><img src='../fotoscliente/".$coluna['imagem']."' width='30' height='30'/></td>";
											
						
												echo '<td>  <a href="visualizar-cliente.php?codcliente='.$coluna['codcliente']. "&nome=" . $coluna['nome'] .  "&cpf=" . $coluna['cpf'] . "&dtnasc=" . $coluna['dtnasc'] . "&cep=" . $coluna['cep'] . "&endereco=" . $coluna['endereco'] . "&numero=" . $coluna['numero'] . "&complemento=" . $coluna['complemento'] . "&bairro=" . $coluna['bairro'] .  "&cidade=" . $coluna['cidade'] . "&estado=" . $coluna['estado'] .  "&celular=" . $coluna['celular'] . "&email=" . $coluna['email'] . "&senha=" . $coluna['senha'] . "&imagem=" . $coluna['imagem'] . '"> <input type="submit"   class="btn btn-primary"  value="Visualizar"/></td>
				<td><a href="cliente-excluir.php?codcliente='.$coluna['codcliente'].'"> <input  type="submit" class="btn btn-danger"  value="Excluir"/></a></td>';
												echo "</tr>";
											}
											
											
								?>
								
								
								   <?php } ?>
				            </table>
		  				</div>
		  			</div>
  				</div>
  			</div> 

		  			</div>
		  		</div>		  		
		  	</div> 	
		  </div>
		</div>
    </div>
	</section>			
 </section>

  <?php require "includes/footer.php" ?>