<?php
include "include\header.php";
?>
<div class="container">
<form name="usuario" method="post" action="gravarus.php">
<h1>Cadastro de Usuários</h1>
<div class="form-group">
<label for="nome">Nome:</label>
<input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
</div>
<div class="form-group">
<label for="celular">Celular:</label>
<input type="text" class="form-control" id="celular" placeholder="Celular com whatsapp" name="celular">
</div>

<div class="form-group">
<label for="email">E-mail:</label>
<input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
</div>

<div class="form-group">
<label for="senha">Senha:</label>
<input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
</div>

<input type="submit" name="cadastrar" class="btn btn-primary"value="Cadastrar"/>
<button type="reset" class="btn btn-danger">Limpar</button>

</form>
</div>
<?php
include "include/footer.php";
?>