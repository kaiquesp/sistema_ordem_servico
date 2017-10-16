  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Permissões</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <a href="<?php echo base_url();?>permissoes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Permissão</a>
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
          <?php
          if(!$results){?>
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
              <td colspan="5">Nenhuma permissão encontrada!</td>
            </tbody>
          </table>
          <?php }else{?>
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Data de criacao</th>
                <th>Situacão</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($results as $r) {
                if($r->situacao == 1){$situacao = 'Ativo';}else{$situacao = 'Inativo';}
                echo '<tr>';
                echo '<td>'.$r->idPermissao.'</td>';
                echo '<td>'.$r->nome.'</td>';
                echo '<td>'.date('d/m/Y',strtotime($r->data)).'</td>';
                echo '<td>'.$situacao.'</td>';
                echo '<td><a href="'.base_url().'index.php/permissoes/editar/'.$r->idPermissao.'" class="btn btn-info tip-top" title="Editar Permissão"><i class="fa fa-edit"></i></a>
                      </td>';
                echo '</tr>';
              }?>
              <tr>

              </tr>

            </tbody>
          </table>
          <?php }?>

        </div>
      </div>
    </div>
  </div>
</div>