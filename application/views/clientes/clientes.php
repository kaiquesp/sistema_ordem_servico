  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Lista de usuários</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
            <a href="<?php echo base_url();?>clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Cliente</a>    
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
                <th>CNPJ</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($results)){
                foreach ($results as $r){
                  ?>
                  <tr>
                    <td><?php echo $r->idClientes; ?></td>
                    <td><?php echo $r->nomeCliente; ?></td>
                    <td><?php echo $r->cnpj; ?></td>
                    <td><?php echo $r->cpf; ?></td>
                    <td><?php echo $r->telefone; ?></td>
                    <td><a href="<?php echo base_url().'clientes/visualizar/'.$r->idClientes; ?>" style="margin-right: 1%" class="btn btn-default tip-top" title="Ver mais detalhes"><i class="fa fa-eye"></i></a><a href="<?php echo base_url().'clientes/editar/'.$r->idClientes; ?>" class="btn btn-info tip-top" title="Editar Cliente"><i class="fa fa-edit"></i></a><a href="<?php echo base_url().'clientes/excluir/'.$r->idClientes; ?>" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="fa fa-trash-o"></i></a></td>
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