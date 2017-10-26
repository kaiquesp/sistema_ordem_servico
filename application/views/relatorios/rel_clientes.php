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
                        <div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
                            <a href="<?php echo base_url()?>relatorios/clientesRapid" class="btn btn-app col-centered"  target="_blank">
                                <i class="fa fa-user"></i> Todos os clientes
                            </a>
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
                        <div class="row">
                            <form target="_blank" action="<?php echo base_url()?>relatorios/clientesCustom" method="get">
                                <div class="well well-lg">
                                    <div class="col-md-4 col-xs-12">
                                        <label for="">Cadastrado de:</label>
                                        <input type="date" name="dataInicial" class="form-control" />
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="">até:</label>
                                        <input type="date" name="dataFinal" class="form-control" />
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <br>
                                        <button class="btn btn-dark"><i class="fa fa-print"></i> Imprimir</button>
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



