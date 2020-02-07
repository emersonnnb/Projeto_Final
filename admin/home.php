<?php
include('includes/header.php');
$page = 'home';
?>

<!-- Pagina Home  -->
<?php
    include_once 'conexao/conexao.php';
    $sql = mysqli_query($conexao, "SELECT COUNT(*) AS comercio FROM usuario");
    $row= mysqli_fetch_array($sql);
    $saldo=$row['0'];
    include_once 'conexao/conexao.php';
    $sql = mysqli_query($conexao, "SELECT COUNT(*) AS comercio FROM produto");
    $row= mysqli_fetch_array($sql);
    $saldo=$row['0'];
      
                            
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Bem Vindo, ao Dashboard!</h2>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3 col-sm-6">
                <a href="../admin/usuario_list.php" style="text-decoration:none">
                    <div class="card text-white" style="background-color:#B22222">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x"></i>
                            <h6 class="card-title">Usuários</h6>
                            <h2 class="lead"><?php echo  $saldo ?></h2>
                        </div>
                    </div>
                    </a>
            </div>
            
            <div class="col-lg-3 col-sm-6">
            <a href="..//admin/cliente_list.php" style="text-decoration:none">
                <div class="card text-white" style="background-color:#4F4F4F">
                    <div class="card-body">
                        <i class="fas fa-shopping-bag fa-3x"></i>
                        <h6 class="card-title">Clientes</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <a href="../admin/produto_list.php" style="text-decoration:none">
                    <div class="card text-white" style="background-color:#A52A2A">
                        <div class="card-body">
                            <i class="fas fa-list-ul fa-3x"></i>
                            <h6 class="card-title ">Produtos</h6>
                        </div>
                    </div>
                    </a>
            </div>

            <div class="col-lg-3 col-sm-6">
            <a href="../admin/pedido_lista.php" style="text-decoration:none">
                <div class="card text-white" style="background-color:#808080">
                    <div class="card-body">
                        <i class="fas fa-truck fa-3x"></i>
                        <h6 class="card-title">Pedido</h6>
                    </div>
                    </div>
            </div>

            

            
        </div>   
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>