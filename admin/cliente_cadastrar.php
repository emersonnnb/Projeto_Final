
	<?php
include "includes/header.php";
?>
  <?php
// Conexão com o banco de dados
include "conexao/conexao.php";

if (isset($_POST['cadastrar'])) {
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
$sql = "insert into cliente values(null,'".$nome."','".$email."','".$cpf."','".$rg."','".$nascimento."','".$celular."','".$senha."','".$cep."','".$endereco."','".$numero."','".$complemento."','".$bairro."','".$cidade."','".$estado."','".$nome_imagem."')";
		$consulta = mysqli_query($conexao, $sql);
		// Se os dados forem inseridos com sucesso
		if ($sql){
				echo "
			<script type=\"text/javascript\">
				alert(\"Cadastrado com Sucesso.\");
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
    
                                            