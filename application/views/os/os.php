  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Lista Ordem de Serviços</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aOs')){ ?>
            <a href="<?php echo base_url();?>os/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Ordem Serviço</a>
        <?php } ?>
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
        <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead class="topo-table">
              <tr>
                <th>#</th>
                <th>Cliente</th>
            	<th>Data Inicial</th>
            	<th>Data Final</th>
            	<th>Status</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($results)){
                foreach ($results as $r){
        					$dataInicial = date(('d/m/Y'),strtotime($r->dataInicial));
        					$dataFinal = date(('d/m/Y'),strtotime($r->dataFinal));

                  $datefinal = strtotime($r->dataFinal);
                  $data = date('Y-m-d');
                  $dateatual = strtotime($data);
        		
        					switch ($r->status) {
        						case 'Aberto':
        							$cor = '#8A9B0F';
        							break;
        						case 'Em Andamento':
        							$cor = '#A7DBD8';
        							break;
        						case 'Orçamento':
        							$cor = '#CDB380';
        							break;
        						case 'Cancelado':
        							$cor = '#E97F02';
        							break;
        						case 'Finalizado':
        							$cor = '#0B486B';
        							break;
        						case 'Faturado':
        							$cor = '#B266FF';
        							break;
        						default:
        							$cor = '#E0E4CC';
        							break;
        					}

                  ?>
                  <tr>
                    <td><?php echo $r->idOs; ?></td>
                    <td><?php echo $r->nomeCliente; ?></td>
                    <td><?php echo $dataInicial ?></td>
                    <?php 
                      if($dateatual <= $datefinal){?>
                        <td><span class="badge" style="background-color: #43AC6E; border-color: #43AC6E;"><?php echo $dataFinal; ?></span> </td>
                      <?php }else{?>
                        <td><span class="badge" style="background-color: #ed5564; border-color: #ed5564;"><?php echo $dataFinal; ?></span> </td>
                     <?php }
                    ?>
                    <td><span class="badge" style="background-color: <?php echo $cor; ?>; border-color: <?php echo $cor; ?>;"><?php echo $r->status; ?></span> </td>
                    <td>
                    <?php
                     if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
                      echo '<a style="margin-right: 1%" href="'.base_url().'os/visualizar/'.$r->idOs.'" class="btn btn-default" title="Ver mais detalhes"><i class="fa fa-eye"></i></a>'; 
                      echo '<a style="margin-right: 1%" href="'.base_url().'os/imprimir/'.$r->idOs.'" target="_blank" class="btn btn-dark" title="Imprimir"><i class="fa fa-print"></i></a>'; 
                      }
                      if(($r->status == "Aberto") || ($r->status == "Em Andamento") || ($r->status == "Orçamento")){
                        if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                          echo '<a style="margin-right: 1%" href="'.base_url().'os/editar/'.$r->idOs.'" class="btn btn-info" title="Editar OS"><i class="fa fa-pencil"></i></a>'; 
                        }
                      }
                      if($this->permission->checkPermission($this->session->userdata('permissao'),'dOs')){
                          echo '<button type="button" class="btn btn-danger" title="Excluir OS" data-toggle="modal" data-target="#modal-excluir'.$r->idOs.'"><i class="fa fa-trash"></i></button>'; 
            
                    ?>
                       <div class="modal fade" id="modal-excluir<?php echo $r->idOs; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">Excluir Produto</h4>
                              </div>
                              <div class="modal-body">
                                <form action="<?php echo base_url() ?>os/excluir" method="post" >
                                  <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $r->idOs; ?>" />
                                    <h5 style="text-align: center">Deseja realmente excluir a ordem de serviço <strong><?php echo $r->idOs; ?></strong> ?</h5>
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


