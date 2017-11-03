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
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                  <p><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success') == TRUE): ?>
                  <p><?php echo $this->session->flashdata('success'); ?></p>
                <?php endif; ?>
                <div class="x_content">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class="topo-table">
                      <tr>
                        <th>#</th>
                        <th>Foto</th>
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
                            <td><img src="<?php echo site_url().'assets/foto/'.$usuarios->foto;?>" alt="foto" class="img-responsive" width="50px" heigth="50px;" /></td>
                            <td><?php echo $usuarios->nome; ?></td>
                            <td><?php echo $usuarios->login; ?></td>
                            <td><?php echo $usuarios->telefone; ?></td>
                            <td><?php echo $usuarios->permissao; ?></td>
                            <td><a href="<?php echo base_url().'usuarios/editar/'.$usuarios->idUsuarios; ?>" class="btn btn-info tip-top" title="Editar Usuário"><i class="fa fa-edit"></i></a><a href="<?php echo base_url().'usuarios/excluir/'.$usuarios->idUsuarios; ?>" class="btn btn-danger tip-top" title="Excluir Usuário"><i class="fa fa-trash-o"></i></a></td>
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



