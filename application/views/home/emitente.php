  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Dados do emitente</h3>
      </div>
    </div>
    <div class="clearfix"></div>
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
          
        <?php if(!isset($dados) || $dados == null) {?>
            <div class="alert alert-danger">Nenhum dado foi cadastrado até o momento. Essas informações estarão disponíveis na tela de impressão de OS.</div>
            <a href="#modalCadastrar" data-toggle="modal" role="button" class="btn btn-success">Cadastrar Dados</a>

        <?php }else{ ?>
            <div class="row-fluid" style="margin-top:0">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-align-justify"></i>
                            </span>
                            <h5>Dados do Emitente</h5>
                        </div>
                        <div class="widget-content ">
                        <div class="alert alert-info">Os dados abaixo serão utilizados no cabeçalho das telas de impressão.</div>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%"><img src=" <?php echo $dados[0]->url_logo; ?> " class="img-responsive"></td>
                                        <td> <span style="font-size: 20px; "> <?php echo $dados[0]->nome; ?> </span> </br><span><?php echo $dados[0]->cnpj; ?> </br> <?php echo $dados[0]->rua.', nº:'.$dados[0]->numero.', '.$dados[0]->bairro.' - '.$dados[0]->cidade.' - '.$dados[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $dados[0]->email.' - Fone: '.$dados[0]->telefone; ?></span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="#modalAlterar" data-toggle="modal" role="button" class="btn btn-primary">Alterar Dados</a>
                            <a href="#modalLogo" data-toggle="modal" role="button" class="btn btn-dark">Alterar Logo</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cadastrar-->
<div class="modal fade" id="modalCadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="<?php echo base_url(); ?>home/cadastrarEmitente" id="formCadastrar" enctype="multipart/form-data" method="post" class="form-horizontal" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="control-group">
            <label for="nome" class="control-label">Razão Social<span class="required">*</span></label>
            <div class="controls">
                <input id="nome" type="text" name="nome" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="cnpj" class="control-label"><span class="required">CNPJ*</span></label>
            <div class="controls">
                <input class="" type="text" name="cnpj" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">IE*</span></label>
            <div class="controls">
                <input type="text" name="ie" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">Logradouro*</span></label>
            <div class="controls">
                <input type="text" name="logradouro" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">Número*</span></label>
            <div class="controls">
                <input type="text" name="numero" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">Bairro*</span></label>
            <div class="controls">
                <input type="text" name="bairro" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">Cidade*</span></label>
            <div class="controls">
                <input type="text" name="cidade" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">UF*</span></label>
            <div class="controls">
                <input type="text" name="uf" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">Telefone*</span></label>
            <div class="controls">
                <input type="text" name="telefone" value=""  />
            </div>
        </div>
        <div class="control-group">
            <label for="descricao" class="control-label"><span class="required">E-mail*</span></label>
            <div class="controls">
                <input type="text" name="email" value="" />
            </div>
        </div>

        <div class="control-group">
            <label for="logo" class="control-label"><span class="required">Logomarca*</span></label>
            <div class="controls">
                <input type="file" name="userfile" value="" />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
        <button class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</button>
      </div>
        </form>  
    </div>
  </div>
</div>



<!-- Modal Alterar-->
<div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="<?php echo base_url(); ?>home/editarEmitente" id="formAlterar" enctype="multipart/form-data" method="post" class="form-horizontal" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar Emitente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="control-group">
                <label for="nome" class="control-label">Razão Social<span class="required">*</span></label>
                <div class="controls">
                    <input class="form-control" id="nome" type="text" name="nome" value="<?php echo $dados[0]->nome; ?>"  />
                    <input id="nome" type="hidden" name="id" value="<?php echo $dados[0]->id; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="cnpj" class="control-label"><span class="required">CNPJ*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="cnpj" value="<?php echo $dados[0]->cnpj; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">IE*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="ie" value="<?php echo $dados[0]->ie; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">Logradouro*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="logradouro" value="<?php echo $dados[0]->rua; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">Número*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="numero" value="<?php echo $dados[0]->numero; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">Bairro*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="bairro" value="<?php echo $dados[0]->bairro; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">Cidade*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="cidade" value="<?php echo $dados[0]->cidade; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">UF*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="uf" value="<?php echo $dados[0]->uf; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">Telefone*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="telefone" value="<?php echo $dados[0]->telefone; ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="descricao" class="control-label"><span class="required">E-mail*</span></label>
                <div class="controls">
                    <input class="form-control" type="text" name="email" value="<?php echo $dados[0]->email; ?>" />
                </div>
            </div>
            </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
                <button class="btn btn-primary">Alterar</button>
            </div>
        </form>  
    </div>
  </div>
</div>

<!-- Modal Alterar Logo-->
<div class="modal fade" id="modalLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="<?php echo base_url(); ?>home/editarLogo" id="formLogo" enctype="multipart/form-data" method="post" class="form-horizontal" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="span12 alert alert-info">Selecione uma nova imagem da logomarca. Tamanho indicado (130 X 130).</div>          
            <div class="control-group">
                <label for="logo" class="control-label"><span class="required">Logomarca*</span></label>
                <div class="controls">
                    <input type="file" name="userfile" value="" />
                    <input id="nome" type="hidden" name="id" value="<?php echo $dados[0]->id; ?>"  />
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
            <button class="btn btn-primary">Alterar</button>
        </form>  
    </div>
  </div>
</div>