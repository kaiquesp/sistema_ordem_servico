    <?php $totalServico = 0; $totalProdutos = 0;?>
    <div class="col-md-12 col-sm126 col-xs-12">
        <div class="x_panel">
            <h2>Ordem de Serviço</h2>
            <ul class="nav navbar-right panel_toolbox">
              <div class="buttons">
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                    echo '<a title="Icon Title" class="btn btn-info btn-xs" href="'.base_url().'index.php/os/editar/'.$result->idOs.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                } ?>

                <a target="_blank" title="Imprimir" class="btn btn-dark btn-xs" href="<?php echo site_url()?>/os/imprimir/<?php echo $result->idOs; ?>"><i class="icon-print icon-white"></i> Imprimir</a>
            </div>
        </ul>
        <div class="clearfix"></div>
        <div class="x_content">

            <table class="table table-responsive">
              <tbody>
                <tr>
                  <?php if($emitente == null) {?>
                                            
                    <tr>
                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<</td>
                    </tr>
                    <?php } else {?>
                    <tr>
                        <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                        <td><span style="font-size: 20px; "> <?php echo $emitente[0]->nome; ?></span> </br>
                            <span><?php echo $emitente[0]->cnpj; ?></span></br> 
                            <span><?php echo $emitente[0]->rua.', '.$emitente[0]->numero.' - '.$emitente[0]->bairro.' - '.$emitente[0]->cidade.' - '.$emitente[0]->uf; ?> </span> </br> 
                            <span> E-mail: <?php echo $emitente[0]->email.' - Fone: '.$emitente[0]->telefone; ?></span>
                        </td>
                        <td style="width: 18%; text-align: center">#Protocolo: 
                            <span ><?php echo $result->idOs?></span></br> </br> 
                            <span>Emissão: <?php echo date('d/m/Y')?></span>
                        </td>
                    </tr>

                    <?php } ?>
                </tr>
              </tbody>
            </table>

            <table class="table table-responsive">
              <tbody>
                <tr>
                    <td style="width: 50%; padding-left: 0">
                        <ul>
                            <li>
                                <span><h5>Cliente</h5>
                                <span><?php echo $result->nomeCliente?></span><br/>
                                <span><?php echo $result->rua?>, <?php echo $result->numero?>, <?php echo $result->bairro?></span><br/>
                                <span><?php echo $result->cidade?> - <?php echo $result->estado?></span>
                            </li>
                        </ul>
                    </td>
                    <td style="width: 50%; padding-left: 0">
                        <ul>
                            <li>
                                <span><h5>Responsável</h5></span>
                                <span><?php echo $result->nome?></span> <br/>
                                <span>Telefone: <?php echo $result->telefone?></span><br/>
                                <span>Email: <?php echo $result->email?></span>
                            </li>
                        </ul>
                    </td>
                </tr>
              </tbody>
            </table>

            <div>
                <?php if($result->descricaoProduto != null){?>
                    <hr style="margin-top: 0">
                    <h5>Descrição</h5>
                    <p>
                        <?php echo $result->descricaoProduto?>
                        
                    </p>
                <?php }?>
            </div>

        </div>
    </div>
</div>