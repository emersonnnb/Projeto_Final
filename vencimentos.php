<?php include('topo.php');
$hoje = date('Y-m-d');
$sql = mysqli_query($conexao,"SELECT produtos.idProduto,codigo,nome,vencimento1,vencimento2,
DATEDIFF(vencimento1,'$hoje') AS ven1,
DATEDIFF(vencimento2,'$hoje') AS ven2
FROM produtos") or die (mysqli_error($conexao));

echo'
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>Produtos com vencimentos próximos</h4>
            </div>
            <div class="col-lg-6" align="right">
                <a href="index.php" class="btn btn-primary" style="margin:5px">Voltar</a>
            </div>
        </div>
        <div class="page-header" id="banner" style="border: 1px solid black; padding: 10px;">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Vencimento1</th>
                        <th>Dias</th>
                        <th scope="col">Vencimento2</th>
                        <th>Dias</th>                        
                    </tr>
                </thead>
                <tbody>';
                while($dados = mysqli_fetch_array($sql)){echo'
                    <tr>
                        <td>'.$dados['idProduto'].'</td>
                        <td>'.$dados['nome'].'</td>
                        <td>';if($dados['vencimento1'] != 0000-00-00){echo date('d-m-Y',strtotime($dados['vencimento1']));}echo'</td>
                        <td>'.$dados['ven1'].'</td>
                        <td>';if($dados['vencimento2'] != 0000-00-00){echo date('d-m-Y',strtotime($dados['vencimento2']));}echo'</td>
                        <td>'.$dados['ven2'].'</td>                        
                    </tr>';}
                    echo'
                </tbody>
            </table> 
        </div>
    </div>';
include('rodape.php');?>