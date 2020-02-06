<?php
include "header2.php";
?>


<div class="container">
    <br>
    <div class="frase container"><br>
    <h3>Fale Conosco</h3>
<hr>
    </div>
<br>
    <form>
    <div class="row">
        <div class="col">
        <h5><label for="celular"> Nome:</label></h5>
        <input type="text" class="form-control" placeholder="Nome">
        </div>

        <div class="col">
        <h5><label for="celular"> Celular:</label></h5>
        <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular">
        </div>

    </div>
    <div class="row">
        <div class="col">
        <h5><label for="celular"> email:</label></h5>
        <input type="text" class="form-control" placeholder="email">
        </div>
    </div>   

    <div class="row">
        <div class="col">
        <h5><label for="exampleFormControlTextarea1">Digite seu feedback:</label></h5>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" ></textarea>
        </div>
    </div>

    </form>

    <br>
</div>





<?php
include "include/footer2.php";
?>