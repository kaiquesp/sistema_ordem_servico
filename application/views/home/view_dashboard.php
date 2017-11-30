          

          <div>
            <?php if ($this->session->flashdata('error') == TRUE): ?>
                <br><br><br><br>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <p><?php echo $this->session->flashdata('error'); ?></p>
                  </div>
            <?php endif; ?>
          </div>

          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Cliente</span>
              <div class="count green"><?php echo $this->db->count_all('clientes');?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-barcode"></i> Produtos</span>
              <div class="count green"><?php echo $this->db->count_all('produtos');?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-tags"></i> Ordem de Serviços</span>
              <div class="count green"><?php echo $this->db->count_all('os');?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> Serviços</span>
              <div class="count green"><?php echo $this->db->count_all('servicos');?></div>
            </div>
          </div>
          <!-- /top tiles -->
          <?php if($produtos != null){ ?>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
					         <h5>Produtos com estoque mínimo</h5>
                    <div class="x_content table-responsive no-padding">
                      <table id="" class="table table-striped table-bordered dt-responsive nowra table-hover" cellspacing="0" width="100%">
                        <thead class="topo-table">
                          <tr>
                            <th>#</th>
                            <th>Produto</th>
                            <th>Preço de Venda</th>
                            <th>Estoque</th>
                            <th>Estoque Mínimo</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                        
                            foreach ($produtos as $p) {
                  
                                echo '<tr>';
                                echo '<td>'.$p->idProdutos.'</td>';
                                echo '<td>'.$p->descricao.'</td>';
                                echo '<td>R$ '.$p->precoVenda.'</td>';
                                if($p->estoque <= $p->estoqueMinimo){
                                  echo '<td><span class="badge" style="background-color: #ed5564; border-color: #ed5564;">'.$p->estoque.'</span></td>';
                                }else{
                                  echo '<td><span class="badge" style="background-color: #43AC6E; border-color: #43AC6E;">'.$p->estoque.'</span></td>';
                                }
                                echo '<td>'.$p->estoqueMinimo.'</td>';
                                echo '<td>';
                                if($this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){
                                    echo '<a href="'.base_url().'produtos/editar/'.$p->idProdutos.'" class="btn btn-info"> <i class="fa fa-edit" ></i> </a>  '; 
                                }
                                echo '</td>';
                                echo '</tr>';
                            }
                           

                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              
              <?php if($ordens != null){ ?>
              <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
					         <h5>Ordens de serviços em aberto</h5>
                    <div class="x_content table-responsive no-padding">
                      <table id="" class="table table-striped table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
                        <thead class="topo-table">
                          <tr>
                            <th>#</th>
                            <th>Data Inicial</th>
                            <th>Data Final</th>
                            <th>Cliente</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                       
                            foreach ($ordens as $o) {

                              $dataInicial = date(('d/m/Y'),strtotime($o->dataInicial));
                              $dataFinal = date(('d/m/Y'),strtotime($o->dataFinal));

                              $datefinal = strtotime($o->dataFinal);
                              $data = date('Y-m-d');
                              $dateatual = strtotime($data);

                                echo '<tr>';
                                echo '<td>'.$o->idOs.'</td>';
                                echo '<td>'.date('d/m/Y' ,strtotime($o->dataInicial)).'</td>';

                                if($dateatual <= $datefinal){
                                  echo '<td><span class="badge" style="background-color: #43AC6E; border-color: #43AC6E;">'.$dataFinal.'</span> </td>';
                                 }else{
                                  echo '<td><span class="badge" style="background-color: #ed5564; border-color: #ed5564;">'.$dataFinal.'</span> </td>';
                                }
                    
                                echo '<td>'.$o->nomeCliente.'</td>';
                                echo '<td>';
                                if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
                                    echo '<a href="'.base_url().'os/visualizar/'.$o->idOs.'" class="btn btn-default"> <i class="fa fa-eye" ></i> </a> '; 
                                }
                                echo '</td>';
                                echo '</tr>';
                            }

                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>
              
              <?php if($estatisticas_financeiro != null){ 
              if($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null){  ?>
              <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="x_panel">
					         <h5>Estatísticas financeiras - Realizado</h5>
                    <div class="x_content">
                      <div id="echart_f_realizado" width="100%" style="height:350px;"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="x_panel">
					         <h5>Estatísticas financeiras - Pendente</h5>
                    <div class="x_content">
                      <div id="echart_f_pendente" style="height:350px;"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="x_panel">
					           <h5>Total em caixa / Previsto</h5>
                    <div class="x_content">
                      <div id="echart_f_previsto" style="height:350px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } } ?>

              <?php if($os != null){ ?>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                     <h5>Estatísticas de OS</h5>
                    <div class="x_content">
                      <div id="oshome" style="height:350px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>

              
                          
        <!-- /page content -->