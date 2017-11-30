<?php $situacao = $this->input->get('situacao');
$periodo = $this->input->get('periodo');  
?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Lista de Lançamentos</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
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
        <div class="row">
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aLancamento')){ ?>
          <div class="col-md-5" style="margin-left: 0">
            <a href="#modalReceita" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Cadastrar nova receita"><i class="fa fa-plus"></i> Nova Receita</a>  
            <a href="#modalDespesa" data-toggle="modal" role="button" class="btn btn-danger tip-bottom" title="Cadastrar nova despesa"><i class="fa fa-plus"></i> Nova Despesa</a>
          </div>
          <?php } ?>

          <div class="col-md-7" style="margin-left: 0">
            <div class="row">
              <form action="<?php echo current_url(); ?>" method="get" >
                <div class="col-md-4" style="margin-left: 0">
                  <label>Período <i class="icon-info-sign tip-top" title="Lançamentos com vencimento no período."></i></label>
                  <select name="periodo" class="form-control">
                    <option value="dia">Dia</option>
                    <option value="semana" <?php if($periodo == 'semana'){ echo 'selected';} ?>>Semana</option>
                    <option value="mes" <?php if($periodo == 'mes'){ echo 'selected';} ?>>Mês</option>
                    <option value="ano" <?php if($periodo == 'ano'){ echo 'selected';} ?>>Ano</option>
                    <option value="todos" <?php if($periodo == 'todos'){ echo 'selected';} ?>>Todos</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Situação <i class="icon-info-sign tip-top" title="Lançamentos com situação específica ou todos."></i></label>
                  <select name="situacao" class="form-control">
                    <option value="todos">Todos</option>
                    <option value="previsto" <?php if($situacao == 'previsto'){ echo 'selected';} ?>>Previsto</option>
                    <option value="atrasado" <?php if($situacao == 'atrasado'){ echo 'selected';} ?>>Atrasado</option>
                    <option value="realizado" <?php if($situacao == 'realizado'){ echo 'selected';} ?>>Realizado</option>
                    <option value="pendente" <?php if($situacao == 'pendente'){ echo 'selected';} ?>>Pendente</option>
                  </select>
                </div>
                <div class="col-md-4" >
                  &nbsp
                  <button type="submit" class="form-control btn btn-primary">Filtrar</button>
                </div>

              </form>
            </div>
          </div>
        </div>

        <div class="span12" style="margin-left: 0;">

        <div class="widget-box">
         <div class="widget-title">
          <span class="icon">
            <i class="icon-tags"></i>
          </span>
          <h5>Lançamentos Financeiros</h5>

        </div>

        <div class="x_content table-responsive no-padding">


          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowra table-hover" cellspacing="0" width="100%">
            <thead class="topo-table">
              <tr style="backgroud-color: #2D335B">
                <th>#</th>
                <th>Tipo</th>
                <th>Cliente / Fornecedor</th>
                <th>Vencimento</th>
                <th>Status</th>
                <th>Valor</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $totalReceita = 0;
              $totalDespesa = 0;
              $saldo = 0;
              foreach ($results as $r) {
                $vencimento = date(('d/m/Y'),strtotime($r->data_vencimento));
                if($r->baixado == 0){$status = 'Pendente';}else{ $status = 'Pago';};
                if($r->tipo == 'receita'){ $label = 'success'; $totalReceita += $r->valor;} else{$label = 'danger'; $totalDespesa += $r->valor;}
                echo '<tr>'; 
                echo '<td>'.$r->idLancamentos.'</td>';
                echo '<td><span class="label label-'.$label.'">'.ucfirst($r->tipo).'</span></td>';
                echo '<td>'.$r->cliente_fornecedor.'</td>';
                echo '<td>'.$vencimento.'</td>';   
                echo '<td>'.$status.'</td>';
                echo '<td> R$ '.number_format($r->valor, 2, ',', '.').'</td>';
                echo '<td>';
                if($this->permission->checkPermission($this->session->userdata('permissao'),'eLancamento')){
                  echo '<a href="#modalEditar" style="margin-right: 1%" data-toggle="modal" role="button" idLancamento="'.$r->idLancamentos.'" descricao="'.$r->descricao.'" valor="'.$r->valor.'" vencimento="'.date('d/m/Y',strtotime($r->data_vencimento)).'" pagamento="'.date('d/m/Y', strtotime($r->data_pagamento)).'" baixado="'.$r->baixado.'" cliente="'.$r->cliente_fornecedor.'" formaPgto="'.$r->forma_pgto.'" tipo="'.$r->tipo.'" class="btn btn-info tip-top editar" title="Editar Lançamento"><i class="fa fa-edit"></i></a>'; 
                }
                if($this->permission->checkPermission($this->session->userdata('permissao'),'dLancamento')){
                  echo '<button type="button" idAcao="'.$r->idLancamentos.'" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir'.$r->idLancamentos.'"><i class="fa fa-trash"></i></button>'; 
                  ?>
                  <!-- Modal Excluir lançamento-->
                  <div class="modal fade" id="modalExcluir<?php echo $r->idLancamentos; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title text-center" id="myModalLabel">Excluir Produto</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url() ?>financeiro/excluirLancamento" method="post" >
                            <div class="modal-body">
                              <input type="hidden" id="idLancamentos" name="id" value="<?php echo $r->idLancamentos; ?>" />
                              <h5 style="text-align: center">Deseja realmente excluir o lançamento <strong><?php echo $r->idLancamentos; ?></strong> ?</h5>
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

                  <?php } 
                  echo '</td>';
                  echo '</tr>';
                }
              ?>



        </tbody>

        <?php if(!$results){
        }else{ ?>
          <tr>
            <th colspan="1" style="text-align: right; color: green"> <strong>Total Receitas:</strong></th>
            <th colspan="7" style="text-align: left; color: green"><strong>R$ <?php echo number_format($totalReceita,2,',','.') ?></strong></th>

          </tr>
          <tr>
            <th colspan="1" style="text-align: right; color: red"> <strong>Total Despesas:</strong></th>
            <th colspan="7" style="text-align: left; color: red"><strong>R$ <?php echo number_format($totalDespesa,2,',','.') ?></strong></th>

          </tr>
          <tr>
            <th colspan="1" style="text-align: right"> <strong>Saldo:</strong></th>
            <th colspan="7" style="text-align: left;"><strong>R$ <?php echo number_format($totalReceita - $totalDespesa,2,',','.') ?></strong></th>

          </tr>
        <?php } ?>
      </table>
    </div>
  </div>

</div>

<!-- Modal nova receita -->
<div class="modal fade" id="modalReceita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formReceita" action="<?php echo base_url() ?>financeiro/adicionarReceita" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Adicionar Nova Receita</h4>
        </div>
        <div class="modal-body">
          <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
          <div class="span12" style="margin-left: 0"> 
            <label for="descricao">Descrição</label>
            <input class="form-control" id="descricao" type="text" name="descricao"  />
            <input id="urlAtual" type="hidden" name="urlAtual" value="<?php echo current_url() ?>"  />
          </div>  
          <div class="span12" style="margin-left: 0"> 
            <div class="span12" style="margin-left: 0"> 
              <label for="cliente">Cliente*</label>
              <input class="form-control" id="cliente" type="text" name="cliente"  />
            </div>


          </div>
          <div class="span12" style="margin-left: 0"> 
            <div class="span4" style="margin-left: 0">  
              <label for="valor">Valor*</label>
              <input type="hidden" id="tipo" name="tipo" value="receita" /> 
              <input class="form-control format_value" id="valor" type="text" name="valor"  />
            </div>
            <div class="span4" >
              <label for="vencimento">Data Vencimento*</label>
              <input class="form-control datepicker" id="vencimento" type="text" name="vencimento"  />
            </div>

          </div>
          <div class="row" style="margin-left: 0"> 
            <div class="col-md-2" style="margin-left: 0">
              <label for="recebido">Recebido?</label>
              &nbsp &nbsp &nbsp &nbsp<input  id="recebido" type="checkbox" name="recebido" value="1" /> 
            </div>
            <div id="divRecebimento" class="span8" style=" display: none">
              <div class="col-md-5">
                <label for="recebimento">Data Recebimento</label>
                <input class="form-control datepicker" id="recebimento" type="text" name="recebimento" /> 
              </div>
              <div class="col-md-5">
                <label for="formaPgto">Forma Pgto</label>
                <select name="formaPgto" id="formaPgto" class="form-control">
                  <option value="Dinheiro">Dinheiro</option>
                  <option value="Cartão de Crédito">Cartão de Crédito</option>
                  <option value="Cheque">Cheque</option>
                  <option value="Boleto">Boleto</option>
                  <option value="Depósito">Depósito</option>
                  <option value="Débito">Débito</option>        
                </select>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-success">Adicionar Receita</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal nova despesa -->
<div class="modal fade" id="modalDespesa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formDespesa" action="<?php echo base_url() ?>financeiro/adicionarDespesa" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
          <div class="span12" style="margin-left: 0"> 
            <label for="descricao">Descrição</label>
            <input class="form-control" id="descricao" type="text" name="descricao"  />
            <input id="urlAtual" type="hidden" name="urlAtual" value="<?php echo current_url() ?>"  />
          </div>  
          <div class="span12" style="margin-left: 0"> 
            <div class="span12" style="margin-left: 0"> 
              <label for="fornecedor">Fornecedor / Empresa*</label>
              <input class="form-control" id="fornecedor" type="text" name="fornecedor"  />
            </div>


          </div>
          <div class="span12" style="margin-left: 0"> 
            <div class="span4" style="margin-left: 0">  
              <label for="valor">Valor*</label>
              <input type="hidden"  name="tipo" value="despesa" />  
              <input class="form-control format_value"  type="text" name="valor"  />
            </div>
            <div class="span4" >
              <label for="vencimento">Data Vencimento*</label>
              <input class="form-control datepicker"  type="text" name="vencimento"  />
            </div>

          </div>
          <div class="row" style="margin-left: 0"> 
            <div class="col-md-2" style="margin-left: 0">
              <label for="pago">Foi Pago?</label>
              &nbsp &nbsp &nbsp &nbsp<input  id="pago" type="checkbox" name="pago" value="1" /> 
            </div>
            <div id="divPagamento" class="span8" style=" display: none">
              <div class="col-md-5">
                <label for="pagamento">Data Pagamento</label>
                <input class="form-control datepicker" id="pagamento" type="text" name="pagamento" /> 
              </div>

              <div class="col-md-5">
                <label for="formaPgto">Forma Pgto</label>
                <select name="formaPgto"  class="form-control">
                  <option value="Dinheiro">Dinheiro</option>
                  <option value="Cartão de Crédito">Cartão de Crédito</option>
                  <option value="Cheque">Cheque</option>
                  <option value="Boleto">Boleto</option>
                  <option value="Depósito">Depósito</option>
                  <option value="Débito">Débito</option>        
                </select>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-danger">Adicionar Despesa</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal editar lançamento -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formEditar" action="<?php echo base_url() ?>financeiro/editar" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Editar Lançamento</h4>
        </div>
        <div class="modal-body">
          <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
          <div class="span12" style="margin-left: 0"> 
            <label for="descricao">Descrição</label>
            <input class="form-control" id="descricaoEditar" type="text" name="descricao"  />
            <input id="urlAtualEditar" type="hidden" name="urlAtual" value=""  />
          </div>  
          <div class="span12" style="margin-left: 0"> 
            <div class="span12" style="margin-left: 0"> 
              <label for="fornecedor">Fornecedor / Empresa*</label>
              <input class="form-control" id="fornecedorEditar" type="text" name="fornecedor"  />
            </div>


          </div>
          <div class="span12" style="margin-left: 0"> 
            <div class="span4" style="margin-left: 0">  
              <label for="valor">Valor*</label>
              <input type="hidden"  name="tipo" value="despesa" />  
              <input type="hidden"  id="idEditar" name="id" value="" /> 
              <input class="form-control format_value"  type="text" name="valor" id="valorEditar" />
            </div>
            <div class="span4" >
              <label for="vencimento">Data Vencimento*</label>
              <input class="form-control datepicker"  type="text" name="vencimento" id="vencimentoEditar"  />
            </div>
            <div class="span4">
              <label for="vencimento">Tipo*</label>
              <select class="form-control" name="tipo" id="tipoEditar">
                <option value="receita">Receita</option>
                <option value="despesa">Despesa</option>
              </select>
            </div>

          </div>
          <div class="row">
            <div class="col-md-2" style="margin-left: 0">
              <label for="pago">Foi Pago?</label>
              &nbsp &nbsp &nbsp &nbsp<input class="flat1" id="pagoEditar" type="checkbox" name="pago" value="1" /> 
            </div>
            <div id="divPagamentoEditar" class="span8" style=" display: none">
              <div class="col-md-5">
                <label for="pagamento">Data Pagamento</label>
                <input class="form-control datepicker" id="pagamentoEditar" type="text" name="pagamento" />  
              </div>

              <div class="col-md-5">
                <label for="formaPgto">Forma Pgto</label>
                <select name="formaPgto" id="formaPgtoEditar"  class="form-control">
                  <option value="Dinheiro">Dinheiro</option>
                  <option value="Cartão de Crédito">Cartão de Crédito</option>
                  <option value="Cheque">Cheque</option>
                  <option value="Boleto">Boleto</option>
                  <option value="Depósito">Depósito</option>
                  <option value="Débito">Débito</option>        
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btnCancelarEditar">Cancelar</button>
          <button class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>