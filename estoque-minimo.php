<?php include('topo.php');
$sql = mysql_query("SELECT * FROM produtos WHERE estoqueatual <= estoqueminimo") or die (mysql_error());
echo'
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Produtos com estoque mínimo</h3>
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
                        <th scope="col">Est.Mínimo</th>
                        <th scope="col">Est.Atual</th>
                    </tr>
                </thead>
                <tbody>';
                while($dados = mysql_fetch_array($sql)){echo'
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