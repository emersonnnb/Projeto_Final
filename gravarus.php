<?php 
include "conexao.php";

$nome   =$_POST['nome'];
$celular=$_POST['celular'];
$email  =$_POST['email'];
$senha  =$_POST['senha'];

$sql="insert into usuario values(null,'".$nome."','".$celular."','".$email."','".$senha."')";
$consulta=mysqli_query($conexao,$sql);
if($sql){
	echo "<script type=\"text/javascript\">
	alert(\"Usuário Cadastrado com Sucesso.\");
	</script>";
	
}else{
	echo "<script type=\"text/javascript\">
	alert(\"Usuário não cadastrado.\");
	</script>";
	
}
?>
