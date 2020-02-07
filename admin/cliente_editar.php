<?php
$page = 'listar_cliente';
session_start();
require('includes/header.php');
include('conexao/conexao.php');

if(isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])):
	    $id_cliente = $_REQUEST['cliente'];
		$sql = "select * from cliente where id_cliente=$id_cliente";
		$consulta = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($consulta);
endif;

if (isset($_GET['alterar'])) {
    // Recupera os dados dos campos
    $nome = $_POST['nome'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
	$nascimento = $_POST['nascimento'];
	$celular = $_POST['celular'];
	$senha = $_POST['senha'];
	$cep = $_POST['cep'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$imagem = $_FILES["imagem"];
    // Se a foto estiver sido selecionada
if (!empty($imagem["name"])) {
    // Largura máxima em pixels
    $largura = 95000;
    // Altura máxima em pixels
    $altura = 980000;
    // Tamanho máximo do arquivo em bytes
    $tamanho = 1000000000;
    $error = array();
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
        $error[1] = "Isso não é uma imagem válida.";
        } 
    // Pega as dimensões da imagem
    $dimensoes = getimagesize($imagem["tmp_name"]);
    // Verifica se a largura da imagem é maior que a largura permitida
    if($dimensoes[0] > $largura) {
        $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
    }
    // Verifica se a altura da imagem é maior que a altura permitida
    if($dimensoes[1] > $altura) {
        $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
    }	
    // Verifica se o tamanho da imagem é maior que o tamanho permitido
    if($imagem["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
    }
    // Se não houver nenhum erro
    if (count($error) == 0) {
        // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        // Gera um nome único para a imagem
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        // Caminho de onde ficará a imagem
        $caminho_imagem = "fotoscliente/" . $nome_imagem;
        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
        // Insere os dados no banco
$sql = "UPDATE cliente SET nome = '$nome',email = '$email', cpf = '$cpf',rg = '$rg', nascimento = '$nascimento',celular = '$celular',  senha = '$senha', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade',estado = '$estado', imagem = '$nome_imagem' WHERE id_cliente= $id_cliente'";


        $consulta = mysqli_query($conexao, $sql);
        // Se os dados forem inseridos com sucesso
        if ($sql){
                echo "
            <script type=\"text/javascript\">
                alert(\"Alterado com Sucesso.\");
            </script>
        ";
        }
    }
    // Se houver mensagens de erro, exibe-as
    if (count($error) != 0) {
        foreach ($error as $erro) {
            echo $erro . "<br />";
        }
    }
    }
}
?>

<body>
<div class="container">
  <h2>Alterar  cliente</h2>
  
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" enctype="multipart/form-data" name="alterar" >
<div class="row">
                <div class="form-group col">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" maxlength="10" placeholder="Insira seu nome">
                </div>
                <div class="form-group col">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com.br">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx">
                </div>
                <div class="form-group col-lg-3">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="xxxxxxxx-x">
                </div>
                <div class="form-group col">
                    <label for="nascimento">Data de nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="senha">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="+00(00)00000-0000">
                </div>
                <div class="form-group col-lg-6">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="senha">
                </div>
            </div>
            <br>
            <h5>Endereço</h5>
            <HR>
            <div class="row">
                <div class="form-group col-lg-6 col-6">
                    <label for="cep">Buscar pelo Cep</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Insira o CEP">
                    <button class="btn btn-primary mt-2" type="button" id="buscaCEP">Buscar</button>
                </div>
            </div>

            <div class="row ml-1">
                <div class="form-group col-lg-4 col-12">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" size="82" readonly>
                </div>
                <div class="form-group col-lg-4">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero da casa">
                </div>
                <div class="form-group col-lg-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="casa/apartamento/bloco">
                </div>
            </div>
            <div class="row ml-1">
                <div class="form-group col-lg-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" readonly>
                </div>
                <div class="form-group col-lg-1">
                    <label for="uf">Estado/UF</label>
                    <input type="text" class="form-control" id="uf" name="estado" readonly >
                </div>
                <div class="form-group col-lg-5">
                    <label for="imagem">Imagem:</label>
                    <input type="file" class="form-control" id="imagem" placeholder="Imagem" name="imagem">
                </div>
            </div>
            <input type="submit" name="editar" class="btn btn-success" value="Atualizar">
                <a class="btn btn-primary" href="usuario_list.php" role="button">Voltar</a>

<input type="submit" name="alterar" class="btn btn-primary"value="Alterar"/>
<button type="reset" class="btn-primary">Limpar</button>
</form>
</div>
<script src="js/cep.js" type="text/javascript"></script>
<?php require('includes/footer.php') ?>
