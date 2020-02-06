<?php
include "include/header.php";
include("conexao.php");
$codcliente = $_POST["codcliente"];
	$sql = "SELECT * FROM cliente WHERE codcliente = $codcliente";
    $consulta = mysqli_query($conexao, $sql);
  if(mysqli_num_rows ($consulta) == ' ')
   echo "Cliente não cadastrado";
else
{
   $linha = mysqli_fetch_array($consulta);
   $codcliente = $linha["codcliente"];
   $nome = $linha["nome"]; 
   $cpf = $linha["cpf"];   
   $dtnasc = $linha["dtnasc"];
   $identidade = $linha["identidade"]; 
   $cep = $linha["cep"];
   $endereco = $linha["endereco"];
   $numero = $linha["numero"];
   $complemento = $linha["complemento"];
   $bairro = $linha["bairro"];
   $cidade = $linha["cidade"];
   $estado = $linha["estado"];
   $email = $linha["email"];
   $senha = $linha["senha"];
   $celular = $linha["celular"];
   $imagem = $linha["imagem"];
?>
 <h2>Alterar  cliente</h2>
  
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" enctype="multipart/form-data" name="alterar" >

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome" value="<?php echo $nome; ?>" name="nome">
    </div>
	<div class="form-group">
      <label for="cpf">CPF:</label>
      <input type="text" class="form-control" value="<?php echo $cpf; ?>"id="cpf" placeholder="CPF" name="cpf">
    </div> 
<div class="form-group">
      <label for="dtnasc">Data de Nascimento:</label>
<input type="date" class="form-control" value="<?php echo $dtnasc; ?>"id="dtnasc" placeholder="Data de Nascimento" name="dtnasc">
    </div> 	
<div class="form-group">
      <label for="cep">CEP:</label>
<input type="text" class="form-control" value="<?php echo $cep; ?>" id="cep" placeholder="CEP" name="cep">
   
	
<span class="input-group-btn">
   <button class="btn btn-secondary" type="button" id="buscaCEP">Buscar</button>
</span>
 </div> 
 
 
<div id="cepstatus" ></div>	
	
<div class="form-group">
      <label for="endereco">Endereço:</label>
<input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" readonly/>
</div> 		
<div class="form-group">
      <label for="numero">Número:</label>
<input type="text" class="form-control" id="numero" value="<?php echo $numero; ?>" placeholder="Número" name="numero">
</div> 
<div class="form-group">
      <label for="complemento">Complemento:</label>
<input type="text" value="<?php echo $complemento; ?>" class="form-control" id="complemento" placeholder="Complemento" name="complemento">
</div> 

<div class="form-group">
      <label for="bairro">Bairro:</label>
<input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" readonly/>
</div>

<div class="form-group">
      <label for="cidade">Cidade:</label>
<input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" readonly/>
</div>
<div class="form-group">
<label for="estado">Estado:</label>
<input type="text" class="form-control" id="uf" placeholder="Estado" name="estado" readonly/></div>
<div class="form-group">
<label for="telefone">Telefone:</label>
<input type="text"  value="<?php echo $telefone; ?>" class="form-control" id="telefone" placeholder="Telefone" name="telefone"></div>
<div class="form-group">
<label for="celular">Celular:</label>
<input type="text"  value="<?php echo $celular; ?>" class="form-control" id="celular" placeholder="Celular" name="celular"></div>
<div class="form-group">
<label for="email">E-mail:</label>
<input type="email" value="<?php echo $email; ?>" class="form-control" id="email" placeholder="E-mail" name="email"></div>

<div class="form-group">
<label for="senha">Senha:</label>
<input type="password"  value="<?php echo $senha; ?>"class="form-control" id="senha" placeholder="Senha" name="senha"></div>

<div class="form-group">
<label for="imagem">Imagem:</label>
<input type="file" class="form-control" value="<?php echo $imagem; ?>" id="imagem" placeholder="Imagem" name="imagem"></div>


<input type="submit" name="alterar" class="btn btn-primary"value="Alterar"/>
<button type="reset" class="btn-primary">Limpar</button>
</form>
</div>
<script src="js/cep.js" type="text/javascript"></script>

<?php
include "include/footer.php";
?>
