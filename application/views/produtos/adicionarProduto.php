<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Cadastro de usuários</h3>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
        <?php if ($custom_error != '') {

            if($custom_error == 'Usuário cadastrado com sucesso'){
              echo '<div class="alert alert-success">'.$custom_error.'</div>';
            }else{
              echo '<div class="alert alert-danger">'.$custom_error.'</div>';
            }
        } ?>
        <form role="form" action="adicionar" id="formUsuario" method="POST" class="form-horizontal form-label-left">
          </p>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descricao <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="descricao" name="descricao" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Descricao" required="required" type="text" value="<?php echo set_value('descricao'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Tipo de Movimento
            </label>
            <div class="controls col-md-6 col-sm-6 col-xs-12">
                <label for="entrada" class="btn btn-default" style="margin-top: 5px;">Entrada 
                    <input type="checkbox" id="entrada" name="entrada" class="badgebox" value="1" checked>
                    <span class="badge" >&check;</span>
                </label>
                <label for="saida" class="btn btn-default" style="margin-top: 5px;">Saída 
                    <input type="checkbox" id="saida" name="saida" class="badgebox" value="1" checked>
                    <span class="badge" >&check;</span>
                </label>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precoCompra">Preço da compra <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="precoCompra" name="precoCompra" class="form-control col-md-7 col-xs-12 format_value" placeholder="Preço da compra" required="required" type="text" style="background-repeat: repeat; background-image: none; background-position: 0% 0%;" value="<?php echo set_value('precoCompra'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precoVenda">Preço de venda <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="precoVenda" name="precoVenda" class="form-control col-md-7 col-xs-12 format_value" placeholder="Preço da venda" required="required" type="text" style="background-repeat: repeat; background-image: none; background-position: 0% 0%;" value="<?php echo set_value('precoVenda'); ?>">
            </div>
          </div>
            <div class="item form-group">
            <label for="unidade" class="control-label col-md-3">Unidade</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="unidade" id="unidade">
                    <option value="Unidade">Unidade</option>
                    <option value="Kilograma">Kilograma</option>
                    <option value="Litro">Litro</option>
                    <option value="Caixa">Caixa</option>
                </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estoque">Estoque <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="estoque" name="estoque" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Ex. 50" required="required" type="text" value="<?php echo set_value('estoque'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estoqueMinimo">Estoque Mínimo <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="estoqueMinimo" name="estoqueMinimo" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Ex. 5" type="text" value="<?php echo set_value('estoqueMinimo'); ?>">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" class="btn btn-success">Cadastrar usuário</button>
              <a href="<?php echo base_url("produtos"); ?>" class="btn btn-danger">Voltar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script src="<?php site_url(); ?>../assets/js/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php site_url(); ?>../assets/js/jquery.maskMoney/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
  $(".format_value").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
</script>