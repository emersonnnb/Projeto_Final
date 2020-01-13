<?php 
include('topo.php');
include('conexao.php');
echo'
    
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <h4>Produtos</h4>
            </div>
            <div class="col-lg-10" align="right">
                <a href="index.php" class="btn btn-primary">Voltar</a>
                <button class="btn btn-primary" style="margin:5px" data-toggle="modal" data-target="#modal-addproduto"><i class="fa fa-plus"></i> Produto</button>
            </div>
        </div>
        <div class="page-header" id="banner" style="border: 1px solid black; padding: 10px;">
            <div id="tabelaEstoque"></div>
        </div>
    </div>

<!-- modal-addproduto-->

<div class="modal" id="modal-addproduto" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Cadastrar produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
            </button>
        </div>
        <form action="" method="post" id="form-addproduto">
        <div class="modal-body">
            <div class="row"></div>
                <label class="col-lg-3">Código do produto
                    <input type="number" class="form-control" name="codigo" required/>
                </label>
                <label class="col-lg-8">Nome do produto
                    <input type="text" class="form-control" name="nome" maxlength="30" required/>
                </label>
                <div class="row"></div>
                <label class="col-lg-3">Unidade Medida
                <select type="text" class="form-control" name="unidade" required>
                    <option value="">selecione</option>';
                    $sql_u = mysqli_query($conexao,"SELECT * FROM unidade ORDER BY nome_u ASC") or die (mysqli_error($conexao));
                    while($dados_u = mysqli_fetch_array($sql_u)){echo'<option value="'.$dados_u['id_u'].'">'.$dados_u['nome_u'].'</option>';}
                    echo'
                </select>
                </label>
                <label class="col-lg-2">Preço custo
                    <input type="text" class="form-control real" name="precocompra"/>
                </label>
                <label class="col-lg-2">Preço venda
                    <input type="text" class="form-control real" name="precovenda" required/>
                </label>
                <label class="col-lg-2">Est.mínimo
                    <input type="text" class="form-control" name="estoqueminimo"/>
                </label>
                <label class="col-lg-2">Est.atual
                    <input type="text" class="form-control" name="estoqueatual"/>
                </label>
                <div class="row"></div>
                <label class="col-lg-4">Código de barra
                <input type="number" class="form-control" name="codigobarra" required/>
            </label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
        </form>
        </div>
    </div>
</div>

<!-- modal-altproduto-->

<div class="modal" id="modal-altproduto" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Alterar produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
            </button>
        </div>
        <form action="" method="post" id="form-altproduto">
        <div id="retornoProduto"></div>
        </form>
        </div>
    </div>
</div>

';
include('rodape.php');?>
<script>
//função tabela
jQuery(document).ready(function(){tabelaEstoque();});
//exibir tabela
function tabelaEstoque(){
    jQuery.ajax({
        type:'POST',
        url:'tabela-estoque.php',
        data:'html',
        success:function(data){jQuery('#tabelaEstoque').html(data);}
    });
    return false;
};
//form-addproduto
jQuery('#form-addproduto').submit(function(){
    jQuery('#modal-addproduto').modal('hide');
    jQuery.ajax({
        type:'POST',
        url:'insert-update-produto.php',
        data:jQuery('#form-addproduto').serialize(),
        success:function(data){
            jQuery('#retorno').show().fadeOut(2000).html(data);
            jQuery('#form-addproduto').each(function(){this.reset();});
            tabelaEstoque();
        }
    });
    return false;
});
//função retorno produto
function alterarProduto(id){
    jQuery('#modal-altproduto').modal('show');
    jQuery.get('retorno-produto.php',{id:id},function(data){
        jQuery('#retornoProduto').html(data);
    });
    return false;
};
//form-altproduto
jQuery('#form-altproduto').submit(function(){
    jQuery('#modal-altproduto').modal('hide');
    jQuery.ajax({
        type:'POST',
        url:'insert-update-produto.php',
        data:jQuery('#form-altproduto').serialize(),
        success:function(data){
            jQuery('#retorno').show().fadeOut(2000).html(data);
            jQuery('#form-altprosuto').each(function(){this.reset();});
            tabelaEstoque();
        }
    });
    return false;
});
</script>