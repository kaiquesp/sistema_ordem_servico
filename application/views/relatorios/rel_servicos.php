  <div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-4 col-sm-5 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                      <h2>Relatórios Rápidos</h2>
                      <div class="clearfix"></div>
                    </div>     
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12" align="center">
                                <a href="<?php echo base_url()?>relatorios/servicosRapid" class="btn btn-app" target="_blank">
                                    <i class="fa fa-barcode"></i> Todos os serviços
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-7 col-xs-12">
                <div class="x_panel"> 
                    <div class="x_title">
                      <h2>Relatórios Customizáveis</h2>
                      <div class="clearfix"></div>
                    </div>    
                    <div class="x_content">
                            <form target="_blank" action="<?php echo base_url()?>relatorios/servicosCustom" method="get">
                                <div class="row well well-lg">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="">Preço de Venda de:</label>
                                        <input type="text" name="precoInicial" class="form-control format_value" />
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="">até:</label>
                                        <input type="text"  name="precoFinal" class="form-control format_value" />
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



