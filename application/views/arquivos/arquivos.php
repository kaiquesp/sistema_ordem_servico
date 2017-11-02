  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Lista de Arquivos</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aArquivo')){ ?>
            <a href="<?php echo base_url();?>arquivos/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Arquivo</a>
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
                <th>Documento</th>
                <th>Data</th>
                <th>Tamanho</th>
                <th>Extensão</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($results)){
                 foreach ($results as $r) {
                echo '<tr>';
                echo '<td>'.$r->idDocumentos.'</td>';
                echo '<td>'.$r->documento.'</td>';
                echo '<td>'.date('d/m/Y',strtotime($r->cadastro)).'</td>';
                echo '<td>'.$r->tamanho.' KB</td>';
                echo '<td>'.$r->tipo.'</td>';
                echo '<td>';
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'vArquivo')){
                        echo '<a class="btn btn-dark" style="margin-right: 1%" target="_blank" href="'.$r->url.'" title="Imprimir"><i class="fa fa-print"></i></a>'; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'vArquivo')){
                        echo '<a href="'.base_url().'arquivos/download/'.$r->idDocumentos.'" class="btn btn-default" style="margin-right: 1%" title="Download"><i class="fa fa-download"></i></a>'; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'eArquivo')){ 
                        echo  '<a href="'.base_url().'arquivos/editar/'.$r->idDocumentos.'" class="btn btn-info" style="margin-right: 1%" title="Editar"><i class="fa fa-edit"></i></a>';
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'dArquivo')){
                         echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-excluir'.$r->idDocumentos.'"><i class="fa fa-trash"></i></button>';

                    ?>
                    
                    <!-- Modal Excluir Arquivo-->
                    <div class="modal fade" id="modal-excluir<?php echo $r->idDocumentos; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="<?php echo base_url() ?>arquivos/excluir" method="post" >
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Excluir Arquivo</h4>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" id="idDocumento" name="id" value="<?php echo $r->idDocumentos; ?>" />
                              <h5 style="text-align: center">Deseja realmente excluir o arquivo <strong><?php echo $r->documento; ?></strong></h5>
                            </div>
                            <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                              <button class="btn btn-danger">Excluir</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <?php } ?>

                <?php    
                echo  '</td>';
                echo '</tr>';
                }
            
              }else{
                echo "<tr>" ;
                    echo "<td colspan='6'>Nenhum Arquivo Cadastrado</td>";
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

<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', '#excluir-arquivo', function(event) {
        
        var arquivo = $(this).attr('arquivo');
        $('#idDocumento').val(arquivo);

   });

   $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});

</script>