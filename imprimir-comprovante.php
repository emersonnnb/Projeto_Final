<?php 
include('conexao.php');
include('funcoes.php'); 
$sql_emp = mysqli_query($conexao,"SELECT * FROM empresa WHERE id_empresa=1") or die (mysql_error());
$dados_emp = mysqli_fetch_array($sql_emp);
$sql = mysqli_query($conexao,"SELECT * FROM vendas WHERE id_venda='".$_GET['id']."'") or die (mysql_error());
?>
<style>@media print{.no-print{ display:none;}}</style>
<?php
echo '
<h5><center>COMPROVANTE DE COMPRA</center></h5>
<div style="font-size:10px; font-family:Arial, sans-serif;">
<center>'.$dados_emp['nome_empresa'].'<br>'.$dados_emp['endereco_empresa'].'<br>'.$dados_emp['bairro_empresa'].' - 
'.$dados_emp['cidade_empresa'].'-'.$dados_emp['uf_empresa'].' - '.$dados_emp['contato_empresa'].'</center>
<div>Itens da compra --------------- Data:'.date('d-m-Y H:m:s').'</div><hr>
<table class="table table-hover text-center" style="font-size:10px; font-family:Arial, sans-serif;">
	<thead>
	<tr>
		<th>N�</th>
		<th>Produto</th>
		<th>Quant</th>
		<th>Valor UND</th>
		<th>Valor Total</th>
	</tr>
	<thead>
	<tbody>';
	$item = 1;
	$total = 0;
	while($dados = mysqli_fetch_array($sql)){
	
	echo'		
		<tr>
			<td>'.$item.'</td>
			<td>'.substr($dados['nome_produto'],0,18).'</td>
			<td>'.$dados['quantidade_produto'].'</td>
			<td>R$'.Real($dados['valor_produto']).'</td>
			<td>R$'.Real($dados['valor_total_produto']).'</td>
		</tr>';
	$item++;
	$total = $dados['valor_total_produto'];}
	echo'
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Total</td>
		<td>R$'.Real($total).'</td>
	</tr>							
	</tbody>								
</table>
<hr>
</div>
<h5><center>*Sem valor fiscal*</center></h5>';
?>
<script>window.print();</script>