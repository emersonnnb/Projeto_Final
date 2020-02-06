<?php
session_start();
$page = 'novo_usuario';
require('includes/header.php');
?>
<!-- Formulario de cadastro  -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Cadastrar Usuário</h2>
                <hr>
            </div>
        </div>
        <form name="usuario" method="POST" action="usuario_cadastrar.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
            </div>
            <div class="form-group">
                <label for="celular">Telefone:</label>
                <input type="text" class="form-control" id="telefone" placeholder="Celular " name="telefone" required>
            </div>
            <div class="form-group">
                <label for="nome">Login:</label>
                <input type="text" class="form-control" id="login" placeholder="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
            </div>
            <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
            <button type="reset" class="btn btn-danger">Limpar</button>
        </form><br>
        <?php
        if (isset($_SESSION['usuario_existe'])) :
        ?>
            <div class="alert alert-danger">
                <p>O usuário já existe.
            </div>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>
        <?php
        if (isset($_SESSION['status_cadastro'])) :
        ?>
            <div class="alert alert-success">
                <p>Cadastro com sucesso!!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
    </div>
</div>


<?php
require('includes/footer.php');
?>