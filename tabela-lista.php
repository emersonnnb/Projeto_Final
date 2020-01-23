<?php
session_start();
include('conexao.php');
include('funcoes.php');
$sql = mysqli_query($conexao,"SELECT * FROM produtos") or die (mysqli_error($conexao));
echo'
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
        <th>Cod</th>
        <th>Nome</th>
        <th>Unidade</th>
        <th>Preço compra</th>
        <th>Preço venda</th>
        <th>Est.Minimo</th>
        <th>Est.Atual</th>
        </tr>
    </thead>
    <tbody>';
    while($dados_p = mysqli_fetch_array($sql)){
        echo'
        <tr onclick="alterarProduto('.$dados_p['idProduto'].')">
        <td>'.$dados_p['idProduto'].'</td>
        <td>'.$dados_p['nome'].'</td>
        <td>'.$dados_p['unidade'].'</td>
        <td>R$ '.Real($dados_p['precocompra']).'</td>
        <td>R$ '.Real($dados_p['precovenda']).'</td>
        <td>'.$dados_p['estoqueminimo'].'</td>
        <td>'.$dados_p['estoqueatual'].'</td>
        
        </tr>';}
        echo'
    </tbody>
</table>';
?>
<!-- jQuery dataTable-->
<script type="text/javascript" src="dataTable/jquery.dataTables.min.js"></script>
<!--meus scripts-->
<script src="dataTable/confi-dataTable.js"></script>
<!-- style -->
<link rel="stylesheet" href="dataTable/jquery.dataTables.min.css"/>