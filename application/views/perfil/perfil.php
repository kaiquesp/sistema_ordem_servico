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
        <?php if ($this->session->flashdata('error') == TRUE): ?>
          <div class="alert alert-error alert-dismissible fade in" role="alert">
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
        <div class="x_content">
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
                <img src="<?php echo site_url().'assets/foto/'.$foto;?>" alt="foto" class="img-circle profile_img avatar-view">
              </div>
            </div><br />
            <div class="span6 offset3" style="text-align: center">
                <button class="btn btn-success" align="center" data-toggle="modal" data-target="#modalfoto"><i class="fa fa-edit m-right-xs"></i>Alterar Foto</button>
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

            <!-- Modal Alterar Foto-->
            <div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form action="adicionarFoto" id="formArquivo" enctype="multipart/form-data" method="post" class="form-horizontal" >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title text-center" id="exampleModalLabel">Alterar Foto do Perfil</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo site_url().'assets/foto/'.$foto;?>" alt="foto" class="img-circle profile_img avatar-view">
                      <div class="form-group">
                          <label for="preco" class="control-label"><span class="required">Arquivo*</span></label>
                          <div class="controls">
                              <input class="form-control" id="arquivo" type="file" name="userfile" /> <strong>(txt | pdf | gif | png | jpg | jpeg)</strong><br />
                              <input id="usuarioId" class="span12" type="hidden" name="usuarioId" value="<?php echo $id ?>"  />
                              <strong>Atenção: A foto será atualizada após realizar um novo login</strong>
                          </div>
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

            <div class="container">
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <h1>
                      Atividades recentes
                    </h1>
                  </section>

                  <!-- Main content -->
                  <section class="content">

                    <!-- row -->
                    <div class="row">
                      <div class="col-md-12">
                        <!-- The time line -->
                        
                        <ul class="timeline">
                          <?php 
                          if(!empty($result)){
                            foreach ($result as $r){
                            echo '<!-- timeline time label -->';
                            echo '<li class="time-label">';
                                  echo "<span class='$r->cor'>";
                                    echo date(('d/m/Y'),strtotime($r->data));
                                  echo '</span>';
                            echo '</li>';
                            echo '<!-- /.timeline-label -->';
                            echo '<!-- timeline item -->';
                            echo '<li>';
                              echo "<i class='".$r->icone." bg-blue'></i>";

                              echo '<div class="timeline-item">';
                                echo '<span class="time"><i class="fa fa-clock-o"></i>' .$r->hora.'</span>';

                                echo "<h3 class='timeline-header $r->cor'>".$r->titulo."</h3>";

                                echo '<div class="timeline-body">';
                                  echo $r->conteudo;
                                echo '</div>';
                              echo '</div>';
                            echo '</li>';
                            echo '<!-- END timeline item -->';
                            } 
                          }else{
                            echo '<!-- timeline time label -->';
                            echo '<li class="time-label">';
                                  echo "<span class=''>";
                                   
                                  echo '</span>';
                            echo '</li>';
                            echo '<!-- /.timeline-label -->';
                            echo '<!-- timeline item -->';
                            echo '<li>';
                              echo "<i class=bg-blue'></i>";

                              echo '<div class="timeline-item">';

                                echo "<h3 class='timeline-header bg-red'>Atenção</h3>";

                                echo '<div class="timeline-body">';
                                  echo 'Não há atividades recentes';
                                echo '</div>';
                              echo '</div>';
                            echo '</li>';
                            echo '<!-- END timeline item -->';
                          }
                        ?>
                        </ul>
                        
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </section>
                  <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
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