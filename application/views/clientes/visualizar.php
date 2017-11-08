<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">

        <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#tab_default_1" data-toggle="tab">
              Dados do Cliente </a>
            </li>
            <li>
              <a href="#tab_default_2" data-toggle="tab">
              Ordem de Serviço </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
              <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Dados Pessoais</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <tbody>
                               <tr>
                                    <td style="text-align: right; width: 30%"><strong>Nome</strong></td>
                                    <td><?php echo $result->nomeCliente ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>CNPJ</strong></td>
                                    <td><?php echo $result->cnpj ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>CPF</strong></td>
                                    <td><?php echo $result->cpf ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                    <td><?php echo date('d/m/Y',  strtotime($result->dataCadastro)) ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Contatos</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <tbody>
                               <tr>
                                    <td style="text-align: right; width: 30%"><strong>Telefone</strong></td>
                                    <td><?php echo $result->telefone ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Celular</strong></td>
                                    <td><?php echo $result->celular ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Email</strong></td>
                                    <td><?php echo $result->email ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Endereço</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <tbody>
                               <tr>
                                    <td style="text-align: right; width: 30%"><strong>Rua</strong></td>
                                    <td><?php echo $result->rua ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Número</strong></td>
                                    <td><?php echo $result->numero ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Bairro</strong></td>
                                    <td><?php echo $result->bairro ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Cidade</strong></td>
                                    <td><?php echo $result->cidade ?> - <?php echo $result->estado ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>CEP</strong></td>
                                    <td><?php echo $result->cep ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->
            </div>
            <div class="tab-pane" id="tab_default_2">
                <?php if (!$results) { ?>
                
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr style="backgroud-color: #2D335B">
                                <th>#</th>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Descricao</th>
                                <th>Defeito</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="5">Nenhuma OS Cadastrada</td>
                            </tr>
                        </tbody>
                    </table>
                
                <?php } else { ?>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>Data Inicial</th>
                            <th>Data Final</th>
                            <th>Descricao</th>
                            <th>Defeito</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($results as $r) {
                    $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                    $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                    echo '<tr>';
                        echo '<td>' . $r->idOs . '</td>';
                        echo '<td>' . $dataInicial . '</td>';
                        echo '<td>' . $dataFinal . '</td>';
                        echo '<td>' . $r->descricaoProduto . '</td>';
                        echo '<td>' . $r->defeito . '</td>';

                        echo '<td>';
                        if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
                            echo '<a href="' . base_url() . 'os/visualizar/' . $r->idOs . '" style="margin-right: 1%" class="btn btn-default" title="Ver mais detalhes"><i class="fa fa-eye"></i></a>'; 
                        }
                        if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                            echo '<a href="' . base_url() . 'os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="fa fa-edit"></i></a>'; 
                        }
                        
                        echo  '</td>';
                        echo '</tr>';
                        }?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
                <?php  } ?>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12" style="padding: 1%; margin-left: 0">
              <div class="span6 offset3" style="text-align: center">
                  
                  <a href="<?php echo base_url() ?>clientes" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Voltar</a>
              </div>
          </div>
      </div>

      </div>
    </div>
  </div>
    <script type="text/javascript" src="<?php site_url(); ?>assets/js/jquery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="<?php site_url(); ?>assets/js/datatables.net/jquery.dataTables.min.js"></script>