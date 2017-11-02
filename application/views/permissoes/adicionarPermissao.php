  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editar Permissões</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <?php if ($this->session->flashdata('error') == TRUE): ?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
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
        <form action="<?php echo base_uRL();?>permissoes/editar" id="formPermissao" method="post">
           <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome da Permissão <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nome" name="nome" class="form-control col-md-7 col-xs-12" value="">
                            <input type="hidden" name="idPermissao" value=" ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Situação</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="situacao" id="situacao">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>
                        <input name="" type="checkbox" value="1" class="" id="marcarTodos" />
                        <span> Marcar Todos</span>
                    </label>
                </div>
           </div>
           <div>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class="topo-table">
                      <tr>
                        <th>#</th>
                        <th>Clientes</th>
                        <th>Produtos</th>
                        <th>Serviços</th>
                        <th>OS</th>
                        <th>Vendas</th>
                        <th>Lançamentos</th>
                        <th>Arquivos</th>
                        <th>Configurar Usuários</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Visualizar</span></td>
                            <td><input name="vCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input name="vProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input name="vServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input name="vOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input name="vVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input name="vLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input name="vArquivo" class="marcar" type="checkbox"value="1" /><span> Arquivos</span></td>
                            <td><input name="cUsuario" class="marcar" type="checkbox" value="1" /><span> Usuário</span></td>
                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Adicionar</span></td>
                            <td><input name="aCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input name="aProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input name="aServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input name="aOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input name="aVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input name="aLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input name="aArquivo" class="marcar" type="checkbox" value="1" /><span> Arquivos</span></td>
                            <td><input name="cEmitente" class="marcar" type="checkbox" value="1" /><span> Emitente</span></td>
                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Editar</span></td>
                            <td><input name="eCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input name="eProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input name="eServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input name="eOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input name="eVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input name="eLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input name="eArquivo" class="marcar" type="checkbox" value="1" /><span> Arquivos</span></td>
                            <td><input name="cPermissao" class="marcar" type="checkbox" value="1" /><span> Permissão</span></td>
                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Excluir</span></td>
                            <td><input name="dCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input name="dProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input name="dServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input name="dOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input name="dVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input name="dLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input name="dArquivo" class="marcar" type="checkbox" value="1" /><span> Arquivos</span></td>
                            <td><input name="cBackup" class="marcar" type="checkbox" value="1" /><span> Backup</span></td>

                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Relatórios</span></td>
                            <td><input name="rCliente" class="marcar" type="checkbox" value="1" /><span> RL. Clientes</span></td>
                            <td><input name="rProduto" class="marcar" type="checkbox" value="1" /><span> RL Produtos</span></td>
                            <td><input name="rServico" class="marcar" type="checkbox" value="1" /><span> RL Serviços</span></td>
                            <td><input name="rOs" class="marcar" type="checkbox" value="1" /><span> RL OS</span></td>
                            <td><input name="rVenda" class="marcar" type="checkbox" value="1" /><span> RL Vendas</span></td>
                            <td><input name="rFinanceiro" class="marcar" type="checkbox" value="1" /><span> RL. Financeiro</span></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
           </div>
           <div class="row">
                <div class="col-md-12">
                    <div class="span6 offset5">
                        <a href="<?php echo base_uRL() ?>permissoes" id="" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</button>
                    </div>
                </div>
           </div>
           </form>
        </div>
      </div>
    </div>
  </div>
  