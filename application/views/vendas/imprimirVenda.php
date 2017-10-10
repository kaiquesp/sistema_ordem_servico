<?php $totalProdutos = 0;?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Map OS</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript"  src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>

</head>
<body>

<div class="container-fluid">
<div class="row-fluid">
    <div class="span12">
        
    <div class="invoice-content">
        <div class="invoice-head">
                <table class="table">
                    <tbody>

                        <?php if($emitente == null) {?>
                                    
                        <tr>
                            <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<</td>
                        </tr>
                        <?php } else {?>

                        <tr>
                            <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                            <td> <span style="font-size: 20px; "> <?php echo $emitente[0]->nome; ?></span> </br><span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua.', nº:'.$emitente[0]->numero.', '.$emitente[0]->bairro.' - '.$emitente[0]->cidade.' - '.$emitente[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $emitente[0]->email.' - Fone: '.$emitente[0]->telefone; ?></span></td>
                            <td style="width: 18%; text-align: center">#Venda: <span ><?php echo $result->idVendas?></span></br> </br> <span>Emissão: <?php echo date('d/m/Y');?></span></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>

                <table class="table">
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
                                        <span><h5>Vendedor</h5></span>
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


                <?php if($produtos != null){?>
        
                <table class="table table-bordered table-condensed" id="tblProdutos">
                            <thead>
                                <tr>
                                    <th style="font-size: 15px">Produto</th>
                                    <th style="font-size: 15px">Quantidade</th>
                                    <th style="font-size: 15px">Sub-total</th>
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
                
        
                <hr />
            
                <h4 style="text-align: right">Valor Total: R$ <?php echo number_format($totalProdutos,2,',','.');?></h4>

            </div>
        </div>                               
    </div>
</div>
</div>



<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.js"></script> 
<script>
    window.print();
</script>

</body>
</html>







