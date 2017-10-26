  <div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                      <h2>Relatórios Rápidos</h2>
                      <div class="clearfix"></div>
                    </div>     
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
                            <div class="col-md-6">
                                <a href="<?php echo base_url()?>relatorios/produtosRapid" class="btn btn-app col-centered"  target="_blank">
                                    <i class="fa fa-barcode"></i> Todos os produtos
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url()?>relatorios/produtosRapidMin" class="btn btn-app col-centered"  target="_blank">
                                    <i class="fa fa-barcode"></i> Com Estoque Mínimo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-7 col-xs-12">
                <div class="x_panel"> 
                    <div class="x_title">
                      <h2>Relatórios Customizáveis</h2>
                      <div class="clearfix"></div>
                    </div>    
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
                        <div class="span12 alert alert-info">Deixe em branco caso não deseje utilizar o parâmetro.</div>
                            <form target="_blank" action="<?php echo base_url()?>relatorios/produtosCustom" method="get">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="">Preço de Venda de:</label>
                                        <input type="text" name="precoInicial" class="form-control format_value" />
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="">até:</label>
                                        <input type="text"  name="precoFinal" class="form-control format_value" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                       <label for="">Estoque de:</label>
                                        <input type="text" name="estoqueInicial" class="form-control format_value" />
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="">até:</label>
                                        <input type="text" name="estoqueFinal" class="form-control format_value" />
                                    </div>
                                </div>
                                <div class="col-md-offset-5 col-xs-offset-3 col-sm-offset-3">
                                    <br>
                                    <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpar</button>
                                    <button class="btn btn-dark"><i class="fa fa-print"></i> Imprimir</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



