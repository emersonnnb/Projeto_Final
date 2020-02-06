<?php 

$codproduto = $_GET['codproduto'];

require "Produtos.class.php";

$produto = new Produto();
$produto->codproduto = $codproduto;
$produto->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Produto"; ?>
<?php include "includes/header.php"; ?>

<section class="container">
    <?php echo $msg; ?>
</section>

<?php include "includes/footer.php"; ?>