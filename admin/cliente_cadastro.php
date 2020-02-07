<?php
session_start();
$page = 'novo_cliente';
require('includes/header.php');
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <H2 style="text-align: center;">CADASTRO DE CLIENTES</H2>
        <br><br>
        <h5>Dados Pessoais</h5>
        <HR>
        <form class="form-horizontal" action="cliente_cadastrar.php" method="POST" enctype="multipart/form-data" name="cadastro">
            <div class="row">
                <div class="form-group col">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" maxlength="10" placeholder="Insira seu nome">
                </div>
                <div class="form-group col">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com.br">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx">
                </div>
                <div class="form-group col-lg-3">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="xxxxxxxx-x">
                </div>
                <div class="form-group col">
                    <label for="nascimento">Data de nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="senha">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="+00(00)00000-0000">
                </div>
                <div class="form-group col-lg-6">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="senha">
                </div>
            </div>
            <br>
            <h5>Endereço</h5>
            <HR>
            <div class="row">
                <div class="form-group col-lg-6 col-6">
                    <label for="cep">Buscar pelo Cep</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Insira o CEP">
                    <button class="btn btn-primary mt-2" type="button" id="buscaCEP">Buscar</button>
                </div>
            </div>

            <div class="row ml-1">
                <div class="form-group col-lg-4 col-12">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" size="82" readonly>
                </div>
                <div class="form-group col-lg-4">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero da casa">
                </div>
                <div class="form-group col-lg-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="casa/apartamento/bloco">
                </div>
            </div>
            <div class="row ml-1">
                <div class="form-group col-lg-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" readonly>
                </div>
                <div class="form-group col-lg-1">
                    <label for="uf">Estado/UF</label>
                    <input type="text" class="form-control" id="uf" name="estado" readonly >
                </div>
                <div class="form-group col-lg-5">
                    <label for="imagem">Imagem:</label>
                    <input type="file" class="form-control" id="imagem" placeholder="Imagem" name="imagem">
                </div>
            </div>
            
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
                <button type="reset" class="btn btn-danger">Limpar</button>
            </div>
        </form>
        <script src="js/cep.js" type="text/javascript"></script>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
        <?php
        if (isset($_SESSION['cliente_existe'])) :
        ?>
            <div class="alert alert-danger">
                <p>O cliente já existe.
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