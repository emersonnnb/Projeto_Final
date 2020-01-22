<?php include('topo.php');
echo'
<div class="container" style="height:100%;">
        <div class="page-header" id="banner" style="text-align:center">
        
            <div class="row">';

            if(PermissaoCheck('estoque',$_SESSION['iduser'])=='checked'){echo'
                <div class="col-lg-2">
                    <a onclick="estoque()" class="btn btn-outline-info"><i class="fa fa-cubes fa-3x"></i><br>Estoque</a>
                </div>';}
                if(PermissaoCheck('estoqueminimo',$_SESSION['iduser'])=='checked'){echo'
                <div class="col-lg-2">
                    <a onclick="estoqueMinimo()" class="btn btn-outline-info"><i class="fa fa-cube fa-3x"></i><br>Est.Mínimo</a>
                </div>';}
                if(PermissaoCheck('vencimentos',$_SESSION['iduser'])=='checked'){echo'
                <div class="col-lg-2">
                    <a onclick="vencimentos()" class="btn btn-outline-info"><i class="fa fa-exclamation-triangle fa-3x"></i><br>Vencimentos</a>
                </div>';}
                if(PermissaoCheck('vendas',$_SESSION['iduser'])=='checked'){echo'
                <div class="col-lg-2">
                    <a onclick="vendas()" class="btn btn-outline-info"><i class="fa fa-bar-chart fa-3x"></i><br>Vendas</a>
                </div>';}
                if(PermissaoCheck('pdv',$_SESSION['iduser'])=='checked'){echo'
                <div class="col-lg-2">
                    <a onclick="pdv()" class="btn btn-outline-info"><i class="fa fa-shopping-cart fa-3x"></i><br>PDV</a>
                </div> ';}
                if(PermissaoCheck('usuarios',$_SESSION['iduser'])=='checked'){echo'
                <div class="col-lg-2">
                    <a onclick="usuarios()" class="btn btn-outline-info"><i class="fa fa-user fa-3x"></i><br>Usuário</a>
                </div>';}
                echo'
            </div>
        </div>
</div>
';
include('rodape.php');?>