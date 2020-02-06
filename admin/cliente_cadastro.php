<?php
session_start();
$page = 'novo_cliente';
require('includes/header.php');
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Cadastrar Cliente</h2>
                <hr>
            </div>
        </div>
      
        <form class="form-horizontal" action="cliente_cadastrar.php" method="POST">
        
            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                </div>
                <div class="form-group col-md-6 col-6">
                    <label for="dtnasc">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="dtnasc" placeholder="Data de Nascimento" name="dtnasc">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf">
                </div>
                <div class="form-group col-md-6 col-6">
                    <label for="identidade">Identidade:</label>
                    <input type="text" class="form-control" id="identidade" placeholder="Identidade" name="identidade">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                </div>
                <div class="form-group col-md-6 col-6">
                    <label for="email">Celular:</label>
                    <input type="celular" class="form-control" id="celular" placeholder="celular" name="celular">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
                </div>
                <div class="form-group col-md-6 col-6">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" placeholder="Repetir senha" name="senha">
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" id="cep" placeholder="CEP" name="cep">
                    <span class="input-group-btn">

                        <button class="btn btn-secondary" type="button" id="buscaCEP">Buscar</button>
                    </span>
                </div>
                <div id="cepstatus"></div>
                <div class="form-group col-md-6 col-6">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco"
                        readonly />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="numero">Número:</label>
                    <input type="text" class="form-control" id="numero" placeholder="Número" name="numero">
                </div>
                <div class="form-group col-md-6 col-6">
                    <label for="complemento">Complemento:</label>
                    <input type="text" class="form-control" id="complemento" placeholder="Complemento"
                        name="complemento">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" readonly />
                </div>
                <div class="form-group col-md-6 col-6">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" readonly />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-6">
                    <label for="estado">Estado:</label>
                    <input type="text" class="form-control" id="uf" placeholder="Estado" name="estado" readonly />
                </div>
                <div class="form-group col-md-6 col-6">
                    <label for="imagem">Imagem:</label>
                    <input type="file" class="form-control btn btn-secondary" id="imagem" name="imagem">
                </div>
            </div>

            <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
            <button type="reset" class="btn btn-danger">Limpar</button>
        </form>
        <?php
        if (isset($_SESSION['cliente_existe'])) :
        ?>
        <div class="alert alert-danger">
            <p>O produto já existe.
        </div>
        <?php
        endif;
        unset($_SESSION['cliente_existe']);
        ?>
        <?php
        if (isset($_SESSION['status_cadastro'])) :
        ?>
        <div class="alert alert-success">
            <p>Cliente cadastrado com sucesso!!</p>
        </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
    </div>
</div>

<?php require('includes/footer.php') ?>