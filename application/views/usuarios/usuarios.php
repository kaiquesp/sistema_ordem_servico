          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de usuários</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <a href="<?php echo base_url()?>usuarios/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Usuário</a>
                <?php if(isset($msg)){
                  echo "<div class='box-header with-border'>".$msg."</div>";
                } 
                ?>
                <div class="x_content">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Telefone</th>
                        <th>Nível</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if(isset($resultadousuario)){
                        foreach ($resultadousuario as $usuarios){
                          ?>
                          <tr>
                            <td><?php echo $usuarios->idUsuarios; ?></td>
                            <td><?php echo $usuarios->nome; ?></td>
                            <td><?php echo $usuarios->login; ?></td>
                            <td><?php echo $usuarios->telefone; ?></td>
                            <td><?php echo $usuarios->permissao; ?></td>
                            <td><a href="<?php echo base_url().'usuarios/editar/'.$usuarios->idUsuarios; ?>" class="btn btn-info tip-top" title="Editar Usuário"><i class="fa fa-edit"></i></a></td>
                          </tr>
                          <?php 
                        }
                      }
                      ?>

                    </tbody>
                  </table>


                </div>
              </div>
            </div>
          </div>
        </div>


