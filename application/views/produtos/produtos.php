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
            <a href="<?php echo base_url();?>produtos/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Produto</a>
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
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Preço</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($results)){
                foreach ($results as $r){
                  ?>
                  <tr>
                    <td><?php echo $r->idProdutos; ?></td>
                    <td><?php echo $r->descricao; ?></td>
                    <td><?php echo $r->estoque; ?></td>
                    <td><?php echo number_format($r->precoVenda,2,',','.') ?></td>
                    <td>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){
                        echo '<a style="margin-right: 1%" href="'.base_url().'index.php/produtos/visualizar/'.$r->idProdutos.'" class="btn btn-default" title="Visualizar Produto"><i class="fa fa-eye"></i></a>  '; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){
                        echo '<a style="margin-right: 1%" href="'.base_url().'index.php/produtos/editar/'.$r->idProdutos.'" class="btn btn-info" title="Editar Produto"><i class="fa fa-edit"></i></a>'; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'dProduto')){
                        echo '<button type="button" class="btn btn-danger" title="Excluir Produto" data-toggle="modal" data-target="#myModal'.$r->idProdutos.'"><i class="fa fa-trash"></i></button>'; 

                    ?>
                       <div class="modal fade" id="myModal<?php echo $r->idProdutos; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">Excluir Produto</h4>
                              </div>
                              <div class="modal-body">
                                <form action="<?php echo base_url() ?>produtos/excluir" method="post" >
                                  <div class="modal-body">
                                    <input type="hidden" id="idProduto" name="id" value="<?php echo $r->idProdutos; ?>" />
                                    <h5 style="text-align: center">Deseja realmente excluir este produto <strong><?php echo $r->descricao; ?></strong> ?</h5>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                    <button class="btn btn-danger">Excluir</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php }?>
                    </td>
                  </tr>
                  <?php 
                }
              }else{
                echo "<tr>" ;
                    echo "<td colspan='6'>Nenhum Produto Cadastrado</td>";
                echo "<tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


