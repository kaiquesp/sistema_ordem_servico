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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nome" name="nome" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Insira o nome" required="required" type="text" value="<?php echo set_value('nome'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Insira o email" value="<?php echo set_value('email'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefone">Telefone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="telefone" name="telefone" required="required" class="form-control col-md-7 col-xs-12" placeholder="Insira o Telefone" value="<?php echo set_value('telefone'); ?>" data-inputmask="'mask' : '(99) 9999-9999'">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">Celular <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="celular" name="celular" required="required" class="form-control col-md-7 col-xs-12" placeholder="Insira o Celular" value="<?php echo set_value('celular'); ?>" data-inputmask="'mask' : '(99) 99999-9999'">
            </div>
          </div>
            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login">Login <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="login" name="login" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Insira o Login" required="required" type="text" value="<?php echo set_value('login'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="password" class="control-label col-md-3">Senha</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="senha" type="password" name="senha" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo set_value('senha'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="situacao" class="control-label col-md-3">Situação</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="situacao" name="situacao">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="permissoes_id" class="control-label col-md-3">Permissões</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="permissoes_id" id="permissoes_id">
                    <?php foreach ($permissoes as $p) {
                         echo '<option value="'.$p->idPermissao.'">'.$p->nome.'</option>';
                    } ?>
                </select>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" class="btn btn-success">Cadastrar usuário</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>