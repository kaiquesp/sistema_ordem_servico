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
  <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/css/pnotify/pnotify.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/pnotify/pnotify.buttons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/pnotify/pnotify.nonblock.css" rel="stylesheet">

  <script src="<?php echo base_url();?>assets/js/jquery/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/validate.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

  <!-- PNotify -->
  <script src="<?php site_url(); ?>../assets/js/pnotify/pnotify.js"></script>
  <script src="<?php site_url(); ?>../assets/js/pnotify/pnotify.buttons.js"></script>
  <script src="<?php site_url(); ?>../assets/js/pnotify/pnotify.nonblock.js"></script>
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="log">
        <a class="logo" href="/"><h1 class="text-center">Sistema JapaCar</h1></a>
      </div>
      <div class="animate form login_form">
        <section class="login_content">
          <?php if ($this->session->flashdata('error') == TRUE): ?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <p><?php echo $this->session->flashdata('error'); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success') == TRUE): ?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <p><?php echo $this->session->flashdata('success'); ?></p>
          </div>
        <?php endif; ?>
          <form  class="form-vertical" id="" method="post" action="reset_pass_enviar_link">
            <div>
              <input type="email" id="email" name="email" class="form-control" placeholder="informe o email cadastrado" required="" />
            </div>
            <div>
              <div id="progress-acessar" class='hide progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>
              
              <div class="row">
                <div class="col-md-6 col-xs-3 col-sm-6">
                  <a href="<?php echo base_url(); ?>" class="btn btn-default form-control" id="btn-acessar"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
                <div class="col-md-6 col-xs-3 col-sm-6">
                  <button class="btn btn-primario submit form-control" id="btn-acessar" type="submit"><i class="fa fa-envelope"></i> Recuperar Senha</button>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
          </form>
        </section>
      </div>
    </div>
  </div>

  

</body>
</html>