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
            <a href="<?php echo base_url();?>produtos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Produto</a>
        <?php } ?>
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
                        echo '<a href="#delete-modal" role="button" data-toggle="modal" produto="'.$r->idProdutos.'" class="btn btn-danger tip-top" title="Excluir Produto"><i class="fa fa-trash"></i></a>'; 

                    ?>
                        <!-- Modal -->
                        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                              </div>
                              <div class="modal-body">
                                <form action="<?php echo base_url() ?>produtos/excluir" method="post" >
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h5 id="myModalLabel">Excluir Produto</h5>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" id="idProduto" name="id" value="<?php echo $r->idProdutos; ?>" />
                                    <h5 style="text-align: center">Deseja realmente excluir este produto?</h5>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                    <button class="btn btn-danger">Excluir</button>
                                  </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Sim</button>
                         <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                              </div>
                            </div>
                          </div>
                        </div> <!-- /.modal -->
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


