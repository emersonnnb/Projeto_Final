<html>
   <head>
   <meta charset="UTF-8">
<title>PHP</title></head>
   <body>
    <?php
	$n1=8;
	$n2=7;
	$n3=7;
	$md=($n1+$n2+$n3)/3;
	echo ("Média:".$md);
    if($md>=7){
		echo "<br>";
		echo "Aprovado";
    }else{
	if($md<5){
	echo "<br>";
    echo "Reprovado";
    }else{ 
	echo "<br>";	
	echo " Recuperação";
	}
	}
    ?>   
</body>
</html>
