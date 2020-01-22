<?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = utf8_decode($_SESSION['nomeuser']);//pega usuario que est� executando a a��o
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$usuario = $_POST['usuario'];
$produto = $_POST['produto'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
if($produto != ''){
    $sql = mysqli_query($conexao,"SELECT * FROM vendas WHERE id_usuario='$usuario' AND codigobarra='$produto' AND data_venda BETWEEN '$inicio' AND '$fim' ORDER BY data_venda ASC") or die (mysql_error($conexao));
}else{
    $sql = mysqli_query($conexao,"SELECT * FROM vendas WHERE data_venda BETWEEN '$inicio' AND '$fim' ORDER BY data_venda ASC") or die (mysql_error($conexao));
}
echo'
<div class="page-header" id="banner" style="border: 1px solid black; padding: 10px;">
<table class="table table-hover">
    <thead>
        <tr class="table-active">
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor UND</th>
            <th scope="col">Total</th>
            <th scope="col">Data venda</th>
        </tr>
    </thead>
    <tbody>';
    while($dados = mysqli_fetch_array($sql)){echo'
        <tr>
            <td>'.$dados['nome_produto'].'</td>
            <td>'.$dados['quantidade_produto'].'</td>
            <td>R$ '.Real($dados['valor_produto']).'</td>
            <td>R$ '.Real($dados['valor_total_produto']).'</td>
            <td>'.date('d-m-Y',strtotime($dados['data_venda'])).'</td>
        </tr>';
        @$total = @$total + $dados['valor_total_produto'];
        ,
    }echo'
        <tr class="table-active">
            <td>Total</td>
            <td></td>
            <td></td>
            <td>R$ '.Real(@$total).'</td>
            <td></td>
        </tr>
    </tbody>
    </table> 
</div>';
?>