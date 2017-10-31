<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="title_left">
        <h3>Dados do Produto</h3>
      </div>
    <div class="x_panel">
        <div class="x_content">
            <table class="table table-bordered">
                  <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Descrição</strong></td>
                            <td><?php echo $result->descricao ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Unidade</strong></td>
                            <td><?php echo $result->unidade ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Preço de Compra</strong></td>
                            <td>R$ <?php echo $result->precoCompra; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Preço de Venda</strong></td>
                            <td>R$ <?php echo $result->precoVenda; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Estoque</strong></td>
                            <td><?php echo $result->estoque; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Estoque Mínimo</strong></td>
                            <td><?php echo $result->estoqueMinimo; ?></td>
                        </tr>
                  </tbody>
            </table>
            <div align="center">
                <a href="<?php echo base_url("produtos"); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
  </div>
</div>
<script type="text/javascript" src="<?php site_url(); ?>assets/js/jquery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php site_url(); ?>assets/js/datatables.net/jquery.dataTables.min.js"></script>