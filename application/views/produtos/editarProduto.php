<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Editar Produto</h3>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
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
        <form role="form" action="<?php echo current_url(); ?>" id="formUsuario" method="POST" class="form-horizontal form-label-left">
          <?php echo form_hidden('idProdutos',$result->idProdutos) ?>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descricao <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="descricao" name="descricao" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Descricao" required="required" type="text" value="<?php echo $result->descricao; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Tipo de Movimento
            </label>
            <div class="controls col-md-6 col-sm-6 col-xs-12">
                <label for="entrada" class="btn btn-default" style="margin-top: 5px;">Entrada 
                    <input type="checkbox" id="entrada" name="entrada" class="badgebox" value="1" <?=($result->entrada == 1)?'checked':''?>>
                    <span class="badge" >&check;</span>
                </label>
                <label for="saida" class="btn btn-default" style="margin-top: 5px;">Saída 
                    <input type="checkbox" id="saida" name="saida" class="badgebox" value="1" <?=($result->saida == 1)?'checked':''?>>
                    <span class="badge" >&check;</span>
                </label>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precoCompra">Preço da compra <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="precoCompra" name="precoCompra" class="form-control col-md-7 col-xs-12 format_value" placeholder="Preço da compra" required="required" type="text" style="background-repeat: repeat; background-image: none; background-position: 0% 0%;" value="<?php echo $result->precoCompra; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precoVenda">Preço de venda <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="precoVenda" name="precoVenda" class="form-control col-md-7 col-xs-12 format_value" placeholder="Preço da venda" required="required" type="text" style="background-repeat: repeat; background-image: none; background-position: 0% 0%;" value="<?php echo $result->precoVenda; ?>">
            </div>
          </div>
            <div class="item form-group">
            <label for="unidade" class="control-label col-md-3">Unidade</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="unidade" id="unidade">
                    <option value="UN" <?=($result->unidade == 'Unidade')?'selected':''?>>Unidade</option>
                    <option value="KG" <?=($result->unidade == 'Kilograma')?'selected':''?>>Kilograma</option>
                    <option value="LT" <?=($result->unidade == 'Litro')?'selected':''?>>Litro</option>
                    <option value="CX" <?=($result->unidade == 'Caixa')?'selected':''?>>Caixa</option>
                </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estoque">Estoque <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="estoque" name="estoque" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Ex. 50" required="required" type="text" value="<?php echo $result->estoque; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estoqueMinimo">Estoque Mínimo <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="estoqueMinimo" name="estoqueMinimo" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Ex. 5" type="text" value="<?php echo $result->estoqueMinimo; ?>">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="<?php echo base_url("produtos"); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
              <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Editar Produto</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
