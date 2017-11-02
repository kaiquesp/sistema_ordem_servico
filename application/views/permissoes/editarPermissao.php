  <?php $permissoes = unserialize($result->permissoes);?>
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
                            <input type="text" id="nome" name="nome" class="form-control col-md-7 col-xs-12" value="<?php echo $result->nome; ?>">
                            <input type="hidden" name="idPermissao" value="<?php echo $result->idPermissao; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Situação</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="situacao" id="situacao">
                            <?php if($result->situacao == 1){$sim = 'selected'; $nao ='';}else{$sim = ''; $nao ='selected';}?>
                            <option value="1" <?php echo $sim;?>>Ativo</option>
                            <option value="0" <?php echo $nao;?>>Inativo</option>
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
                        <th>Configurar</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Visualizar</span></td>
                            <td><input <?php if(isset($permissoes['vCliente'])){ if($permissoes['vCliente'] == '1'){echo 'checked';}}?> name="vCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input <?php if(isset($permissoes['vProduto'])){ if($permissoes['vProduto'] == '1'){echo 'checked';}}?> name="vProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input <?php if(isset($permissoes['vServico'])){ if($permissoes['vServico'] == '1'){echo 'checked';}}?> name="vServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input <?php if(isset($permissoes['vOs'])){ if($permissoes['vOs'] == '1'){echo 'checked';}}?> name="vOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input <?php if(isset($permissoes['vVenda'])){ if($permissoes['vVenda'] == '1'){echo 'checked';}}?> name="vVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input <?php if(isset($permissoes['vLancamento'])){ if($permissoes['vLancamento'] == '1'){echo 'checked';}}?> name="vLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input <?php if(isset($permissoes['vArquivo'])){ if($permissoes['vArquivo'] == '1'){echo 'checked';}}?> name="vArquivo" class="marcar" type="checkbox"value="1" /><span> Arquivos</span></td>
                            <td><input <?php if(isset($permissoes['cUsuario'])){ if($permissoes['cUsuario'] == '1'){echo 'checked';}}?> name="cUsuario" class="marcar" type="checkbox" value="1" /><span> Usuário</span></td>
                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Adicionar</span></td>
                            <td><input <?php if(isset($permissoes['aCliente'])){ if($permissoes['aCliente'] == '1'){echo 'checked';}}?> name="aCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input <?php if(isset($permissoes['aProduto'])){ if($permissoes['aProduto'] == '1'){echo 'checked';}}?> name="aProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input <?php if(isset($permissoes['aServico'])){ if($permissoes['aServico'] == '1'){echo 'checked';}}?> name="aServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input <?php if(isset($permissoes['aOs'])){ if($permissoes['aOs'] == '1'){echo 'checked';}}?> name="aOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input <?php if(isset($permissoes['aVenda'])){ if($permissoes['aVenda'] == '1'){echo 'checked';}}?> name="aVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input <?php if(isset($permissoes['aLancamento'])){ if($permissoes['aLancamento'] == '1'){echo 'checked';}}?> name="aLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input <?php if(isset($permissoes['aArquivo'])){ if($permissoes['aArquivo'] == '1'){echo 'checked';}}?> name="aArquivo" class="marcar" type="checkbox" value="1" /><span> Arquivos</span></td>
                            <td><input <?php if(isset($permissoes['cEmitente'])){ if($permissoes['cEmitente'] == '1'){echo 'checked';}}?> name="cEmitente" class="marcar" type="checkbox" value="1" /><span> Emitente</span></td>
                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Editar</span></td>
                            <td><input <?php if(isset($permissoes['eCliente'])){ if($permissoes['eCliente'] == '1'){echo 'checked';}}?> name="eCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input <?php if(isset($permissoes['eProduto'])){ if($permissoes['eProduto'] == '1'){echo 'checked';}}?> name="eProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input <?php if(isset($permissoes['eServico'])){ if($permissoes['eServico'] == '1'){echo 'checked';}}?> name="eServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input <?php if(isset($permissoes['eOs'])){ if($permissoes['eOs'] == '1'){echo 'checked';}}?> name="eOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input <?php if(isset($permissoes['eVenda'])){ if($permissoes['eVenda'] == '1'){echo 'checked';}}?> name="eVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input <?php if(isset($permissoes['eLancamento'])){ if($permissoes['eLancamento'] == '1'){echo 'checked';}}?> name="eLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input <?php if(isset($permissoes['eArquivo'])){ if($permissoes['eArquivo'] == '1'){echo 'checked';}}?> name="eArquivo" class="marcar" type="checkbox" value="1" /><span> Arquivos</span></td>
                            <td><input <?php if(isset($permissoes['cPermissao'])){ if($permissoes['cPermissao'] == '1'){echo 'checked';}}?> name="cPermissao" class="marcar" type="checkbox" value="1" /><span> Permissão</span></td>
                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Excluir</span></td>
                            <td><input <?php if(isset($permissoes['dCliente'])){ if($permissoes['dCliente'] == '1'){echo 'checked';}}?> name="dCliente" class="marcar" type="checkbox" value="1" /><span> Clientes</span></td>
                            <td><input <?php if(isset($permissoes['dProduto'])){ if($permissoes['dProduto'] == '1'){echo 'checked';}}?> name="dProduto" class="marcar" type="checkbox" value="1" /><span> Produtos</span></td>
                            <td><input <?php if(isset($permissoes['dServico'])){ if($permissoes['dServico'] == '1'){echo 'checked';}}?> name="dServico" class="marcar" type="checkbox" value="1" /><span> Serviços</span></td>
                            <td><input <?php if(isset($permissoes['dOs'])){ if($permissoes['dOs'] == '1'){echo 'checked';}}?> name="dOs" class="marcar" type="checkbox" value="1" /><span> OS</span></td>
                            <td><input <?php if(isset($permissoes['dVenda'])){ if($permissoes['dVenda'] == '1'){echo 'checked';}}?> name="dVenda" class="marcar" type="checkbox" value="1" /><span> Vendas</span></td>
                            <td><input <?php if(isset($permissoes['dLancamento'])){ if($permissoes['dLancamento'] == '1'){echo 'checked';}}?> name="dLancamento" class="marcar" type="checkbox" value="1" /><span> Lançamentos</span></td>
                            <td><input <?php if(isset($permissoes['dArquivo'])){ if($permissoes['dArquivo'] == '1'){echo 'checked';}}?> name="dArquivo" class="marcar" type="checkbox" value="1" /><span> Arquivos</span></td>
                            <td><input <?php if(isset($permissoes['cBackup'])){ if($permissoes['cBackup'] == '1'){echo 'checked';}}?> name="cBackup" class="marcar" type="checkbox" value="1" /><span> Backup</span></td>

                        </tr>
                        <tr>
                            <td><span class="badge" style="background-color: #E97F02; border-color: #E97F02;">Relatórios</span></td>
                            <td><input <?php if(isset($permissoes['rCliente'])){ if($permissoes['rCliente'] == '1'){echo 'checked';}}?> name="rCliente" class="marcar" type="checkbox" value="1" /><span> RL. Clientes</span></td>
                            <td><input <?php if(isset($permissoes['rProduto'])){ if($permissoes['rProduto'] == '1'){echo 'checked';}}?> name="rProduto" class="marcar" type="checkbox" value="1" /><span> RL Produtos</span></td>
                            <td><input <?php if(isset($permissoes['rServico'])){ if($permissoes['rServico'] == '1'){echo 'checked';}}?> name="rServico" class="marcar" type="checkbox" value="1" /><span> RL Serviços</span></td>
                            <td><input <?php if(isset($permissoes['rOs'])){ if($permissoes['rOs'] == '1'){echo 'checked';}}?> name="rOs" class="marcar" type="checkbox" value="1" /><span> RL OS</span></td>
                            <td><input <?php if(isset($permissoes['rVenda'])){ if($permissoes['rVenda'] == '1'){echo 'checked';}}?> name="rVenda" class="marcar" type="checkbox" value="1" /><span> RL Vendas</span></td>
                            <td><input <?php if(isset($permissoes['rFinanceiro'])){ if($permissoes['rFinanceiro'] == '1'){echo 'checked';}}?> name="rFinanceiro" class="marcar" type="checkbox" value="1" /><span> RL. Financeiro</span></td>
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
                        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Alterar</button>
                    </div>
                </div>
           </div>
           </form>
        </div>
      </div>
    </div>
  </div>
  