<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Cadastro de Serviços</h3>
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
        <form role="form" action="adicionar" id="formUsuario" method="POST" class="form-horizontal form-label-left">
          </p>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nome" name="nome" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Nome" required="required" type="text" value="<?php echo set_value('nome'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">Preço <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="preco" name="preco" class="form-control col-md-7 col-xs-12 format_value" placeholder="Preço" required="required" type="text" style="background-repeat: repeat; background-image: none; background-position: 0% 0%;" value="<?php echo set_value('preco'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descricao <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="descricao" name="descricao" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Descricao" required="required" type="text" value="<?php echo set_value('descricao'); ?>">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" class="btn btn-success">Cadastrar Serviço</button>
              <a href="<?php echo base_url("servicos"); ?>" class="btn btn-danger">Voltar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>