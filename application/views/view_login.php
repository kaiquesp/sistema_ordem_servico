<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistema JapaCar </title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url();?>assets/css/font-awesome/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url();?>assets/css/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url();?>assets/css/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url();?>assets/css/custom.min.css" rel="stylesheet">

  <script src="<?php echo base_url();?>assets/js/jquery/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
  
  <script src="<?php echo base_url();?>assets/js/validate.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <?php if($this->session->flashdata('error') != null){?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->flashdata('error');?>
          </div>
          <?php }?>
          <form  class="form-vertical" id="formLogin" method="post" action="">

            <h1>Sistema JapaCar</h1>
            <div>
              <input type="text" id="user" name="user" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" id="senha" name="senha" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <div id="progress-acessar" class='hide progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>
              <a class="reset_pass" href="#">Esqueceu a senha?</a>
              <button class="btn btn-default submit" type="submit">Entrar</button>
            </div>

            <div class="clearfix"></div>
          </form>
        </section>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#user').focus();
      $("#formLogin").validate({
       rules :{
        user: { required: true},
        senha: { required: true}
      },
      messages:{
        user: { required: 'Campo Requerido.'},
        senha: {required: 'Campo Requerido.'}
      },
      submitHandler: function( form ){       
       var dados = $( form ).serialize();
       $('#btn-acessar').addClass('disabled');
       $('#progress-acessar').removeClass('hide');
       $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>home/verificarLogin?ajax=true",
        data: dados,
        dataType: 'json',
        success: function(data)
        {
          if(data.result == true){
            window.location.href = "<?php echo base_url();?>home";
          }
          else{
            $('#btn-acessar').removeClass('disabled');
            $('#progress-acessar').addClass('hide');
            /*$('#call-modal').trigger('click');*/
            $('#myModal').modal('show');
          }
        }
      });
       return false;
     },
     errorClass: "help-inline",
     errorElement: "span",
     highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    }
  });
    });
  </script>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Falha no Login</h4>
      </div>
      <div class="modal-body">
       <p style="">Os dados de acesso estão incorretos, por favor tente novamente!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>