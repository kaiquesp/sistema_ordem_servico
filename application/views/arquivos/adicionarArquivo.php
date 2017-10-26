  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Lista de Arquivos</h3>
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
            <form action="<?php echo current_url(); ?>" id="formArquivo" enctype="multipart/form-data" method="post" class="form-horizontal" >
                    
                <div class="form-group">
                    <label for="preco" class="control-label"><span class="required">Arquivo*</span></label>
                    <div class="controls">
                        <input class="form-control" id="arquivo" type="file" name="userfile" /> <strong>(txt | pdf | gif | png | jpg | jpeg)</strong>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome" class="control-label">Nome do Arquivo*</label>
                    <div class="controls">
                        <input class="form-control col-xs-3" id="nome" type="text" name="nome" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="descricao" class="control-label">Descrição</label>
                    <div class="controls">
                        <textarea class="form-control" rows="3" cols="30" name="descricao" id="descricao"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="descricao" class="control-label">Data</label>
                    <div class="controls">
                        <input class="form-control datepicker col-md-3 col-sm-3 col-xs-12" id="data" type="text" name="data" />
                    </div>
                </div>

                <div class="form-actions form-group">
                    <div class="span12">
                        <div class="span6 offset3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</button>
                            <a href="<?php echo base_url() ?>arquivos" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>


