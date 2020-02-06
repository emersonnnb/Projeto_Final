<?php
$page = 'listar_cliente';
require('includes/header.php');
?>
<!-- Listar clientes -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Dados do Cliente</h2>
                <hr>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered ">
                <thead>
                    <tr>
						<th>CÓD</th>
						<th >NOME</th>
						<th >CPF</th>
						<th >Nascimento</th>						
						<th>Celular</th>
						<th>E-mail</th>
						<th>Imagem</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include_once 'conexao/conexao.php';
                    $sql = "SELECT id_cliente,nome,cpf,dtnasc,celular,email,imagem FROM `cliente`";
                    $retorno = mysqli_query($conexao, $sql);

                    while ($array = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
                        $id_cliente = $array['id_cliente'];
						$nome = $array['nome'];
						$cpf = $array['cpf'];
						$dtnasc = $array['dtnasc'];
						$celular = $array['celular'];
						$email = $array['email'];
                        $imagem = $array['imagem'];
                    ?>
                        <tr>
                            <td><?= $id_cliente ?></td>
							<td><?= $nome ?></td>
							<td><?= $cpf ?></td>
							<td><?= $dtnasc ?></td>
                            <td class="d-none d-lg-table-cell"><?= $celular ?></td>
							<td><?= $email ?></td>
                            <td><?= $imagem ?></td>
							

                            <td class="text-center">
                                <span class="d-none d-md-block">
                                    <a href="cliente_visualiza.php?id=<?= $id_cliente ?>" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#visualizarRegistro">Visualizar</a>
                                    <a href="cliente_editar.php?id=<?= $id_cliente ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                                    <a href="cliente_apagar.php?id=<?= $id_cliente ?>" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target=" #apagarRegistro">Apagar</a>
                                </span>
                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                        <a class="dropdown-item" href="visualizar.php?id=<?= $id_cliente ?>" data-toggle="modal" data-target="#visualizarRegistro">Visualizar</a>
                                        <a class="dropdown-item" href="cliente_editar.php?id=<?= $id_cliente ?>">Editar</a>
                                        <a class="dropdown-item" href="cliente_apagar.html" data-toggle="modal" data-target="#apagarRegistro">Apagar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal para confirmar a exclusão de um registro-->
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
                <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                <a href="cliente_apagar.php?id="><button type="button" class="btn btn-danger">Sim</button></a>
            </div>
        </div>
    </div>
</div>
<?php
require('includes/footer.php');
?>