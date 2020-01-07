<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="iso8859-1">
  <title>PDV-SIM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/estilo-login.css">
  <style>
     .divRetorno {
        width:20%;
        position:absolute;
        z-index:100;
        top:10% !important;
        right: 0.5%;
        display: block;/*flutuando*/
        margin: 3px !important;
      }
  </style>
</head>
<body>
<div class="col-lg-3 divRetorno" id="retorno"></div>
<div class="main">
  <div class="container">
    <center>
      <div class="middle">
        <div id="login">
          <form action="" method="post" id="form-login" autocomplete="off">
            <fieldset class="clearfix">
              <p><span class="fa fa-user"></span>
                <input type="text" name="cpf" Placeholder="CPF" required>
              </p>
              <p><span class="fa fa-lock"></span>
                <input type="password" name="senha" Placeholder="Senha" minlength="6" required>
              </p>
              <div>
                <span style="width:48%; text-align:left;  display: inline-block;">
                </span>
                <span style="width:50%; text-align:right;  display: inline-block;">
                  <input type="submit" value="Entrar">
                </span>
              </div>
            </fieldset>
            <div class="clearfix"></div>
          </form>
          <div class="clearfix"></div>
        </div> <!-- end login -->
        <div class="logo"><b>PDV-SIM</b>
          <div class="clearfix"></div>
        </div>
      </div>
    </center>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script>
jQuery('#form-login').submit(function(){
  jQuery.ajax({
    type:'POST',
    url:'proc_login.php',
    data:jQuery('#form-login').serialize(),
    success:function(data){
      jQuery('#retorno').show().html(data);
      //jQuery('#retorno').show().fadeOut(3000).html(data);
      jQuery('#form-login').each(function(){this.reset();});
    }
  });
  return false;
});
</script>
</body>
</html>
