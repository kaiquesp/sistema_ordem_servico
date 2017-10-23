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

            <input class="input-tab" id="tab1" type="radio" name="tabs" checked>
            <label class="lbl" for="tab1"><i class="fa fa-list-alt"></i> Adicionar Ordem de Serviço</label>
            
            <!-- Detalhes -->
            <section id="content1" class="sessao">
                <div class="row-fluid" style="margin-top:0">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-content nopadding">
                                
                
                                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                
                                            <div class="span12" id="divCadastrarOs">
                                                <?php if($custom_error == true){ ?>
                                                <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente e responsável.</div>
                                                <?php } ?>
                                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="cliente">Cliente<span class="required">*</span></label>
                                                            <input id="cliente" class="span12 form-control" type="text" name="cliente" value=""  />
                                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value=""  />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tecnico">Técnico / Responsável<span class="required">*</span></label>
                                                            <input id="tecnico" class="span12 form-control" type="text" name="tecnico" value=""  />
                                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value=""  />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="status">Status<span class="required">*</span></label>
                                                            <select class="span12 form-control" name="status" id="status" value="">
                                                                <option value="Orçamento">Orçamento</option>
                                                                <option value="Aberto">Aberto</option>
                                                                <option value="Em Andamento">Em Andamento</option>
                                                                <option value="Finalizado">Finalizado</option>
                                                                <option value="Cancelado">Cancelado</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="dataInicial">Data Inicial<span class="required">*</span></label>
                                                            <input id="dataInicial" class="span12 datepicker form-control" type="text" name="dataInicial" value="<?php echo date('d/m/Y'); ?>"  />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="dataFinal">Data Final</label>
                                                            <input id="dataFinal" class="span12 datepicker form-control" type="text" name="dataFinal" value=""  />
                                                        </div>
                
                                                        <div class="col-md-3">
                                                            <label for="garantia">Garantia</label>
                                                            <input id="garantia" type="text" class="span12 form-control" name="garantia" value=""  />
                                                        </div>
                                                    </div>
                
                                                    <div class="row">
                
                                                        <div class="col-md-6">
                                                            <label for="descricaoProduto">Descrição Produto/Serviço</label>
                                                            <textarea class="form-control" name="descricaoProduto" id="descricaoProduto" rows="5"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="defeito">Defeito</label>
                                                            <textarea class="form-control" name="defeito" id="defeito" cols="30" rows="5"></textarea>
                                                        </div>
                
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="observacoes">Observações</label>
                                                            <textarea class="form-control" name="observacoes" id="observacoes" cols="30" rows="5"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="laudoTecnico">Laudo Técnico</label>
                                                            <textarea class="form-control" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                                        <div class="span6 offset3" style="text-align: center">
                                                            <button class="btn btn-success" id="btnContinuar"><i class="icon-share-alt icon-white"></i> Continuar</button>
                                                            <a href="<?php echo base_url() ?>os" class="btn btn-default"><i class="icon-arrow-left"></i> Voltar</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                
                                        </div>
                
                                    </div>
                
                                </div>
                
                                
                .
                             
                        </div>
                        
                    </div>
                </div>
                </div>
                
            </section>

        </div>
  </div>
</div>

