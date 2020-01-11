<?php
ob_start();//inicia a grava��o do buffer quando conlcuir o processamento do php ai a p�gina � mostrada
session_start();
include('conexao.php'); 
include('funcoes.php');
if(isset($_SESSION['iduser'])!=true){echo '<script>location.href="sair.php";</script>'; }

$sql_empresa = mysqli_query($conexao,"SELECT * FROM empresa WHERE id_empresa=1") or die (mysql_error());
@$dados_emp = mysqli_fetch_array($sql_empresa);
echo'
<!DOCTYPE html>
<html lang="pt">
  <head><meta http-equiv="Content-Type" content="text/html; charset=iso8859-1">
    <title>PDV-SIM</title>
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
  <body oncontextmenu="return false">
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="index.php" class="navbar-brand">PDV-SIM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive"></div>
        <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="#"> Bem vindo: '.$_SESSION['nomeuser'].'</a>
        </li>';
        if(PermissaoCheck('dados-empresa',$_SESSION['iduser'])=='checked'){echo'
        <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-empresa"><i class="fa fa-home"></i> Empresa</a>
        </li>';}
        echo'
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="alterarSenhaUsuario('.$_SESSION['iduser'].')"><i class="fa fa-key"></i> Alterar Senha</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php"><i class="fa fa-sign-out"></i> Sair</a>
        </li>
        </ul>
        </form>
        </div>
      </div>
      <div class="col-lg-3 divRetorno" id="retorno"></div>
    </div>
    
<!-- modal-empresa-->
<div class="modal" id="modal-empresa" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Dados da empresa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
            </button>
        </div>
        <form action="" method="post" id="form-empresa">
          <div class="modal-body">
              <div class="row">
                <label class="col-lg-6"><input type="text" class="form-control" name="nome_empresa" value="'.@$dados_emp['nome_empresa'].'" placeholder="Nome empresa"/></label>
                <label class="col-lg-4"><input type="number" class="form-control" name="cpf_cnpj" value="'.@$dados_emp['cpf_cnpj'].'" placeholder="CPF ou CNPJ"/></label>
                <label class="col-lg-6"><input type="text" class="form-control" name="endereco_empresa" value="'.@$dados_emp['endereco_empresa'].'" placeholder="Rua e n�mero"/></label>
                <label class="col-lg-4"><input type="text" class="form-control" name="bairro_empresa" value="'.@$dados_emp['bairro_empresa'].'"placeholder="Bairro"/></label>
                <label class="col-lg-4"><input type="text" class="form-control" name="cidade_empresa" value="'.@$dados_emp['cidade_empresa'].'" placeholder="Cidade"/></label>
                <label class="col-lg-2"><input type="text" class="form-control" name="uf_empresa" value="'.@$dados_emp['uf_empresa'].'" placeholder="UF"/></label>
                <label class="col-lg-4"><input type="number" class="form-control" name="contato_empresa" value="'.@$dados_emp['contato_empresa'].'" placeholder="Contato"/></label>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Salvar</button>
          </div>
        </form>
        </div>
    </div>
</div>
<!-- modal-empresa-->   ';
?>