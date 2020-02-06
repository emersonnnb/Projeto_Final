<?php session_start(); 
?>
<?php 
 if(!isset($_SESSION['cliente'])); 
require "admin.php"; 
include('conexao.php');?>
<div class="col-md-10">
	<div class="row">
	<div class="col-md-12">
	<div class="content-box-large">
	<div class="panel-heading">
	<div class="panel-title">
	<h1>Dados do Cliente</h1>
<?php 
$codcliente= $_SESSION['cliente'];
$senha = $_SESSION['clientesenha'];
$sql = "select * from cliente where codcliente=$codcliente and senha='$senha'";
$resultado = mysqli_query($conexao, $sql);
$total     = mysqli_num_rows($resultado);
 ?>
	</div>
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
	<table class="table table-strip">
	<thead>
		<tr>
				<th width="100">CÓD</th>
				<th width="100">NOME</th>
				<th width="10">CPF</th>
				<th width="15">Nascimento</th>
				<th width="12">CEP</th>
				<th width="40">Endereço</th>
				<th width="13">Número</th>
				<th width="30">Complemento</th>
				<th width="30">Bairro</th>
				<th width="30">Cidade</th>
				<th width="4">Estado</th>
				
				<th width="14">Celular</th>
				<th width="100">E-mail</th>
				<th width="12">Senha</th>
				<th width="100">Imagem</th>
				
			</tr>
	</thead>
	<tbody>
		<?php
		while ( $dados = mysqli_fetch_array($resultado) ) {
		?>
		<tr>
		<?php echo '<td>';?>  <?php echo $dados['codcliente']; ?>
		<?php echo '</td>';?>
		<?php echo '<td>';?>  <?php echo $dados['nome']; ?>
		<?php echo '</td>';?>
		<?php echo '<td>';?>  <?php echo $dados['cpf']; ?>
		<?php echo '</td>';?>
	<?php echo '<td>';?>  <?php echo $dados['dtnasc']; ?>
		<?php echo '</td>';?>
		<?php echo '<td>';?>  <?php echo $dados['cep']; ?>
		<?php echo '</td>';?>
	<?php echo '<td>';?>  <?php echo $dados['endereco']; ?>
		<?php echo '</td>';?>
	<?php echo '<td>';?>  <?php echo $dados['numero']; ?>
		<?php echo '</td>';?>
		<?php echo '<td>';?>  <?php echo $dados['complemento']; ?>
		<?php echo '</td>';?>
	<?php echo '<td>';?>  <?php echo $dados['bairro']; ?>
	<?php echo '</td>';?>
	<?php echo '<td>';?>  <?php echo $dados['cidade']; ?>
	<?php echo '</td>';?>
	<?php echo '<td>';?>  <?php echo $dados['estado']; ?>
    <?php echo '</td>';?>
	
<?php echo '<td>';?>  <?php echo $dados['celular']; ?> 
<?php echo '</td>';?>
<?php echo '<td>';?> <?php echo $dados['email']; ?>
<?php echo '</td>';?>
<?php echo '<td>';?> <?php echo $dados['senha']; ?>
<?php echo '</td>';?>


<?php echo '<td>';?> <?php echo "<img src=../fotoscliente/".$dados['imagem']." width='40' height='40'";?><tr/>
<?php echo '</td>';?>

<?php
	}
 ?>
	
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
	</div>
    </div>
	</section>			
 </section>
  <?php require "footer.php" ?> 