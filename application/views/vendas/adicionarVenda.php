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
                    <div class="">
                        <div class="widget-box">
                            <div class="widget-content nopadding">
                                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                                	<form action="<?php echo current_url(); ?>" method="post" id="formVendas">
                    
                                                            <div class="form-group row">
                                                            	<div class="col-xs-3">
                                                                    <label for="dataInicial">Data da Venda<span class="required">*</span></label>
                                                                    <input id="dataVenda" class="form-control col-xs-3 datepicker" type="text" name="dataVenda" value="<?php echo date('d/m/Y'); ?>"  />
                                                               </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-xs-3">
                                                                    <label for="cliente">Cliente<span class="required">*</span></label>
                                                                    <input id="cliente" class="form-control span12" type="text" name="cliente" value=""  />
                                                                    <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value=""  />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-xs-3">
                                                                    <label for="tecnico">Vendedor<span class="required">*</span></label>
                                                                    <input id="tecnico" class="form-control span12" type="text" name="tecnico" value=""  />
                                                                    <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value=""  />
                                                                </div>
                                                            <div class="form-group row">
                                                           <div class="span12" style="padding: 1%; margin-left: 0">
                                                            <div class="span6 offset3" style="text-align: center">
                                                                <button class="btn btn-success" id="btnContinuar"><i class="icon-share-alt icon-white"></i> Continuar</button>
                                                                <a href="<?php echo base_url() ?>index.php/vendas" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                                                            </div>
                                                        </div>
                                                    </form>
                
                                        </div>
                
                                    </div>
                
                                </div>
                
                                
                
                             
                        </div>
                        
                    </div>
                </div>
                </div>
                
            </section>

        </div>
  </div>
</div>

