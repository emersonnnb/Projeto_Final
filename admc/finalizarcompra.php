<?php session_start(); ?>
<?php
if (!isset($_SESSION['cliente']));
if (!isset($_SESSION['clientenome']));
if (!isset($_SESSION['carrinho']));
?>


<?php require "admin.php" ?>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title">
						<h1>Listagem de Produtos</h1>
						<?php echo $_SESSION['clientenome']; ?>, seus pedidos:
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
									<th width="244">DESCRIÇÃO</th>
									<th width="244">QUANTIDADE</th>
									<th width="244">PREÇO</th>
									<th width="244">SUBTOTAL</th>
									<th width="244">REMOVER</th>
								</tr>
							</thead>
							<form action="?acao=finalizar" method="post">
								<tbody>
									<?php
									if (count($_SESSION['carrinho']) == 0) {
										echo ('<tr><td colspan="5">Nenhum produto no carrinho</td></tr>');
									} else {
										include('conexao.php');
										$total = 0;
										foreach ($_SESSION['carrinho'] as $codproduto => $qtd) {
											$sql     = "SELECT * FROM produto WHERE id_produto = '$codproduto'";
											$executa = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
											$in      = mysqli_fetch_assoc($executa);
											$descricao    = $in['descricao'];


											$preco   = number_format($in['preco'], 2, ',', '.');
											$sub     = number_format($in['preco'] * $qtd, 2, ',', '.');
											$total   += number_format($in['preco'] * $qtd, 2, ',', '.');
											// para gravar no banco a tabela pedido
											$codcliente = $_SESSION['cliente'];
											$date = date('Y-m-d');
											$datacompra = $date;
											$sql22 = "insert into pedido values (null,'" . $qtd . "','" . $sub . "','" . $total . "','" . $codcliente . "', '" . $codproduto . "', '" . $datacompra . "')";
											$gravar = mysqli_query($conexao, $sql22);
											// encerra a sessão do carrinho deixando o mesmo em branco	
											$_SESSION['carrinho'] = array();

											echo '<tr>
   <td>' . $descricao . '</td>
   

    <td><input type="text" size="3" name="prod[' . $codproduto . ']" value="' . $qtd . '" ></td>
    <td>R$ ' . $preco . '</td>
    <td>R$' . $sub . '</td>						  
  </tr>';
											$total = number_format($total, 2, ',', '.');
											echo 	'<tr>                         
  <td colspan="4">Total</td>
  <td>R$ ' . $total . '</td>
  </tr>';
										}
									}
									?>
						</table>
						<a href="finalizarcompra.php" class="btn btn-primary" /> Finalizar Compra</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
</section>
<?php require "footer.php" ?>