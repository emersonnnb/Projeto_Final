 <?php
session_start();
include('conexao.php');
include('funcoes.php');
$iduser = $_SESSION['iduser'];
$usuario = $_SESSION['nomeuser'];//pega usuario que está executando a ação
$ip = $_SERVER['REMOTE_ADDR']; // pegar ip da maquina
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); //pega nome da maquina

$codigo = $_POST['codigo'];
$sql = mysql_query("SELECT * FROM produtos WHERE codigobarra='$codigo' AND status='1'") or die (mysql_error());
if($rows = mysql_num_rows($sql) >= 1){
$dados_pp = mysql_fetch_array($sql);
    echo'
        <input type="text" class="hidden" name="codigobarra" value="'.$dados_pp['codigobarra'].'"/>
        <label class="col-lg-12">Nome
            <input type="text" class="form-control" name="nome_produto" value="'.$dados_pp['nome'].'" readonly/>
        </label>
        <label class="col-lg-12">Valor
            <input type="text" class="form-control real" name="precovenda" value="'.Real($dados_pp['precovenda']).'" readonly/>
        </label>
        <label class="col-lg-12">Estoque atual
            <input type="text" class="form-control" name="estoqueatual" value="'.$dados_pp['estoqueatual'].'" readonly/>
        </label>
        <label class="col-lg-12">Quantidade
            <input type="text" class="form-control" name="quantidade" required/>
        </label>';
        
}else{echo '<label class="col-lg-12"><center>Produto bloqueado pra <br> venda  ou <br> fora de estoque</center></label>';}
?>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/jquery.maskMoney.js"></script>
<script src="js/meusscripts.js"></script>