<?php 

$codpedido = $_GET['codpedido'];

require "Pedido.class.php";

$pedido = new Pedido();
$pedido->codpedido = $codpedido;
$pedido->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Pedido"; ?>
<?php include "includes/header.php"; ?>

<section class="container">
    <?php echo $msg; ?>
</section>

<?php include "includes/footer.php"; ?>