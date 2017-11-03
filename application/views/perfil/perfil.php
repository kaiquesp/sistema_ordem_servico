<?php 
$session = $this->session->userdata();
$id = $session['id'];
$nome = $session['nome'];
$email = $session['email'];
$login = $session['login'];
$telefone = $session['telefone'];
$celular = $session['celular'];
$permissao = $session['permissao'];
$foto = $session['foto'];
?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Perfil do usuário</h3>
    </div>
  </div>
  
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
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
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
                <img src="<?php echo site_url().'assets/foto/'.$foto;?>" alt="foto" class="img-circle profile_img avatar-view">
              </div>
            </div>
            <h3><?php echo $nome; ?></h3>

            <ul class="list-unstyled user_data">
              <li><i class="fa fa-user"></i> <?php echo $login; ?>
              </li>

              <li>
                <i class="fa fa-phone"></i> <?php echo $telefone; ?>
              </li>

              <li>
                <i class="fa fa-mobile"></i> <?php echo $celular; ?>
              </li>

              <li class="m-top-xs">
                <i class="fa fa-at"></i>
                <a href="http://www.kimlabs.com/profile/" target="_blank"><?php echo $email; ?></a>
              </li>
            </ul>

            <button class="btn btn-success" data-toggle="modal" data-target="#modalperfil"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</button>


            <!-- Modal -->
            <div class="modal fade" id="modalperfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form id="formSenha" action="<?php echo base_url();?>home/alterarDados" method="post">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title text-center" id="exampleModalLabel">Alterar dados do usuário</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="span12" style="margin-left: 0">
                            <label for="">Senha Atual</label>
                            <input type="password" id="oldSenha" name="oldSenha" class="form-control" autofocus="" />
                        </div>
                        <div class="span12" style="margin-left: 0">
                            <label for="">Nova Senha</label>
                            <input type="password" id="novaSenha" name="novaSenha" class="form-control" />
                        </div>
                        <div class="span12" style="margin-left: 0">
                            <label for="">Confirmar Senha</label>
                            <input type="password" name="confirmarSenha" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                  </div>
                 </form>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                  <!-- start recent activity -->
                  <ul class="messages">
                    <li>
                      <img src="images/img.jpg" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-info">24</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Desmond Davison</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br />
                        <p class="url">
                          <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                          <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                        </p>
                      </div>
                    </li>
                    <li>
                      <img src="images/img.jpg" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-error">21</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Brian Michaels</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br />
                        <p class="url">
                          <span class="fs1" aria-hidden="true" data-icon=""></span>
                          <a href="#" data-original-title="">Download</a>
                        </p>
                      </div>
                    </li>
                    <li>
                      <img src="images/img.jpg" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-info">24</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Desmond Davison</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br />
                        <p class="url">
                          <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                          <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                        </p>
                      </div>
                    </li>
                    <li>
                      <img src="images/img.jpg" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-error">21</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Brian Michaels</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br />
                        <p class="url">
                          <span class="fs1" aria-hidden="true" data-icon=""></span>
                          <a href="#" data-original-title="">Download</a>
                        </p>
                      </div>
                    </li>

                  </ul>
                  <!-- end recent activity -->

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        

<script>
function validaSenha (input){ 
    if (input.value != document.getElementById('txtSenha').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>