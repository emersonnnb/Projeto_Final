<?php include('topo.php');
$sql = mysqli_query($conexao ,"SELECT * FROM produtos WHERE estoqueatual <= estoqueminimo") or die (mysql_error($conexao));
echo'
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Produtos com estoque m�nimo</h3>
            </div>
            <div class="col-lg-6" align="right">
                <a href="index.php" class="btn btn-primary" style="margin:5px">Voltar</a>
            </div>
        </div>
        <div class="page-header" id="banner" style="border: 1px solid black; padding: 10px;">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col">C�digo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Est.M�nimo</th>
                        <th scope="col">Est.Atual</th>
                    </tr>
                </thead>
                <tbody>';
                while($dados = mysqli_fetch_array($sql)){echo'
                    <tr>
                        <td>'.$dados['codigo'].'</td>
                        <td>'.$dados['nome'].'</td>
                        <td>'.$dados['estoqueminimo'].'</td>
                        <td>'.$dados['estoqueatual'].'</td>
                    </tr>';}
                    echo'
                </tbody>
            </table> 
        </div>
    </div>';
include('rodape.php');?>