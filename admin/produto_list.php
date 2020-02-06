<?php
session_start();
$page = 'listar_produto';
require('includes/header.php');
?>
<!-- Listar usuarios -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Listar Produto</h2>
                <hr>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Imagem</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include_once 'conexao/conexao.php';
                    $sql = "SELECT * FROM `produto`";
                    $retorno = mysqli_query($conexao, $sql);
                    

                    while ($array = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
                      $id_produto = $array['id_produto'];  
                      $descricao = $array['descricao'];
                        $categoria = $array['categoria'];
                        $preco = $array['preco'];
                        $imagem = $array['imagem'];
                    ?>
                        <tr>
                            <td><?= $descricao ?></td>
                            <td><?= $categoria ?></td>
                            <td><?= $preco ?></td>
                            <td><?= $imagem ?></td>
                            <td class="text-center">
                                <span class="d-none d-md-block">
                                    <a href="produto_visualiza.php?id=<?= $id_produto ?>" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#visualizarRegistro">Visualizar</a>
                                    <a href="produto_editar.php?id=<?= $id_produto ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                                    <a href="produto_apagar.php?id=<?= $id_produto ?>" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target=" #apagarRegistro">Apagar</a>
                                </span>
                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                        <a class="dropdown-item" href="visualizar.php?id=<?= $id_produto ?>" data-toggle="modal" data-target="#visualizarRegistro">Visualizar</a>
                                        <a class="dropdown-item" href="produto_editar.php?id=<?= $id_produto ?>">Editar</a>
                                        <a class="dropdown-item" href="produto_apagar.html" data-toggle="modal" data-target="#apagarRegistro">Apagar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table><br>
            <?php
            if (isset($_SESSION['atualizacao_sucesso'])) :
            ?>
                <div class="alert alert-success col-lg-2">
                    <p>Atualizado com sucesso!!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['atualizacao_sucesso']);
            ?>
        </div>
    </div>
</div>
<!-- Modal para confirmar a exclusÃÂ£o de um registro-->
<div class="modal fade" id="apagarRegistro" tabindex="-1" role="dialog" aria-labelledby="apagarRegistro" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Excluir item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluiir o item selecionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">NÃÂ£o</button>
                <a href="usuario_apagar.php?id="><button type="button" class="btn btn-danger">Sim</button></a>
            </div>
        </div>
    </div>
</div>
<?php
require('includes/footer.php');
?>