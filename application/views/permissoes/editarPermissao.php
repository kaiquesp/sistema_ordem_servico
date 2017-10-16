  <?php $permissoes = unserialize($result->permissoes);?>
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editar P    ermissões</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <?php if(isset($msg)){
          echo "<div class='box-header with-border'>".$msg."</div>";
        } 
        ?>
        <?php if ($this->session->flashdata('error') == TRUE): ?>
          <p><?php echo $this->session->flashdata('error'); ?></p>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success') == TRUE): ?>
          <p><?php echo $this->session->flashdata('success'); ?></p>
        <?php endif; ?>
        <div class="x_content">
        <form action="<?php echo base_url();?>permissoes/editar" id="formPermissao" method="post">
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
                        <span class="lbl"> Marcar Todos</span>
                    </label>
                </div>
           </div>
           <div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['vCliente'])){ if($permissoes['vCliente'] == '1'){echo 'checked';}}?> name="vCliente" type="checkbox" class="js-switch" value="1" /> Visualizar Cliente
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['aCliente'])){ if($permissoes['aCliente'] == '1'){echo 'checked';}}?> name="aCliente" class="js-switch" type="checkbox" value="1" /> Visualizar Cliente
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['eCliente'])){ if($permissoes['eCliente'] == '1'){echo 'checked';}}?> name="eCliente" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Editar Cliente</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['dCliente'])){ if($permissoes['dCliente'] == '1'){echo 'checked';}}?> name="dCliente" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Excluir Cliente</span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['vProduto'])){ if($permissoes['vProduto'] == '1'){echo 'checked';}}?> name="vProduto" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Visualizar Produto</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['aProduto'])){ if($permissoes['aProduto'] == '1'){echo 'checked';}}?> name="aProduto" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Adicionar Produto</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['eProduto'])){ if($permissoes['eProduto'] == '1'){echo 'checked';}}?> name="eProduto" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Editar Produto</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['dProduto'])){ if($permissoes['dProduto'] == '1'){echo 'checked';}}?> name="dProduto" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Excluir Produto</span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['vServico'])){ if($permissoes['vServico'] == '1'){echo 'checked';}}?> name="vServico" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Visualizar Serviço</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['aServico'])){ if($permissoes['aServico'] == '1'){echo 'checked';}}?> name="aServico" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Adicionar Serviço</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['eServico'])){ if($permissoes['eServico'] == '1'){echo 'checked';}}?> name="eServico" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Editar Serviço</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['dServico'])){ if($permissoes['dServico'] == '1'){echo 'checked';}}?> name="dServico" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Excluir Serviço</span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['vOs'])){ if($permissoes['vOs'] == '1'){echo 'checked';}}?> name="vOs" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Visualizar OS</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['aOs'])){ if($permissoes['aOs'] == '1'){echo 'checked';}}?> name="aOs" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Adicionar OS</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['eOs'])){ if($permissoes['eOs'] == '1'){echo 'checked';}}?> name="eOs" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Editar OS</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['dOs'])){ if($permissoes['dOs'] == '1'){echo 'checked';}}?> name="dOs" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Excluir OS</span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['vVenda'])){ if($permissoes['vVenda'] == '1'){echo 'checked';}}?> name="vVenda" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Visualizar Venda</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['aVenda'])){ if($permissoes['aVenda'] == '1'){echo 'checked';}}?> name="aVenda" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Adicionar Venda</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['eVenda'])){ if($permissoes['eVenda'] == '1'){echo 'checked';}}?> name="eVenda" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Editar Venda</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['dVenda'])){ if($permissoes['dVenda'] == '1'){echo 'checked';}}?> name="dVenda" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Excluir Venda</span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['vArquivo'])){ if($permissoes['vArquivo'] == '1'){echo 'checked';}}?> name="vArquivo" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Visualizar Arquivo</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['aArquivo'])){ if($permissoes['aArquivo'] == '1'){echo 'checked';}}?> name="aArquivo" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Adicionar Arquivo</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['eArquivo'])){ if($permissoes['eArquivo'] == '1'){echo 'checked';}}?> name="eArquivo" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Editar Arquivo</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['dArquivo'])){ if($permissoes['dArquivo'] == '1'){echo 'checked';}}?> name="dArquivo" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Excluir Arquivo</span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['vLancamento'])){ if($permissoes['vLancamento'] == '1'){echo 'checked';}}?> name="vLancamento" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Visualizar Lançamento</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['aLancamento'])){ if($permissoes['aLancamento'] == '1'){echo 'checked';}}?> name="aLancamento" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Adicionar Lançamento</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['eLancamento'])){ if($permissoes['eLancamento'] == '1'){echo 'checked';}}?> name="eLancamento" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Editar Lançamento</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['dLancamento'])){ if($permissoes['dLancamento'] == '1'){echo 'checked';}}?> name="dLancamento" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Excluir Lançamento</span>
                                </label>
                            </td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['rCliente'])){ if($permissoes['rCliente'] == '1'){echo 'checked';}}?> name="rCliente" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Relatório Cliente</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['rServico'])){ if($permissoes['rServico'] == '1'){echo 'checked';}}?> name="rServico" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Relatório Serviço</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['rOs'])){ if($permissoes['rOs'] == '1'){echo 'checked';}}?> name="rOs" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Relatório OS</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['rProduto'])){ if($permissoes['rProduto'] == '1'){echo 'checked';}}?> name="rProduto" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Relatório Produto</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['rVenda'])){ if($permissoes['rVenda'] == '1'){echo 'checked';}}?> name="rVenda" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Relatório Venda</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['rFinanceiro'])){ if($permissoes['rFinanceiro'] == '1'){echo 'checked';}}?> name="rFinanceiro" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Relatório Financeiro</span>
                                </label>
                            </td>
                            <td colspan="2"></td>
                        </tr>
                        <tr><td colspan="4"></td></tr>
                        <tr>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['cUsuario'])){ if($permissoes['cUsuario'] == '1'){echo 'checked';}}?> name="cUsuario" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Configurar Usuário</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['cEmitente'])){ if($permissoes['cEmitente'] == '1'){echo 'checked';}}?> name="cEmitente" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Configurar Emitente</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['cPermissao'])){ if($permissoes['cPermissao'] == '1'){echo 'checked';}}?> name="cPermissao" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Configurar Permissão</span>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input <?php if(isset($permissoes['cBackup'])){ if($permissoes['cBackup'] == '1'){echo 'checked';}}?> name="cBackup" class="js-switch" type="checkbox" value="1" />
                                    <span class="lbl"> Backup</span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
           </div>
           <div class="row">
                <div class="col-md-12">
                    <div class="span6 offset5">
                        <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                        <a href="<?php echo base_url() ?>index.php/permissoes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                    </div>
                </div>
           </div>
           </form>
        </div>
      </div>
    </div>
  </div>
  