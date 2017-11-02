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
            <label class="lbl" for="tab1"><i class="fa fa-list-alt"></i> Detalhes da OS</label>
            
            <input class="input-tab" id="tab2" type="radio" name="tabs">
            <label class="lbl" for="tab2"><i class="fa fa-barcode"></i> Produtos</label>
            
            <input class="input-tab" id="tab3" type="radio" name="tabs">
            <label class="lbl" for="tab3"><i class="fa fa-wrench"></i> Serviços</label>
            
            <input class="input-tab" id="tab4" type="radio" name="tabs">
            <label class="lbl" for="tab4"><i class="fa fa-file-text-o"></i> Anexos</label>
            
            <!-- Detalhes -->
            <section id="content1" class="sessao">
                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                    <?php echo form_hidden('idOs',$result->idOs) ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h3>#Protocolo: <?php echo $result->idOs ?></h3>
                        </div>
                        <div class="col-md-6">
                            <div class="item form-group" style="margin-left: 0">
                                <label class="control-label" for="cliente">Cliente <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input id="cliente" name="cliente" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo $result->nomeCliente ?>">
                                    <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>"  />
                                    <input id="valorTotal" type="hidden" name="valorTotal" value=""  />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item form-group">
                                <label class="control-label" for="tecnico">Técnico / Responsável <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <input id="tecnico" name="tecnico" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Insira o nome" required="required" type="text" value="<?php echo $result->nome ?>" >
                                  <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>"  />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="item form-group">
                                <label class="control-label" for="nome">Status <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select class="form-control" name="status" id="status">
                                        <option <?php if($result->status == 'Orçamento'){echo 'selected';} ?> value="Orçamento">Orçamento</option>
                                        <option <?php if($result->status == 'Aberto'){echo 'selected';} ?> value="Aberto">Aberto</option>
                                        <option <?php if($result->status == 'Faturado'){echo 'selected';} ?> value="Faturado">Faturado</option>
                                        <option <?php if($result->status == 'Em Andamento'){echo 'selected';} ?> value="Em Andamento">Em Andamento</option>
                                        <option <?php if($result->status == 'Finalizado'){echo 'selected';} ?> value="Finalizado">Finalizado</option>
                                        <option <?php if($result->status == 'Cancelado'){echo 'selected';} ?> value="Cancelado">Cancelado</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item form-group">
                                <label class="control-label" for="nome">Data Inicial <span class="required">*</span>
                                </label>
                                <div class="">
                                    <fieldset>
                                      <div class="control-group">
                                        <div class="controls">
                                          <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                            <input type="text" id="dataInicial" name="dataInicial" class="form-control has-feedback-left datepicker" aria-describedby="inputSuccess2Status" value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                          </div>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item form-group">
                                <label class="control-label" for="nome">Data Final <span class="required">*</span>
                                </label>
                                <div class="">
                                   <fieldset>
                                      <div class="control-group">
                                        <div class="controls">
                                          <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                            <input type="text" id="dataFinal" name="dataFinal" class="form-control has-feedback-left datepicker" aria-describedby="inputSuccess2Status" value="<?php echo date('d/m/Y', strtotime($result->dataFinal)); ?>">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                          </div>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item form-group">
                                <label class="control-label" for="garantia">Garantia <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <input id="garantia" name="garantia" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" required="required" type="text" value="<?php echo $result->garantia ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="item form-group">
                                <label class="control-label" for="descricaoProduto">Descrição Produto/Serviço <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="textarea" name="descricaoProduto" placeholder="Digite o texto aqui" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $result->descricaoProduto; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item form-group">
                                <label class="control-label" for="defeito">Defeito <span class="required">*</span>
                                </label>
                                  <textarea class="textarea" name="defeito" placeholder="Digite o texto aqui"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $result->defeito?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="item form-group">
                                <label class="control-label" for="observacoes">Observações <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="textarea" name="observacoes" placeholder="Digite o texto aqui"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $result->observacoes ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item form-group">
                                <label class="control-label" for="laudoTecnico">Laudo Técnico <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <textarea class="textarea" name="laudoTecnico" placeholder="Digite o texto aqui"
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $result->laudoTecnico ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="padding: 1%; margin-left: 0">
                            <div class="span6 offset3" style="text-align: center">
                                <?php if($result->faturado == 0){ ?>
                                <a href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="btn btn-success"><i class="icon-file"></i><i class="fa  fa-file-text"></i> Faturar</a>
                                <?php } ?>
                                <a href="<?php echo base_url() ?>os" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Voltar</a>
                                <button class="btn btn-primary" id="btnContinuar"><i class="fa fa-check"></i> Alterar</button>
                                <a href="<?php echo base_url() ?>os/visualizar/<?php echo $result->idOs; ?>" class="btn btn-dark"><i class="fa fa-eye"></i> Visualizar OS</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            
            <!-- Produtos -->
            <section class="sessao" id="content2">
                <div class="span12 well" style="padding: 1%; margin-left: 0">
                    <form id="formProdutosOs" action="<?php echo base_url() ?>os/adicionarProduto" method="post">
                        <div class="row">
                        	<div class="col-md-8">
	                            <input type="hidden" name="idProduto" id="idProduto" />
	                            <input type="hidden" name="idOsProduto" id="idOsProduto" value="<?php echo $result->idOs?>" />
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
	                            <label for=""></label><br>
	                            <button class="btn btn-success form-control" id="btnAdicionarProduto"><i class="fa fa-plus"></i> Adicionar</button>
	                        </div>
                        </div>
                    </form>
                </div>

                <div class="span12" id="divProdutosOS" style="margin-left: 0">
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
                                echo '<td><a href="" id="btnOsExcluirProduto" idAcao="'.$p->idProdutos_os.'" prodAcao="'.$p->idProdutos.'" quantAcao="'.$p->quantidade.'" title="Excluir Produto" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>';
                                echo '<td>R$ '.number_format($p->subTotal,2,',','.').'</td>';
                                echo '</tr>';
                            }?>
                           
                            <tr>
                                <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                <td><strong>R$ <?php echo number_format($total,2,',','.');?><input type="hidden" id="total-venda" value="<?php echo number_format($total,2); ?>"></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            
            <!-- Serviços -->
            <section class="sessao" id="content3">
                <div class="span12" style="padding: 1%; margin-left: 0">
                    <div class="span12 well" style="padding: 1%; margin-left: 0">
                        <form id="formServicos" action="<?php echo base_url() ?>index.php/os/adicionarServico" method="post">
                        	<label for="">Serviço</label>
	                        <div class="row">
	                        	<div class="col-md-10">
		                            <input type="hidden" name="idServico" id="idServico" />
		                            <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs?>" />
		                            <input type="hidden" name="precoServico" id="precoServico" value=""/>
		                            
		                            <input type="text" class="span12 form-control" name="servico" id="servico" placeholder="Digite o nome do serviço" />
		                        </div>
		                        <div class="col-md2">
		                        	<label></label>
		                        	<button class="btn btn-success span12"><i class="fa fa-plus"></i> Adicionar</button>
		                        </div>
	                        </div>
                        </form>
                    </div>
                    <div class="span12" id="divServicos" style="margin-left: 0">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serviço</th>
                                    <th>Ações</th>
                                    <th>Sub-total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $total = 0;
                            foreach ($servicos as $s) {
                                $preco = $s->preco;
                                $total = $total + $preco;
                                echo '<tr>';
                                echo '<td>'.$s->nome.'</td>';
                                echo '<td><span idAcao="'.$s->idServicos_os.'" title="Excluir Serviço" class="btn btn-danger"><i class="fa fa-trash"></i></span></td>';
                                echo '<td>R$ '.number_format($s->preco,2,',','.').'</td>';
                                echo '</tr>';
                            }?>

                            <tr>
                                <td colspan="2" style="text-align: right"><strong>Total:</strong></td>
                                <td><strong>R$ <?php echo number_format($total,2,',','.');?><input type="hidden" id="total-servico" value="<?php echo number_format($total,2); ?>"></strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
          
            <!-- Anexos -->
            <section class="sessao" id="content4">
               <div class="span12" style="padding: 1%; margin-left: 0">
                    <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                        <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8"s method="post">
                        	<label for="">Anexo</label>
                        <div class="row">
                        	<div class="col-md-10">
	                            <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs; ?>" />
	                            <input type="file" class="span12" name="userfile[]" multiple size="20" />
	                        </div>
	                        <div class="col-md-2">
	                            <label for=""></label>
	                            <button class="btn btn-success span12"><i class="fa fa-plus"></i> Anexar</button>
	                        </div>
                        </div>
                        </form>
                    </div>
    
                    <div class="span12" id="divAnexos" style="margin-left: 0">
                        <?php 
                        $cont = 1;
                        $flag = 5;
                        echo '<div class="row">';
                        foreach ($anexos as $a) {

                            if($a->thumb == null){
                                $thumb = base_url().'assets/img/icon-file.png';
                                $link = base_url().'assets/img/icon-file.png';
                            }
                            else{
                                $thumb = base_url().'assets/anexos/thumbs/'.$a->thumb;
                                $link = $a->url.$a->anexo;
                            }
                            
                            if($cont == $flag){
                               echo '<div class="row"><div style="margin-left: 0" class="col-md-3"><a href="#modal-anexo" imagem="'.$a->idAnexos.'" link="'.$link.'" role="button" class="btn anexo" data-toggle="modal"><img src="'.$thumb.'" alt="" class="img-responsive"></a></div>'; 
                               $flag += 4;
                            }
                            else{
                               echo '<div class="col-md-3"><a href="#modal-anexo" imagem="'.$a->idAnexos.'" link="'.$link.'" role="button" class="btn anexo" data-toggle="modal"><img src="'.$thumb.'" alt="" class="img-responsive"></a></div>'; 
                            }
                            $cont ++;
                            
                        } 
                        echo '</div>';
                        ?>
                    </div>

                </div>
            </section>

        </div>
  </div>
</div>

<!-- Modal visualizar anexo -->

<div class="modal fade" id="modal-anexo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Excluir Produto</h4>
      </div>
      <div class="modal-body">
      		<div class="span12" id="div-visualizar-anexo" style="text-align: center">
                <div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>
            </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> Fechar</button>
        <a href="" id-imagem="" class="btn btn-dark" id="download"><i class="fa fa-download"></i> Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo"><i class="fa fa-trash"></i> Excluir Anexo</a>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modal-faturar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Excluir Produto</h4>
      </div>
      <div class="modal-body">
        <form id="formFaturar" action="<?php echo current_url() ?>" method="post">

            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
            <div class="form-group">
                <div class="span12"> 
                  <label for="descricao">Descrição</label>
                  <input id="descricao" name="descricao" class="form-control col-md-12 col-xs-12" type="text" value="Fatura de Venda - #<?php echo $result->idOs; ?>">
                </div>  
                <div class="span12"> 
                  <label for="cliente">Cliente*</label>
                  <input class="form-control col-md-12 col-xs-12" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                  <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                  <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                </div> 
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="cliente">Valor*</label>
                        <input type="hidden" id="tipo" name="tipo" value="receita" />
                        <input class="form-control col-md-12 col-xs-12 format_value" id="valor" type="text" name="valor" value="<?php echo number_format($total,2); ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="cliente">Data Vencimento*</label>
                        <input class="form-control col-md-12 col-xs-12 datepicker" id="vencimento" type="text" name="vencimento" />
                    </div>
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
            <div class="modal-footer">
                
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar">Cancelar</button>
                <button class="btn btn-primary">Faturar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>