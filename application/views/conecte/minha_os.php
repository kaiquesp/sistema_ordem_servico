<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Minha Ordem de Serviço</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css" />


    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script type="text/javascript"  src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
</head>

<body>


    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span12">

                <?php $totalServico = 0; $totalProdutos = 0;?>
                <div class="row-fluid" style="margin-top: 0">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                                <h5>Ordem de Serviço</h5>
                                <div class="buttons">

                                    <a id="imprimir" title="Imprimir" class="btn btn-mini btn-inverse" href=""><i class="icon-print icon-white"></i> Imprimir</a>
                                </div>
                            </div>
                            <div class="widget-content" id="printOs">
                                <div class="invoice-content">
                                    <div class="invoice-head" style="margin-bottom: 0">

                                        <table class="table table-condensed">
                                            <tbody>
                                            <?php if($emitente == null) {?>

                                                <tr>
                                                    <td colspan="3" class="alert">Os dados do emitente não foram configurados.</td>
                                                </tr>
                                            <?php } else {?>
                                                <tr>
                                                    <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                                    <td> <span style="font-size: 20px; "> <?php echo $emitente[0]->nome; ?></span> </br><span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua.', nº:'.$emitente[0]->numero.', '.$emitente[0]->bairro.' - '.$emitente[0]->cidade.' - '.$emitente[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $emitente[0]->email.' - Fone: '.$emitente[0]->telefone; ?></span></td>
                                                    <td style="width: 18%; text-align: center"><span>Emissão: <?php echo date('d/m/Y')?></span></td>
                                                </tr>

                                            <?php } ?>
                                            </tbody>
                                        </table>


                                        <table class="table table-condensed">
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

                                    </div>

                                    <div style="margin-top: 0; padding-top: 0">

                                    <?php if($result->descricaoProduto != null || $result->defeito != null || $result->laudoTecnico != null || $result->observacoes){ ?>

                                        <table class="table table-condensed">
                                            <tbody>
                                                <?php if($result->descricaoProduto != null){?>
                                                    <tr>
                                                        <td>
                                                            <strong>Descrição</strong><br> 
                                                            <?php echo $result->descricaoProduto?>
                                                        </td>
                                                    </tr>
                                                
                                                <?php }?>

                                                <?php if($result->defeito != null){?>
                                                    <tr>
                                                        <td>
                                                            <strong>Defeito</strong><br> 
                                                            <?php echo $result->defeito?>
                                                        </td>
                                                    </tr>
                                                <?php }?>

                                                <?php if($result->laudoTecnico != null){?>
                                                        <tr>
                                                            <td>
                                                                <strong>Laudo Técnico</strong> <br>
                                                                <?php echo $result->laudoTecnico?>
                                                            </td>
                                                        </tr>
                                                <?php }?>

                                                <?php if($result->observacoes != null){?>
                                                    <tr>
                                                        <td>
                                                            <strong>Observações</strong> <br>
                                                            <?php echo $result->observacoes?>
                                                        </td>
                                                    </tr>
                                                <?php }?>

                                            </tbody>
                                        </table>
                    
                                    <?php } ?>

                                    <?php if($produtos != null || $servicos != null){?>
                                        <br />
                                        <table class="table table-condensed" id="tblProdutos">
                                                    <thead>
                                                        <tr>
                                                            <th style="font-size: large">Item</th>
                                                            <th style="font-size: large">Quantidade</th>
                                                            <th style="font-size: large">Sub-total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        
                                                        foreach ($produtos as $p) {

                                                            $totalProdutos = $totalProdutos + $p->subTotal;
                                                            echo '<tr>';
                                                            echo '<td style="text-align: center">'.$p->descricao.'</td>';
                                                            echo '<td style="text-align: center">'.$p->quantidade.'</td>';
                                                            
                                                            echo '<td style="text-align: center">R$ '.number_format($p->subTotal,2,',','.').'</td>';
                                                            echo '</tr>';
                                                        }?>


                                                        <?php
                                                        setlocale(LC_MONETARY, 'en_US');
                                                        foreach ($servicos as $s) {
                                                            $preco = $s->preco;
                                                            $totalServico = $totalServico + $preco;
                                                            echo '<tr>';
                                                            echo '<td style="text-align: center">'.$s->nome.'</td>';
                                                            echo '<td></td>';
                                                            echo '<td style="text-align: center">R$ '.number_format($s->preco, 2, ',', '.').'</td>';
                                                            echo '</tr>';
                                                        }
                                                        ?>

                                                        <tr>
                                                            <td colspan="2" style="text-align: right"></td>
                                                            <td style="text-align: center"><strong>Total: R$ <?php  echo number_format($totalProdutos + $totalServico,2,',','.');?></strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                               <?php }?>

                                    </div>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#imprimir").click(function(){
                            PrintElem('#printOs');
                        })

                        function PrintElem(elem)
                        {
                            Popup($(elem).html());
                        }

                        function Popup(data)
                        {
                            var mywindow = window.open('', 'MapOs', 'height=600,width=800');
                            mywindow.document.write('<html><head><title>Map Os</title>');
                            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap.min.css' /><link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap-responsive.min.css' />");
                            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-style.css' /> <link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-media.css' />");


                            mywindow.document.write('</head><body >');
                            mywindow.document.write(data);
                            mywindow.document.write('</body></html>');

                            mywindow.print();
                            mywindow.close();

                            return true;
                        }

                    });
                </script>


            </div>
        </div>

    </div>
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> <?= date('Y') ?> &copy; <?php echo $this->config->item('app_name'); ?> - Versão <?php echo $this->config->item('app_version'); ?></div>
</div>

<!-- javascript
================================================== -->

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>


</body>
</html>
