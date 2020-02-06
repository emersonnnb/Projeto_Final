<?php
include('conexao.php');

$codcliente = $_REQUEST['cliente'];

$sql = "delete from cliente where codcliente=$codcliente";

$resultado = mysqli_query($conexao, $sql);
echo $codcliente;
if ($resultado==0){
	
   echo "Não foi possível excluir";
   
}else{
	 echo "Excluido com sucesso";
   header("Location: listacliente.php");
}


?>
