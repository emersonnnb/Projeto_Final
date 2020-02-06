<?php 

$id = $_GET['id'];

require_once "Restrito.class.php";

$restrito = new Restrito();
$restrito->id = $id;
$restrito->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Usuario"; ?>
<?php include "includes/header.php"; ?>

<section class="container">
    <?php echo $msg; ?>
</section>

<?php include "includes/footer.php"; ?>