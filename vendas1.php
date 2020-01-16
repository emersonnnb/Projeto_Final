<?php include('topo.php');
echo'
    <div class="container">
        <div class="row">
            <div class="col-lg-10" >
            <h3>Relatorios</h3>
                <form action="" method="post" id="form-vendas">
                   
                    <label class="col-lg-2">Venda
                        <select type="text" class="form-control" name="venda">
                        <option value="">selecione</option>';
                        $sql_p = mysqli_query($conexao,"SELECT * FROM vendas") or die (mysql_error());
                        while($dados_p = mysqli_fetch_array($sql_p)){echo'<option value="'.$dados_p['nome_produto'].'">'.$dados_p['id_usuario'].'</option>';} 
                        echo'
                        </select>
                    </label>
               
                    <label class="col-lg-2">Produto
                        <select type="text" class="form-control" name="produto" required/>
                        <option value="">selecione</option>';
                        $sql_v = mysqli_query($conexao,"SELECT * FROM vendas  ORDER BY nome_produto ASC ") or die (mysqli_error($conexao));
                            while($dados_v = mysqli_fetch_array($sql_v)){echo'<option value="'.$dados_v['id_usuario'].'">'.$dados_v['nome_produto'].'</option>';}                      
                            echo'
                       
                        </select>
                        
                    </label>
                    <label class="col-lg-3">Data Inicial
                        <input type="date" class="form-control" name="inicio" required/>
                    </label>
                    <label class="col-lg-3">Data Final
                        <input type="date" class="form-control" name="fim" required/>
                    </label>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filtrar</label>
                </form>
              
            </div>
            <div class="col-lg-2" align="right">
                <a href="index.php" class="btn btn-primary" style="margin:5px">Voltar</a>
            </div>
        </div>
        <div id="retornoVendas"></div>
    </div>';
include('rodape.php');?>
<script>
jQuery('#form-vendas').submit(function(){
    jQuery.ajax({
        type:'POST',
        url:'retorno-vendas.php',
        data:jQuery('#form-vendas').serialize(),
        success:function(data){jQuery('#retornoVendas').html(data);}
    });
    return false;
});
</script>