<?php include('topo.php');
$sql = mysqli_query($conexao,"SELECT * FROM usuario ORDER BY nome ASC") or die (mysql_error());
echo'
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>Usuários</h4>
            </div>
            <div class="col-lg-6" align="right">
                <a href="index.php" class="btn btn-primary" style="margin:5px">Voltar</a>
                <a href="#" onclick="adicionarUsuario()"class="btn btn-primary" style="margin:5px"><i class="fa fa-plus"></i> Usu�rio</a>
            </div>
        </div>
        <div class="page-header" id="banner" style="border: 1px solid black; padding: 10px;">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>';
                while($dados = mysqli_fetch_array($sql)){echo'
                    <tr onclick="alterarUsuario('.$dados['id'].')">
                        <td>'.$dados['nome'].'</td>
                        <td>'.$dados['cpf'].'</td>
                        <td>';if($dados['situacao'] == 0){echo 'Liberado';}else{echo'Bloqueado';}echo'</td>
                    </tr>';}
                    echo'
                </tbody>
            </table> 
        </div>
    </div>
    
<!-- modal-addusuario-->
<div class="modal" id="modal-addusuario" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Cadastrar usu�rio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
            </button>
        </div>
        <form action="" method="post" id="form-addusuario">
        <div class="modal-body">
            <div class="row">
                <label class="col-lg-12">Nome
                    <input type="text" class="form-control" name="nome" required/>
                </label>
                <label class="col-lg-12">CPF (login)
                    <input type="number" class="form-control" name="cpf" required/>
                </label>
                <label class="col-lg-12">Senha
                    <input type="password" class="form-control" name="senha" minlength="6" required/>
                </label>
                <label class="col-lg-12">Caixa N�
                    <input type="number" class="form-control" name="caixa"/>
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </form>
        </div>
    </div>
</div>
<!-- modal-addusuario-->';
include('rodape.php');?>
<script>
//chamar modal
function adicionarUsuario(){ jQuery('#modal-addusuario').modal('show'); };
//form-addusuario
jQuery('#form-addusuario').submit(function(){
jQuery.ajax({
        type:'POST',
        url:'insert-usuario.php',
        data:jQuery('#form-addusuario').serialize(),
        success:function(data){
            jQuery('#retorno').show().fadeOut(1500).html(data);
            jQuery('#modal-addusuario').modal('hide');
            history.go();
        }
    });
    return false;
});
</script>
