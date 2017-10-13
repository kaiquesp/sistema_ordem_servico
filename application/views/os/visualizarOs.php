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

        <table class="table">
             <tbody>
                <?php if($emitente == null) {?>
                                            
                    <tr>
                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<</td>
                    </tr>
                    <?php } else {?>
                    <tr>
                        <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                        <td> <span style="font-size: 20px; "> <?php echo $emitente[0]->nome; ?></span> </br><span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua.', '.$emitente[0]->numero.' - '.$emitente[0]->bairro.' - '.$emitente[0]->cidade.' - '.$emitente[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $emitente[0]->email.' - Fone: '.$emitente[0]->telefone; ?></span></td>
                        <td style="width: 18%; text-align: center">#Protocolo: <span ><?php echo $result->idOs?></span></br> </br> <span>Emissão: <?php echo date('d/m/Y')?></span></td>
                    </tr>

                <?php } ?>
             </tbody>
        </table>

        <table class="table">
            <tbody>
                <tr>
                    <td style="width: 50%; padding-left: 0">
                        <ul>
                            <li style="list-style: none;">
                                <span><h5>Cliente</h5>
                                <span><?php echo $result->nomeCliente?></span><br/>
                                <span><?php echo $result->rua?>, <?php echo $result->numero?>, <?php echo $result->bairro?></span><br/>
                                <span><?php echo $result->cidade?> - <?php echo $result->estado?></span>
                            </li>
                        </ul>
                    </td>
                    <td style="width: 50%; padding-left: 0">
                        <ul>
                            <li style="list-style: none;">
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

        <div style="margin-top: 0; padding-top: 0">

            <?php if($result->descricaoProduto != null){?>
            <hr style="margin-top: 0">
            <h5>Descrição</h5>
            <p>
                <?php echo $result->descricaoProduto?>
                
            </p>
            <?php }?>

            <?php if($result->defeito != null){?>
            <hr style="margin-top: 0">
            <h5>Defeito</h5>
            <p>
                <?php echo $result->defeito?>
            </p>
            <?php }?>
            <?php if($result->laudoTecnico != null){?>
            <hr style="margin-top: 0">
            <h5>Laudo Técnico</h5>
            <p>
                <?php echo $result->laudoTecnico?>
            </p>
            <?php }?>
            <?php if($result->observacoes != null){?>
            <hr style="margin-top: 0">
            <h5>Observações</h5>
            <p>
                <?php echo $result->observacoes?>
            </p>
            <?php }?>

                <?php if($produtos != null){?>
                <br />
                <table class="table table-bordered" id="tblProdutos">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Sub-total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                foreach ($produtos as $p) {

                                    $totalProdutos = $totalProdutos + $p->subTotal;
                                    echo '<tr>';
                                    echo '<td>'.$p->descricao.'</td>';
                                    echo '<td>'.$p->quantidade.'</td>';
                                    
                                    echo '<td>R$ '.number_format($p->subTotal,2,',','.').'</td>';
                                    echo '</tr>';
                                }?>

                                <tr>
                                    <td colspan="2" style="text-align: right"><strong>Total:</strong></td>
                                    <td><strong>R$ <?php echo number_format($totalProdutos,2,',','.');?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                       <?php }?>
                
                <?php if($servicos != null){?>
                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Serviço</th>
                                        <th>Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                setlocale(LC_MONETARY, 'en_US');
                                foreach ($servicos as $s) {
                                    $preco = $s->preco;
                                    $totalServico = $totalServico + $preco;
                                    echo '<tr>';
                                    echo '<td>'.$s->nome.'</td>';
                                    echo '<td>R$ '.number_format($s->preco, 2, ',', '.').'</td>';
                                    echo '</tr>';
                                }?>

                                <tr>
                                    <td colspan="1" style="text-align: right"><strong>Total:</strong></td>
                                    <td><strong>R$ <?php  echo number_format($totalServico, 2, ',', '.');?></strong></td>
                                </tr>
                                </tbody>
                            </table>
                <?php }?>
                <hr />
            
                <h4 style="text-align: right">Valor Total: R$ <?php echo number_format($totalProdutos + $totalServico,2,',','.');?></h4>

            </div>

      </div>
    </div>
</div>