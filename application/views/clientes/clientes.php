  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Lista de usuários</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aProduto')){ ?>
        <a href="<?php echo base_url();?>clientes/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Clientes</a>
        <?php } ?>        
        <?php if ($this->session->flashdata('error') == TRUE): ?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
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
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead class="topo-table">
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($results as $r){
                  
                  echo '<tr>';
                    echo '<td>'.$r->idClientes.'</td>';
                    echo '<td>'.$r->nomeCliente.'</td>';
                    echo '<td>'.$r->cpf.'</td>';
                    echo '<td>'.$r->cnpj.'</td>';
                    echo '<td>'.$r->telefone.'</td>';
                    
                    echo '<td>';
                       if($this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){
                        echo '<a style="margin-right: 1%" href="'.base_url().'clientes/visualizar/'.$r->idClientes.'" class="btn btn-default" title="Visualizar Cliente"><i class="fa fa-eye"></i></a>  '; 
                      }
                      if($this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){
                        echo '<a style="margin-right: 1%" href="'.base_url().'clientes/editar/'.$r->idClientes.'" class="btn btn-info" title="Editar Cliente"><i class="fa fa-edit"></i></a>'; 
                      }
                      if($this->permission->checkPermission($this->session->userdata('permissao'),'dProduto')){
                         echo '<button type="button" idAcao="'.$r->idClientes.'" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluirCliente'.$r->idClientes.'"><i class="fa fa-trash"></i></button>';

                        ?>

                        <!-- Modal Excluir lançamento-->
                        <div class="modal fade" id="modalExcluirCliente<?php echo $r->idClientes; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">Excluir Cliente</h4>
                              </div>
                              <div class="modal-body">
                                <form action="<?php echo base_url() ?>clientes/excluir" method="post" >
                                  <div class="modal-body">
                                    <input type="hidden" id="idClientes" name="id" value="<?php echo $r->idClientes; ?>" />
                                    <h5 style="text-align: center">Deseja realmente excluir o lançamento <strong><?php echo $r->nomeCliente; ?></strong> ?</h5>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                    <button class="btn btn-danger">Excluir</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fim Modal -->
                        <?php }
                      echo '</td>';
                    echo '</tr>';
                     } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

