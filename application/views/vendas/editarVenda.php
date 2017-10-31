<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <?php if ($this->session->flashdata('error') == TRUE): ?>
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
        <p><?php echo $this->session->flashdata('error'); ?></p>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success') == TRUE): ?>
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
        <p><?php echo $this->session->flashdata('success'); ?></p>
      </div>
    <?php endif; ?>
    <div class="x_content">
      <input class="input-tab" id="tab1" type="radio" name="tabs" checked>
      <label class="lbl" for="tab1"><i class="fa fa-list-alt"></i> Adicionar Ordem de Serviço</label>
      
      <!-- Detalhes -->
      <section id="content1" class="sessao">
        <div class="row-fluid" style="margin-top:0">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-content nopadding">
                <form action="<?php echo current_url(); ?>" method="post" id="formVendas">
                  <?php echo form_hidden('idVendas',$result->idVendas) ?>
                  <div class="row">
                    <h3>#Venda: <?php echo $result->idVendas ?></h3>
                    <div class="col-md-2">
                      <label for="dataFinal">Data Final</label>
                      <input id="dataVenda" class="form-control datepicker" type="text" name="dataVenda" value="<?php echo date('d/m/Y', strtotime($result->dataVenda)); ?>"  />
                    </div>
                    <div class="col-md-5" >
                      <label for="cliente">Cliente<span class="required">*</span></label>
                      <input id="cliente" class="form-control" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>"  />
                      <input id="clientes_id" class="form-control" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>"  />
                      <input id="valorTotal" type="hidden" name="valorTotal" value=""  />
                    </div>
                    <div class="col-md-5">
                      <label for="tecnico">Vendedor<span class="required">*</span></label>
                      <input id="tecnico" class="form-control" type="text" name="tecnico" value="<?php echo $result->nome ?>"  />
                      <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>"  />
                    </div>
                  </div>
                  <div class="span12" style="padding: 1%; margin-left: 0">
                    <div class="span8 offset2" style="text-align: center">
                      <?php if($result->faturado == 0){ ?>
                      <a href="<?php echo base_url() ?>vendas" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                      <a href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="btn btn-success"><i class="fa fa-file"></i> Faturar</a>
                      <button class="btn btn-primary" id="btnContinuar"><i class="fa fa-check"></i> Alterar</button>
                      <?php } ?>
                      <a href="<?php echo base_url() ?>vendas/visualizar/<?php echo $result->idVendas; ?>" class="btn btn-dark"><i class="fa fa-eye"></i> Visualizar Venda</a>  
                    </div>
                  </div>
                  </form>
                  <div class="span12 well" style="padding: 1%; margin-left: 0">
                    <form id="formProdutosVendas" action="" method="post">
                      <div class="row">
                        <div class="col-md-8">
                          <input type="hidden" name="idProduto" id="idProduto" />
                          <input type="hidden" name="idVendasProduto" id="idVendasProduto" value="<?php echo $result->idVendas?>" />
                          <input type="hidden" name="estoque" id="estoque" value=""/>
                          <input type="hidden" name="preco" id="preco" value=""/>
                          <label for="">Produto</label>
                          <input type="text" class="form-control" name="produto" id="produto" placeholder="Digite o nome do produto" />
                        </div>
                        <div class="col-md-2">
                          <label for="">Quantidade</label>
                          <input type="text" placeholder="Quantidade" id="quantidade" name="quantidade" class="form-control" />
                        </div>
                        <div class="col-md-2">
                          <label for="">&nbsp</label>
                          <button class="btn btn-success form-control" id="btnAdicionarProduto"><i class="fa fa-plus"></i> Adicionar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="span12" id="divProdutosVendas" style="margin-left: 0">
                    <table class="table table-bordered" id="tblProdutos">
                      <thead>
                        <tr>
                          <th>Produto</th>
                          <th>Quantidade</th>
                          <th>Ações</th>
                          <th>Sub-total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $total = 0;
                        foreach ($produtos as $p) {

                         $total = $total + $p->subTotal;
                         echo '<tr>';
                         echo '<td>'.$p->descricao.'</td>';
                         echo '<td>'.$p->quantidade.'</td>';
                         echo '<td><a href="" id="btnExcluirProdutoVenda" idAcao="'.$p->idItens.'" prodAcao="'.$p->idProdutos.'" quantAcao="'.$p->quantidade.'" title="Excluir Produto" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>';
                         echo '<td>R$ '.number_format($p->subTotal,2,',','.').'</td>';
                         echo '</tr>';
                       }?>
                       <tr>
                        <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                        <td><strong>R$ <?php echo number_format($total,2,',','.');?></strong>
                          <input type="hidden" id="total-venda" value="<?php echo number_format($total,2); ?>"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- Modal Faturar -->
  <div class="modal fade" id="modal-faturar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="formFaturarVendas" action="<?php echo current_url() ?>" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Faturar Venda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>

            <div class="span12" style="margin-left: 0"> 
              <label for="descricao">Descrição</label>
              <input class="form-control" id="descricao" type="text" name="descricao" value="Fatura de Venda - #<?php echo $result->idVendas; ?> "  />

            </div>  
            <div class="span12" style="margin-left: 0"> 
              <div class="span12" style="margin-left: 0"> 
                <label for="cliente">Cliente*</label>
                <input class="form-control" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                <input type="hidden" name="vendas_id" id="vendas_id" value="<?php echo $result->idVendas; ?>">
              </div>


            </div>
            <div class="span12" style="margin-left: 0"> 
              <div class="span4" style="margin-left: 0">  
                <label for="valor">Valor*</label>
                <input type="hidden" id="tipo" name="tipo" value="receita" /> 
                <input class="form-control format_value" id="valor" type="text" name="valor" value="<?php echo number_format($total,2,',','.'); ?> "  />
              </div>
              <div class="span4" >
                <label for="vencimento">Data Vencimento*</label>
                <input class="form-control datepicker" id="vencimento" type="text" name="vencimento"  />
              </div>

            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="recebido">Recebido?</label>
                        <input  id="recebido" type="checkbox" name="recebido" value="1" />
                    </div>
                    <div class="" id="divRecebimento">
                        <div class="col-md-4">
                            <label for="recebimento">Data Recebimento</label>
                            <input class="form-control span12 datepicker" id="recebimento" type="text" name="recebimento" />
                        </div>
                        <div class="col-md-4">
                            <label for="formaPgto">Forma Pgto</label>
                              <select name="formaPgto" id="formaPgto" class="span12 form-control">
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
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar">Cancelar</button>
            <button class="btn btn-primary">Faturar</button>
          </div>
        </form>
      </div>
    </div>
  </div>