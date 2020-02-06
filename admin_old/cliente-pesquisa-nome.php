<?php
require "Cliente.class.php";

$nome = $_POST['nome'];
$cliente = new Cliente();
$dados = $cliente->pesquisarPorNome($nome);

?>

<?php $title = "Listagem de Clientes"; ?>
<?php require "includes/header.php" ?>

        <div class="table-responsive" style="background-color: white; border-radius: 2em;" >
   <section class="container" >
   
   

        <h1>Pesquisa por: <?php echo $nome; ?></h1>
        <?php if(isset($dados)){ ?>
       <div class="col-md-10">

		  	<div class="row">
  				<div class="col-md-10">
  					
		
		  				<div class="panel-body" >
						
		  					<table class="table" >
				              <thead>
				                <tr>
				                  	
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
												echo "<td><img src='../fotoscliente/".$coluna['imagem']."' width='50' height='40'/></td>";
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

    </section>

