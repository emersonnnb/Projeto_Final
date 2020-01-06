<?php echo'
  <!-- modal-altsenhausuario-->
  <div class="modal" id="modal-altsenhausuario" tabindex="-1">
      <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Alterar senha</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
              </button>
          </div>
          <form action="" method="post" id="form-altsenhausuario">
          <div id="retornoSenhaUsuario"></div>
          </form>
          </div>
      </div>
  </div>
  <!-- modal-altsenha-->
</body>
</html>';
ob_end_flush();
?>
<script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/jquery.maskedinput.min.js"></script>
  <script src="js/jquery.maskMoney.js"></script>
  <script src="js/meusscripts.js"></script>
  <script>
    //alterar senha 
    function alterarSenhaUsuario(id){
      jQuery('#modal-altsenhausuario').modal('show');
      jQuery.get('retorno-senha.php',{id:id},function(data){
        jQuery('#retornoSenhaUsuario').show().html(data);
      });
      return false;
    };
    //form-altsenhausuario
    jQuery('#form-altsenhausuario').submit(function(){
      jQuery('#modal-altsenhausuario').modal('hide');
      jQuery.ajax({
        type:'POST',
        url:'update-senha.php',
        data:jQuery('#form-altsenhausuario').serialize(),
        success:function(data){
          jQuery('#retorno').show().fadeOut(1500).html(data);
        }
      });
      return false;
    });
    //form-empresa
    jQuery('#form-empresa').submit(function(){
      jQuery('#modal-empresa').modal('hide');
      jQuery.ajax({
        type:'POST',
        url:'insert-update-empresa.php',
        data:jQuery('#form-empresa').serialize(),
        success:function(data){
          jQuery('#retorno').show().fadeOut(2000).html(data);
        }
      });
      return false;
    });
  </script>

