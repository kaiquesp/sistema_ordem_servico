<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Dados do cliente</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ordens de serviço</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

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
                            <table class="table table-bordered">
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
                            <table class="table table-bordered">
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
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <?php if (!$results) { ?>
                
                    <table class="table table-bordered ">
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
                <table class="table table-bordered ">
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
    </div>
  </div>