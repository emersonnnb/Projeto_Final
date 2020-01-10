<?php include('topo.php');
$id = $_GET['id'];
$sql = mysqli_query($conexao,"SELECT * FROM usuario WHERE id='$id'") or die (mysqli_error());
$dados = mysqli_fetch_array($sql);

echo'
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h4>Usu�rios</h4>
        </div>
        <div class="col-lg-6" align="right">
            <a href="index.php" class="btn btn-primary" style="margin:5px">Voltar</a>
        </div>
    </div>
    <form action="" method="post" id="form-altusuario">
    <input type="text" class="hidden" name="id" value="'.$dados['id'].'"/>
    <div class="page-header" id="banner" style="border: 1px solid black; padding: 10px;">
        <label class="col-lg-3">Nome
            <input type="text" class="form-control" name="nome" value="'.$dados['nome'].'"/>
        </label>
        <label class="col-lg-2">CPF (login)
            <input type="text" class="form-control" name="cpf" value="'.$dados['cpf'].'"/>
        </label>
        <label class="col-lg-2">Caixa N�
            <input type="number" class="form-control" name="caixa" value="'.$dados['caixa'].'"/>
        </label>
        <label class="col-lg-2">Status
            <select type="text" class="form-control" name="situacao">';
            if($dados['situacao'] == 0){echo'<option value="0">Ativo</option>';}
            else{echo'<option value="1">Bloqueado</option>';}
            echo'
            <option value="0">Ativo</option>
            <option value="1">Bloqueado</option>
            </select>
        </label>
        <label class="col-lg-2"><br><button type="submit" class="btn btn-warning">Salvar</button></label>
        <label class="col-lg-2"><br><a onclick="alterarSenha('.$dados['id'].')" class="btn btn-dark">Alterar senha</a></label>
    </div>
    </form>';

    if(PermissaoCheck('permissoes',$_SESSION['iduser'])=='checked'){echo'
    <form action="" method="post" id="form-altpermissoes">
    <input type="text" class="hidden" name="id" value="'.$dados['id'].'"/>
    <div class="row">
        <div class="col-lg-6">
            <h4>Permiss�es</h4>
        </div>
    </div>
    <div class="page-header" id="banner" style="border: 1px solid black; padding: 10px;">
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="estoque" '.PermissaoCheck('estoque',$id).'> Estoque</label>
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="estoqueminimo" '.PermissaoCheck('estoqueminimo',$id).'> Est. M�nimo</label>
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="vencimentos" '.PermissaoCheck('vencimentos',$id).'> Vencimentos</label>
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="vendas" '.PermissaoCheck('vendas',$id).'> Vendas</label>
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="pdv" '.PermissaoCheck('pdv',$id).'> PDV</label>
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="usuarios" '.PermissaoCheck('usuarios',$id).'> Usu�rios</label>
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="permissoes" '.PermissaoCheck('permissoes',$id).'> Permiss�es</label>
        <label class="col-lg-2"><input type="checkbox" name="permissoes[]" value="dados-empresa" '.PermissaoCheck('dados-empresa',$id).'> Dados empresa</label>
        <label class="col-lg-2"><br><button type="submit" class="btn btn-warning">Salvar</button></label>
    </div>
    </form>';}
echo'</div>

<!-- modal-altsenha-->
<div class="modal" id="modal-altsenha" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Alterar senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
            </button>
        </div>
        <form action="" method="post" id="form-altsenha">
        <div id="retornoSenha"></div>
        </form>
        </div>
    </div>
</div>
<!-- modal-altsenha-->';
include('rodape.php');?>
<script>
//form-altusuario
jQuery('#form-altusuario').submit(function(){
    jQuery.ajax({
        type:'POST',
        url:'update-usuario.php',
        data:jQuery('#form-altusuario').serialize(),
        success:function(data){
            jQuery('#retorno').show().fadeOut(1500).html(data);
            history.go();
        }
    });
    return false;
});
//form-altpermissoes
jQuery('#form-altpermissoes').submit(function(){
    jQuery.ajax({
        type:'POST',
        url:'update-permissoes.php',
        data:jQuery('#form-altpermissoes').serialize(),
        success:function(data){
            jQuery('#retorno').show().fadeOut(1500).html(data);
            window.setTimeout(function() {
              history.go();
          }, 2000);
        }
    });
    return false;
});
//alterar senha
function alterarSenha(id){
    jQuery('#modal-altsenha').modal('show');
    jQuery.get('retorno-senha.php',{id:id},function(data){
        jQuery('#retornoSenha').html(data);
    });
    return false;
};
//form-altsenha
jQuery('#form-altsenha').submit(function(){
    jQuery('#modal-altsenha').modal('hide');
    jQuery.ajax({
        type:'POST',
        url:'update-senha.php',
        data:jQuery('#form-altsenha').serialize(),
        success:function(data){
            jQuery('#retorno').show().fadeOut(1500).html(data);
        }
    });
    return false;
});
</script>