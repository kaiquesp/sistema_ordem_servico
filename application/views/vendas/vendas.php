  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Lista de vendas</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aVenda')){ ?>
            <a href="<?php echo base_url();?>vendas/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Venda</a>
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
                <th>Data da Venda</th>
                <th>Cliente</th>
                <th>Faturado</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($results)){
                foreach ($results as $r){
                    $dataVenda = date(('d/m/Y'),strtotime($r->dataVenda));
                    if($r->faturado == 1){$faturado = 'Sim';} else{ $faturado = 'Não';}           
                    echo '<tr>';
                    echo '<td>'.$r->idVendas.'</td>';
                    echo '<td>'.$dataVenda.'</td>';
                    echo '<td><a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'">'.$r->nomeCliente.'</a></td>';
                    echo '<td>'.$faturado.'</td>';
                    echo '<td>';
                     if($this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){
                        echo '<a style="margin-right: 1%" href="'.base_url().'vendas/visualizar/'.$r->idVendas.'" class="btn btn-default" title="Visualizar Venda"><i class="fa fa-eye"></i></a>  '; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){
                        echo '<a style="margin-right: 1%" href="'.base_url().'vendas/editar/'.$r->idVendas.'" class="btn btn-info" title="Editar Venda"><i class="fa fa-edit"></i></a>'; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'dProduto')){
                        echo '<button type="button" title="Excluir Venda" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$r->idVendas.'"><i class="fa fa-trash"></i></button>'; 

                    ?>
                       <div class="modal fade" id="myModal<?php echo $r->idVendas; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">Excluir Produto</h4>
                              </div>
                              <div class="modal-body">
                                <form action="<?php echo base_url() ?>vendas/excluir" method="post" >
                                  <div class="modal-body">
                                    <input type="hidden" id="idProduto" name="id" value="<?php echo $r->idVendas; ?>" />
                                    <h5 style="text-align: center">Deseja realmente excluir a venda <strong><?php echo $r->idVendas; ?></strong> ?</h5>
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


