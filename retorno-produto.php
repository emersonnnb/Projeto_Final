 <?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = utf8_decode($_SESSION['nomeuser']);//pega usuario que est� executando a a��o
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$id = $_GET['id'];
$sql = mysqli_query($conexao,"SELECT produtos.*, unidade.id_u,nome_u FROM  produtos INNER JOIN unidade ON produtos.unidade = unidade.id_u WHERE id='$id'") or die (mysqli_error($conexao));
$dados_p = mysqli_fetch_array($sql);
echo'
<input type="text" class="hidden" name="id" value="'.$id.'"/>
<div class="modal-body">
    <div class="row">
        <label class="col-lg-4">C�digo de barra
            <input type="number" class="form-control" name="codigobarra" value="'.$dados_p['codigobarra'].'" required/>
        </label>
        <label class="col-lg-6">Nome
            <input type="text" class="form-control" name="nome" value="'.$dados_p['nome'].'" required/>
        </label>
        <div class="row"></div>
        <label class="col-lg-3">Unidade
        <select type="text" class="form-control" name="unidade" required>
            <option value="'.$dados_p['id_u'].'">'.$dados_p['nome_u'].'</option>';
            $sql_u = mysqli_query($conexao,"SELECT * FROM unidade ORDER BY nome_u ASC") or die (mysqli_error($conexao));
            while($dados_u = mysqli_fetch_array($sql_u)){echo'<option value="'.$dados_u['id_u'].'">'.$dados_u['nome_u'].'</option>';}
            echo'
        </select>
        </label>
        <label class="col-lg-2">Pre�o compra
            <input type="text" class="form-control real" name="precocompra" value="'.Real($dados_p['precocompra']).'"/>
        </label>
        <label class="col-lg-2">Pre�o venda
            <input type="text" class="form-control real" name="precovenda" value="'.Real($dados_p['precovenda']).'" required/>
        </label>
        <label class="col-lg-2">Est.m�nimo
            <input type="text" class="form-control" name="estoqueminimo" value="'.$dados_p['estoqueminimo'].'"/>
        </label>
        <label class="col-lg-2">Est.atual
            <input type="text" class="form-control" name="estoqueatual" value="'.$dados_p['estoqueatual'].'"/>
        </label>
        <div class="row"></div>
        <label class="col-lg-3">Vencimento 1
            <input type="date" class="form-control" name="vencimento1" value="'.date($dados_p['vencimento1']).'"/>
        </label>
        <label class="col-lg-3">Vencimento 2
            <input type="date" class="form-control" name="vencimento2" value="'.date($dados_p['vencimento2']).'"/>
        </label>
        <label class="col-lg-3">Vencimento 3
            <input type="date" class="form-control" name="vencimento3" value="'.date($dados_p['vencimento3']).'"/>
        </label>
        <label class="col-lg-3">Liberado
            <select type="text" class="form-control" name="status">';
            if($dados_p['status'] == 1){echo '<option value="1">Liberado</option>';}
            else{echo '<option value="0">Bloqueado</option>';}
            echo'
            <option value="1">Liberado</option>
            <option value="0">Bloqueado</option>
            </select>
        </label>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success" >Salvar</button>
    <button type="button" class="btn btn-danger">Excluir</button>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
</div>';
?>
<style>
.hidden{
  display: none;
}</style>
