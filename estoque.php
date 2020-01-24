<?php include('topo.php');
$sql = mysqli_query($conexao,"SELECT * FROM estoque join produtos where id_produto=idProduto") or die (mysqli_error($conexao));
echo'
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Estoque</h3>
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
                        <th scope="col">Est.Minimo</th>
                        <th scope="col">Est.Atual</th>
                        <th scope="col">Saldo atual</th>
                        <th scope="col">Ajuste</th>
                    </tr>
                </thead>
                <tbody>';
                while($dados = mysqli_fetch_array($sql)){echo'
                    <tr>
                        <td>'.$dados['idProduto'].'</td>
                        <td>'.$dados['nome'].'</td>
                        <td>'.$dados['estoqueminimo'].'</td>
                        <td>'.$dados['estoqueatual'].'</td>
                        <td>'.$dados['saldo'].'</td>
                        <td><span class="d-none d-md-block">
                            <a href="produto_visualizar.php?id=<?=$id_produto?>" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                    data-target="#visualizarRegistro">&nbsp;-&nbsp;</a>

                            <a href="produto_editar.php?id=<?=$id_produto?>"
                                class="btn btn-outline-warning btn-sm">&nbsp;+&nbsp;</a>
                        </td>
                    </tr>';}
                    echo'
                </tbody>
            </table> 
        </div>
    </div>';
include('rodape.php');?>