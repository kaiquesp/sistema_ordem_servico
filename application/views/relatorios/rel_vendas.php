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
                            <div align="center">
                                <a href="<?php echo base_url()?>relatorios/vendasRapid" class="btn btn-app col-centered"  target="_blank">
                                    <i class="fa fa-tags"></i> Todas as Vendas
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
                        <form target="_blank" action="<?php echo base_url()?>relatorios/vendasCustom" method="get">
                            <div class="row well well-lg">
                                <div class="col-md-6 col-xs-12">
                                    <label for="">Data de:</label>
                                    <input type="date" name="dataInicial" class="form-control" />
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label for="">até:</label>
                                    <input type="date"  name="dataFinal" class="form-control" />
                                </div>
                            </div>
                            <div class="row well well-lg">
                                <div class="col-md-6 col-xs-12">
                                   	<label for="">Cliente:</label>
                                   	<input type="text"  id="clientevendas" class="form-control" />
                                	<input type="hidden" name="cliente" id="clienteidvendas" />
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label for="">Vendedor:</label>
                                    <input type="text" id="tecnico" class="form-control" />
                                	<input type="hidden" name="responsavel" id="responsavelidvendas" />
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



