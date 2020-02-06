<html>
   <head>
<title>PHP 5 - Guia do Programador</title></head>
   <body>
    <?php
    for($i=0;$i<=10;$i++) {
    ?>
<p><font color="red">Valor de $i: <?=$i?></font>
    <?php
    if($i%2==0) {
    ?>
 ; [PAR]
    <?php
    }
    else echo "  ; [IMPAR]";
    ?>
    </p>
    <?php
    }
    ?>
 </body>
</html>
