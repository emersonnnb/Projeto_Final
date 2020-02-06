<?php 

$codcliente = $_GET['codcliente'];

require "Cliente.class.php";

$cliente = new Cliente();
$cliente->codcliente = $codcliente;
$cliente->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Cliente"; ?>
<?php include "includes/header.php"; ?>

<section class="container">
    <?php echo $msg; ?>
</section>

<?php include "includes/footer.php"; ?>