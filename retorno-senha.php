 <?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = utf8_decode($_SESSION['nomeuser']);//pega usuario que está executando a ação
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM usuario WHERE id='$id'") or die (mysql_error());
$dados_s = mysql_fetch_array($sql);
echo'
<input type="text" class="hidden" name="id" value="'.$dados_s['id'].'"/>
<input type="text" class="hidden" name="nome" value="'.$dados_s['nome'].'"/>
<div class="modal-body">
    <div class="row">
        <label class="col-lg-12">Senha (mínimo 6)
            <input type="password" class="form-control" name="senha" minlength="6" required/>
        </label>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>';
?>
<style>
.hidden{
  display: none;
}</style>
