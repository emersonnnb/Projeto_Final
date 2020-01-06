<?php
ob_start();
session_start();
include('conexao.php'); 
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que está executando a ação
$caixa = $_SESSION['caixa'];
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina
if(isset($_SESSION['iduser'])!=true){echo '<script>location.href="sair.php";</script>'; }
//verificar se tem venda em aberto
if(!isset($id_venda)){
$sql_venda = mysql_query("SELECT * FROM vendas WHERE caixa_venda='$caixa' AND situacao='aberta'") or die (mysql_error());
    if($rows = mysql_num_rows($sql_venda) != 0){
        $dados_venda = mysql_fetch_array($sql_venda);
        $id_venda = $dados_venda['id_venda'];
    }else{
        $_SESSION['id_venda'] = date('dmYHms');
        $id_venda = $_SESSION['id_venda'];
    }
};
echo'
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="iso8859-1">
  <title>PDV-SIM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/estilo-login.css">
  <link rel="stylesheet" href="fancybox/dist/jquery.fancybox.css"/> 

</head>
<body style="overflow: hidden; height:auto">
<input type="text" class="hidden" id="idvenda" alt="'.@$id_venda.'" value="'.@$id_venda.'"/>
<div class="main"><br>
<div class="col-lg-12">
  <h5 style="color:white; text-align:center;"><b>Caixa: '.$usuario.'&nbsp;&nbsp;<i class="fa fa-desktop text-warning"></i>&nbsp;&nbsp;<i class="fa fa-sitemap text-success"></i>
  (F10->Sair / F7->Menu)</b></h5>
  </div>
    <div class="jumbotron" style="margin: 1px; width: auto; height:600px;">
        <div class="row" style="margin-top: -30px;" >
            <div class="col-lg-8" style="border: 1px solid red; padding:5px; height:550px; overflow-y:auto; overflow-x:hidden">
                <div class="row">
                    <div class="col-lg-12" style="font-size: 16px; text-align:left;">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-active">
                                    <th scope="col">Item</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Quant.</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>';
                                @$id_venda;
                                $sql = mysql_query("SELECT * FROM vendas WHERE id_venda=".$id_venda." AND caixa_venda='$caixa' AND situacao='aberta'") or die (mysql_error());
                                if($rows = mysql_num_rows($sql) >= 1){
                                    @$item = 1; $total = 0;
                                    while($vendas = mysql_fetch_array($sql)){
                                        echo'
                                            <tr>
                                                <td>'.@$item.'</td>
                                                <td>'.$vendas['codigobarra'].'</td>
                                                <td>'.$vendas['nome_produto'].'</td>
                                                <td>'.$vendas['quantidade_produto'].'</td>
                                                <td>R$ '.Real($vendas['valor_total_produto']).'</td>
                                                <td>
                                                <a href="excluir-produto-venda.php?id='.$vendas['id'].'" title="Excluir item"><i class="fa fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>';
                                        $item = $item + 1;
                                        @$total = @$total + $vendas['valor_total_produto'];
                                    }
                                }echo'
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" style="border: 1px solid green; padding:5px">
                <div class="row">
                    <form action="" method="post" id="codigoProduto" autocomplete="off">
                        <label class="col-lg-12"><input type="number" class="form-control" name="codigo"
                        placeholder="Código de barra" style="font-size:25px; text-align:center; color:black; font-weight: bold;"/>
                        </label>
                    </form>
                </div>
                <form action="insert-caixa-update-venda.php" method="post" style="font-size: 18px" autocomplete="off">
                    <input type="text" class="hidden" name="id_venda" value="'.@$id_venda.'"/>
                    <div class="form-group">
                    <label class="control-label"><b>Valor cartão</b></label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >R$</span>
                            </div>
                            <input type="text" class="form-control real" id="valorCartao" name="valor_cartao" value="0"/>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label"><b>Valor dinheiro</b></label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control real" id="valorDinheiro" name="valor_dinheiro" value="0"/>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label"><b>Valor recebido</b></label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control" id="valorRecebido"  name="valor_recebido" value="0" required/>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label"><b>Total compra</b></label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control" id="valorCompra" name="valor_compra" value="'.Real(@$total).'" readonly/>
                        </div>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label"><b>Troco</b></label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control" id="valorTroco" name="valor_troco" readonly>
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Finalizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- imprimir cupon -->
<a id="imprimirCupom" data-fancybox data-type="iframe" data-src="imprimir-comprovante.php?id='.@$_GET['imprimir'].'" target="_blank" class="hidden btn btn-primary btn-block"><i class="fa fa-2x fa-print"></i> Imprimir</a>

<!-- modal-addproduto-->
<div class="modal" id="modal-addprodutovenda" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Adicionar produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
            </button>
        </div>
        <form action="insert-produto-venda.php" method="post" autocomplete="off">
            <input type="text" class="hidden" name="id_venda" value="'.$id_venda.'"/>
            <div class="modal-body">
                <div class="row" id="retornoProduto"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- modal-addproduto-->';
ob_end_flush();?>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/jquery.maskMoney.js"></script>
<script src="fancybox/dist/jquery.fancybox.js"></script>
<script src="js/meusscripts.js"></script>
<script>
jQuery('#codigoProduto').submit(function(){
        jQuery('#modal-addprodutovenda').modal('show');
        jQuery.post({
            type:'POST',
            url:'retorno-produto-venda.php',
            data:jQuery('#codigoProduto').serialize(),
            success:function(data){jQuery('#retornoProduto').show().html(data);}
        });
    return false;
});

//aqui tu adiciona quem pode alterar tua função mostratotal()
jQuery('#valorCartao,#valorDinheiro').keyup(function(){ mostraTotal();});

function mostraTotal(){
    valorCartao = 0;
    valorDinheiro = 0;
    totalCompra = 0;
    valorTroco = 0;
    cartao = jQuery('#valorCartao').val();
    dinheiro = jQuery('#valorDinheiro').val();
    compra = jQuery('#valorCompra').val();
    //atribuir valor caso haja
    if(cartao != ''){valorCartao = cartao;}
    if(dinheiro != ''){valorDinheiro = dinheiro;}
    if(compra != ''){totalCompra = compra;}
    //perai que term que converter
    totalRecebido = getMoney(valorCartao) + getMoney(valorDinheiro);
    jQuery('#valorRecebido').val(formatReal(totalRecebido));
    
    //valor do troco
    valorTroco = totalRecebido - getMoney(totalCompra);
    jQuery('#valorTroco').val(formatReal(valorTroco));
};

//aqui tu converte real em moeda
function getMoney(str){ 
    if(str.match(/-/)){ return (parseInt( str.replace(/[\D]+/g,''))*-1); }else{ return parseInt( str.replace(/[\D]+/g,'') );}
}; 
//aqui tu converte moeda em real
function formatReal( int ){
        var tmp = int+'';
        var neg = false;
        if(tmp.indexOf("-") == 0)
        { neg = true; tmp = tmp.replace("-",""); }
        if(tmp.length == 1) tmp = "0"+tmp
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if( tmp.length > 6)
            tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        if( tmp.length > 9)
            tmp = tmp.replace(/([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g,".$1.$2,$3");
        if( tmp.length > 12)
            tmp = tmp.replace(/([0-9]{3}).([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g,".$1.$2.$3,$4");
        if(tmp.indexOf(".") == 0) tmp = tmp.replace(".","");
        if(tmp.indexOf(",") == 0) tmp = tmp.replace(",","0,");
    return (neg ? '-'+tmp : tmp);
};
//funções nas teclas
document.onkeyup=function(e){
    if(e.which == 121){window.location.href="sair.php";}
    if(e.which == 118){window.location.href="index.php";}
  return false;
};
//imprimir cupom de venda
jQuery(document).ready(function(){
<?php if(@$_GET['imprimir']){
        echo "  jQuery('#imprimirCupom').click(); ";
   } 
?>
    
});
jQuery('#imprimirCupom').fancybox({
    afterClose:function(){
        window.location.href='pdv.php';
    }
});
</script>