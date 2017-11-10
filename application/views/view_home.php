<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ($this->session->userdata('logado')){

  if (isset($tela)) {
    $tela = $tela;
  } else {
    $tela = 'home/view_dashboard.php';
  }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema JapaCar</title>

  <!-- Bootstrap -->
  <link href="<?php echo site_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo site_url(); ?>assets/css/font-awesome/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo site_url(); ?>assets/css/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo site_url(); ?>assets/css/iCheck/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="<?php echo site_url(); ?>assets/css/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo site_url(); ?>assets/css/jqvmap/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo site_url(); ?>assets/css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo site_url(); ?>assets/css/custom.min.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="<?php echo site_url(); ?>assets/css/datatables.net-bs/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/css/datatables.net-buttons-bs/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/css/datatables.net-fixedheader-bs/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/css/datatables.net-responsive-bs/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/css/datatables.net-scroller-bs/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="<?php echo site_url(); ?>assets/css/switchery/switchery.min.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/smoothness/jquery-ui-1.9.2.custom.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;"> <a href="dashboard" class="site_title"><i class="fa fa-paw"></i> <span>Sistema JapaCar</span></a> </div>
          <div class="clearfix"></div>

          <!-- /menu profile quick info --> 

          <br />
          <?php
          $this->load->view('template/header');
          $this->load->view('template/sidebar');
          $this->load->view('template/topbar');           
          ?>
          <?php
          if ($tela != '') {
            $this->load->view($tela);
          }
          $this->load->view('template/footer');
          ?>
        </div>

        <!-- jQuery --> 
        <script src="<?php echo site_url(); ?>assets/js/jquery/jquery.min.js"></script> 
        <!-- Bootstrap --> 
        <script src="<?php echo site_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script> 
        <!-- FastClick --> 
        <script src="<?php echo site_url(); ?>assets/js/fastclick/fastclick.js"></script> 
        <!-- NProgress --> 
        <script src="<?php echo site_url(); ?>assets/js/nprogress/nprogress.js"></script> 
        <!-- Chart.js --> 
        <script src="<?php echo site_url(); ?>assets/js/Chart.js/Chart.min.js"></script> 
        <!-- gauge.js --> 
        <script src="<?php echo site_url(); ?>assets/js/gauge.js/gauge.min.js"></script> 
        <!-- bootstrap-progressbar --> 
        <script src="<?php echo site_url(); ?>assets/js/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> 
        <!-- iCheck --> 
        <script src="<?php echo site_url(); ?>assets/js/iCheck/icheck.min.js"></script> 
        <!-- Skycons --> 
        <script src="<?php echo site_url(); ?>assets/js/skycons/skycons.js"></script> 
        <!-- Flot --> 
        <script src="<?php echo site_url(); ?>assets/js/Flot/jquery.flot.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/Flot/jquery.flot.pie.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/Flot/jquery.flot.time.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/Flot/jquery.flot.stack.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/Flot/jquery.flot.resize.js"></script> 
        <!-- Flot plugins --> 
        <script src="<?php echo site_url(); ?>assets/js/flot.orderbars/jquery.flot.orderBars.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/flot-spline/jquery.flot.spline.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/flot.curvedlines/curvedLines.js"></script> 
        <!-- DateJS --> 
        <script src="<?php echo site_url(); ?>assets/js/DateJS/date.js"></script> 
        <!-- JQVMap --> 
        <script src="<?php echo site_url(); ?>assets/js/jqvmap/jquery.vmap.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/jqvmap/maps/jquery.vmap.world.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/jqvmap/jquery.vmap.sampledata.js"></script> 
        <!-- bootstrap-daterangepicker --> 
        <script src="<?php echo site_url(); ?>assets/js/moment/moment.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.js"></script> 

        <!-- Custom Theme Scripts --> 
        <script src="<?php echo site_url(); ?>assets/js/custom.min.js"></script> 
        <!-- Switchery --> 
        <script src="<?php echo site_url(); ?>assets/js/switchery/switchery.min.js"></script> 

        <!-- Datatables --> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net/jquery.dataTables.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-bs/dataTables.bootstrap.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-buttons/dataTables.buttons.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-buttons-bs/buttons.bootstrap.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-buttons/buttons.flash.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-buttons/buttons.html5.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-buttons/buttons.print.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-fixedheader/dataTables.fixedHeader.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-keytable/dataTables.keyTable.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-responsive/dataTables.responsive.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-responsive-bs/responsive.bootstrap.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/datatables.net-scroller/dataTables.scroller.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/jszip/jszip.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/pdfmake/pdfmake.min.js"></script> 
        <script src="<?php echo site_url(); ?>assets/js/pdfmake/vfs_fonts.js"></script> 
        <!-- jquery.inputmask --> 
        <script src="<?php echo site_url(); ?>assets/js/jquery.inputmask/jquery.inputmask.bundle.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/validate.js"></script> 
        <!-- jQuery autocomplete --> 
        <script src="<?php echo base_url()?>assets/js/devbridge-autocomplete/jquery.autocomplete.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui/jquery-ui-1.9.2.custom.js"></script> 
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script> 

        <!-- bootstrap-wysiwyg -->
        <script src="<?php echo base_url()?>assets/js/bootstrap-wysiwyg.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.hotkeys.js"></script>
        <script src="<?php echo base_url()?>assets/js/prettify.js"></script>
		    <script src="<?php echo base_url()?>assets/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/echarts/echarts.min.js"></script>
    	 <script src="<?php echo base_url()?>assets/js/echarts/world.js"></script>

        <?php if(isset($estatisticas_financeiro) && $estatisticas_financeiro != null) { 
         if($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null){
        ?>
        <script type="text/javascript">
         //echart Pie Collapse

         if ($('#echart_f_realizado').length ){ 
            
            var echartPieCollapse = echarts.init(document.getElementById('echart_f_realizado'));
            
            echartPieCollapse.setOption({
            tooltip: {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              x: 'center',
              y: 'bottom',
              data: ['Total Despesas', 'Total Receitas']
            },
            toolbox: {
              show: true,
              feature: {
              magicType: {
                show: true,
                type: ['pie', 'funnel']
              },
              restore: {
                show: true,
                title: "Atualizar"
              },
              saveAsImage: {
                show: true,
                title: "Salvar Imagem"
              }
              }
            },
            calculable: true,
            series: [{
              name: 'Financeiro Realizado',
              type: 'pie',
              radius: [25, 90],
              center: ['50%', 170],
              roseType: 'area',
              x: '50%',
              max: 20,
              sort: 'ascending',
              data: [{
              value: <?php echo ($estatisticas_financeiro->total_despesa != null ) ?  $estatisticas_financeiro->total_despesa : '0.00'; ?>,
              name: 'Total Despesas'
              }, {
              value: <?php echo ($estatisticas_financeiro->total_receita != null ) ?  $estatisticas_financeiro->total_receita : '0.00'; ?>,
              name: 'Total Receitas'
              }]
            }]
            });

          } 
        
          if ($('#echart_f_pendente').length ){ 
            
            var echartPieCollapse = echarts.init(document.getElementById('echart_f_pendente'));
            
            echartPieCollapse.setOption({
            tooltip: {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              x: 'center',
              y: 'bottom',
              data: ['Total Despesas', 'Total Receitas']
            },
            toolbox: {
              show: true,
              feature: {
              magicType: {
                show: true,
                type: ['pie', 'funnel']
              },
              restore: {
                show: true,
                title: "Restore"
              },
              saveAsImage: {
                show: true,
                title: "Save Image"
              }
              }
            },
            calculable: true,
            series: [{
              name: 'Financeiro Pendentes',
              type: 'pie',
              radius: [25, 90],
              center: ['50%', 170],
              roseType: 'area',
              x: '50%',
              max: 40,
              sort: 'ascending',
              data: [{
              value: <?php echo ($estatisticas_financeiro->total_despesa_pendente != null ) ?  $estatisticas_financeiro->total_despesa_pendente : '0.00'; ?>,
              name: 'Total Despesas'
              }, {
              value: <?php echo ($estatisticas_financeiro->total_receita_pendente != null ) ?  $estatisticas_financeiro->total_receita_pendente : '0.00'; ?>,
              name: 'Total Receitas'
              }]
            }]
            });

          } 
          

          if ($('#echart_f_previsto').length ){ 
            
            var echartPieCollapse = echarts.init(document.getElementById('echart_f_previsto'));
            
            echartPieCollapse.setOption({
            tooltip: {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              x: 'center',
              y: 'bottom',
              data: ['Total a Entrar', 'Total em caixa']
            },
            toolbox: {
              show: true,
              feature: {
              magicType: {
                show: true,
                type: ['pie', 'funnel']
              },
              restore: {
                show: true,
                title: "Restore"
              },
              saveAsImage: {
                show: true,
                title: "Save Image"
              }
              }
            },
            calculable: true,
            series: [{
              name: 'Financeiro Pendentes',
              type: 'pie',
              radius: [25, 90],
              center: ['50%', 170],
              roseType: 'area',
              x: '50%',
              max: 40,
              sort: 'ascending',
              data: [{
              value: <?php echo number_format($estatisticas_financeiro->total_receita_pendente - $estatisticas_financeiro->total_despesa_pendente, 2, '.', ''); ?>,
              name: 'Total a Entrar'
              }, {
              value: <?php echo number_format($estatisticas_financeiro->total_receita - $estatisticas_financeiro->total_despesa, 2, '.', ''); ?>,
              name: 'Total em caixa'
              }]
            }]
            });

          } 

          <?php if($os != null) {?>
            

          if ($('#oshome').length ){ 
            
            var echartPieCollapse = echarts.init(document.getElementById('oshome'));
            
            echartPieCollapse.setOption({
            tooltip: {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              x: 'center',
              y: 'bottom',
              data: ['Orçamento', 'Aberto','Faturado','Em andamento','Finalizado','Cancelado']
            },
            toolbox: {
              show: true,
              feature: {
              magicType: {
                show: true,
                type: ['pie', 'funnel']
              },
              restore: {
                show: true,
                title: "Restore"
              },
              saveAsImage: {
                show: true,
                title: "Save Image"
              }
              }
            },
            calculable: true,
            series: [{
              name: 'Ordem de serviços',
              type: 'pie',
              radius: [25, 90],
              center: ['50%', 170],
              roseType: 'area',
              x: '50%',
              max: 40,
              sort: 'ascending',
              data: [{
              <?php foreach ($os as $o) { ?>
              value: <?php echo $o->orcamento; ?>,
              <?php }?>
              name: 'Orçamento'
              }, {
              <?php foreach ($os as $o) { ?>
              value: <?php echo $o->aberto; ?>,
              <?php }?>
              name: 'Aberto'
              }, {
              <?php foreach ($os as $o) { ?>
              value: <?php echo $o->faturado; ?>,
              <?php }?>
              name: 'Faturado'
              }, {
              <?php foreach ($os as $o) { ?>
              value: <?php echo $o->andamento; ?>,
              <?php }?>
              name: 'Em andamento'
              }, {
              <?php foreach ($os as $o) { ?>
              value: <?php echo $o->finalizado; ?>,
              <?php }?>
              name: 'Finalizado'
              }, {
              <?php foreach ($os as $o) { ?>
              value: <?php echo $o->cancelado; ?>,
              <?php }?>
              name: 'Cancelado'
              }]
            }]
            });

          } 

        
          <?php } ?>
          
       </script>

       <?php } } ?>
        <script type="text/javascript">
		
		$('.textarea').wysihtml5()

          $(document).ready(function(){

            $("#formLogo").validate({
              rules:{
               userfile: {required:true}
             },
             messages:{
               userfile: {required: 'Campo Requerido.'}
             },

             errorClass: "help-inline",
             errorElement: "span",
             highlight:function(element, errorClass, validClass) {
              $(element).parents('.control-group').addClass('error');
              $(element).parents('.control-group').removeClass('success');
            },
            unhighlight: function(element, errorClass, validClass) {
              $(element).parents('.control-group').removeClass('error');
              $(element).parents('.control-group').addClass('success');
            }
          });


            $("#formCadastrar").validate({
              rules:{
               userfile: {required:true},
               nome: {required:true},
               cnpj: {required:true},
               ie: {required:true},
               logradouro: {required:true},
               numero: {required:true},
               bairro: {required:true},
               cidade: {required:true},
               uf: {required:true},
               telefone: {required:true},
               email: {required:true}
             },
             messages:{
               userfile: {required: 'Campo Requerido.'},
               nome: {required: 'Campo Requerido.'},
               cnpj: {required: 'Campo Requerido.'},
               ie: {required: 'Campo Requerido.'},
               logradouro: {required: 'Campo Requerido.'},
               numero: {required:'Campo Requerido.'},
               bairro: {required:'Campo Requerido.'},
               cidade: {required:'Campo Requerido.'},
               uf: {required:'Campo Requerido.'},
               telefone: {required:'Campo Requerido.'},
               email: {required:'Campo Requerido.'}
             },

             errorClass: "help-inline",
             errorElement: "span",
             highlight:function(element, errorClass, validClass) {
              $(element).parents('.control-group').addClass('error');
              $(element).parents('.control-group').removeClass('success');
            },
            unhighlight: function(element, errorClass, validClass) {
              $(element).parents('.control-group').removeClass('error');
              $(element).parents('.control-group').addClass('success');
            }
          });


            $("#formAlterar").validate({
              rules:{
               userfile: {required:true},
               nome: {required:true},
               cnpj: {required:true},
               ie: {required:true},
               logradouro: {required:true},
               numero: {required:true},
               bairro: {required:true},
               cidade: {required:true},
               uf: {required:true},
               telefone: {required:true},
               email: {required:true}
             },
             messages:{
               userfile: {required: 'Campo Requerido.'},
               nome: {required: 'Campo Requerido.'},
               cnpj: {required: 'Campo Requerido.'},
               ie: {required: 'Campo Requerido.'},
               logradouro: {required: 'Campo Requerido.'},
               numero: {required:'Campo Requerido.'},
               bairro: {required:'Campo Requerido.'},
               cidade: {required:'Campo Requerido.'},
               uf: {required:'Campo Requerido.'},
               telefone: {required:'Campo Requerido.'},
               email: {required:'Campo Requerido.'}
             },

             errorClass: "help-inline",
             errorElement: "span",
             highlight:function(element, errorClass, validClass) {
              $(element).parents('.control-group').addClass('error');
              $(element).parents('.control-group').removeClass('success');
            },
            unhighlight: function(element, errorClass, validClass) {
              $(element).parents('.control-group').removeClass('error');
              $(element).parents('.control-group').addClass('success');
            }
          });

          });

        </script> 
        <script type="text/javascript">
         $(document).ready(function(){

          $("#marcarTodos").change(function () {
              $("input:checkbox").prop('checked', $(this).prop("checked"));
          });  


          $("#formPermissao").validate({
           rules :{
            nome: {required: true}
          },
          messages:{
            nome: {required: 'Campo obrigatório'}
          }
        });     



        });
      </script> 
      <script src="<?php echo site_url(); ?>assets/js/jquery.maskMoney/jquery.maskMoney.js" type="text/javascript"></script> 
      <script type="text/javascript">
        $(".format_value").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'', decimal:'.', affixesStay: false});
      </script> 
      <script type="text/javascript">
        $(document).ready(function(){

          $(".money").maskMoney(); 
          $('#divRecebimento').hide();

          $('#recebido').click(function(event) {
            var flag = $(this).is(':checked');
            if(flag == true){
              $('#divRecebimento').show();
            }
            else{
              $('#divRecebimento').hide();
            }
          });

          $('#pagoEditar').click(function(event) {
            var flag = $(this).is(':checked');
            if(flag == true){
              $('#divPagamentoEditar').show();
            }
            else{
              $('#divPagamentoEditar').hide();
            }
          });

          $(document).on('click', '.editar', function(event) {
            $("#idEditar").val($(this).attr('idLancamento'));
            $("#descricaoEditar").val($(this).attr('descricao'));
            $("#fornecedorEditar").val($(this).attr('cliente'));
            $("#valorEditar").val($(this).attr('valor'));
            $("#vencimentoEditar").val($(this).attr('vencimento'));
            $("#pagamentoEditar").val($(this).attr('pagamento'));
            $("#formaPgtoEditar").val($(this).attr('formaPgto'));
            $("#tipoEditar").val($(this).attr('tipo'));
            $("#urlAtualEditar").val($(location).attr('href'));
            var baixado = $(this).attr('baixado');
            if(baixado == 1){
              $("#pagoEditar").attr('checked', true);
              $("#divPagamentoEditar").show();
            }
            else{
              $("#pagoEditar").attr('checked', false); 
              $("#divPagamentoEditar").hide();
            }
            

          });

          $(document).on('click', '#btnExcluirLancamento', function(event) {
              var idLancamento = $(this).attr('idAcao');
          
              $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>financeiro/excluirLancamento",
                data: "id="+idLancamento,
                dataType: 'json',
                success: function(data)
                {
                  if(data.result == true){
                      $("#btnCancelExcluir").trigger('click');
                      $("#divLancamentos").html('<div class="progress progress-striped active page-progress-bar"><div class="progress-bar" style="width: 100%""></div></div>');
                      $("#divLancamentos").load( $(location).attr('href')+" #divLancamentos" );
                      
                  }
                  else{
                      $("#btnCancelExcluir").trigger('click');
                      alert('Ocorreu um erro ao tentar excluir produto.');
                  }
                }
              });
              return false;
          });

          

          $(document).on('click', '#btn-faturar', function(event) {
           event.preventDefault();
           valor = $('#total-venda').val();
           total_servico = $('#total-servico').val();
           valor = valor.replace(',', '' );
           total_servico = total_servico.replace(',', '' );
           total_servico = parseFloat(total_servico); 
           valor = parseFloat(valor);
           $('#valor').val(valor + total_servico);
         });

          $("#formFaturar").validate({
            rules:{
             descricao: {required:true},
             cliente: {required:true},
             valor: {required:true},
             vencimento: {required:true}

           },
           messages:{
             descricao: {required: 'Campo Requerido.'},
             cliente: {required: 'Campo Requerido.'},
             valor: {required: 'Campo Requerido.'},
             vencimento: {required: 'Campo Requerido.'}
           },
           submitHandler: function( form ){       
            var dados = $( form ).serialize();
            $('#btn-cancelar-faturar').trigger('click');
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>os/faturar",
              data: dados,
              dataType: 'json',
              success: function(data)
              {
                if(data.result == true){
                  window.location.reload(true);
                }
                else{
                  alert('Ocorreu um erro ao tentar faturar OS.');
                  $('#progress-fatura').hide();
                }
              }
            });

            return false;
          }
        });

          $("#formFaturarVendas").validate({
            rules:{
             descricao: {required:true},
             cliente: {required:true},
             valor: {required:true},
             vencimento: {required:true}

           },
           messages:{
             descricao: {required: 'Campo Requerido.'},
             cliente: {required: 'Campo Requerido.'},
             valor: {required: 'Campo Requerido.'},
             vencimento: {required: 'Campo Requerido.'}
           },
           submitHandler: function( form ){       
            var dados = $( form ).serialize();
            $('#btn-cancelar-faturar').trigger('click');
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>vendas/faturar",
              data: dados,
              dataType: 'json',
              success: function(data)
              {
                if(data.result == true){
                  window.location.reload(true);
                }
                else{
                  alert('Ocorreu um erro ao tentar faturar OS.');
                  $('#progress-fatura').hide();
                }
              }
            });

            return false;
          }
        });

          $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteProduto",
            minLength: 2,
            select: function( event, ui ) {

             $("#idProduto").val(ui.item.id);
             $("#estoque").val(ui.item.estoque);
             $("#preco").val(ui.item.preco);
             $("#quantidade").focus();


           }
         });

          $("#servico").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

             $("#idServico").val(ui.item.id);
             $("#precoServico").val(ui.item.preco);


           }
         });


          $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

             $("#clientes_id").val(ui.item.id);


           }
         });

          $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteUsuario",
            minLength: 2,
            select: function( event, ui ) {

             $("#usuarios_id").val(ui.item.id);


           }
         });




          $("#formOs").validate({
            rules:{
             cliente: {required:true},
             tecnico: {required:true},
             dataInicial: {required:true}
           },
           messages:{
             cliente: {required: 'Campo Requerido.'},
             tecnico: {required: 'Campo Requerido.'},
             dataInicial: {required: 'Campo Requerido.'}
           },

           errorClass: "help-inline",
           errorElement: "span",
           highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
          },
          unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
          }
        });




          $("#formProdutosOs").validate({
            rules:{
             quantidade: {required:true}
           },
           messages:{
             quantidade: {required: 'Insira a quantidade'}
           },
           submitHandler: function( form ){
             var quantidade = parseInt($("#quantidade").val());
             var estoque = parseInt($("#estoque").val());
             if(estoque < quantidade){
              alert('Você não possui estoque suficiente.');
            }
            else{
             var dados = $( form ).serialize();
             $("#divProdutosOS").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");
             $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>os/adicionarProduto",
              data: dados,
              dataType: 'json',
              success: function(data)
              {
                if(data.result == true){
                  $( "#divProdutosOS" ).load("<?php echo current_url();?> #divProdutosOS" );
                  $("#quantidade").val('');
                  $("#produto").val('').focus();
                }
                else{
                  alert('Ocorreu um erro ao tentar adicionar produto.');
                }
              }
            });

             return false;
           }

         }

       });

          $("#formServicos").validate({
            rules:{
             servico: {required:true}
           },
           messages:{
             servico: {required: 'Insira um serviço'}
           },
           submitHandler: function( form ){       
             var dados = $( form ).serialize();

             $("#divServicos").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");
             $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>os/adicionarServico",
              data: dados,
              dataType: 'json',
              success: function(data)
              {
                if(data.result == true){
                  $( "#divServicos" ).load("<?php echo current_url();?> #divServicos" );
                  $("#servico").val('').focus();
                }
                else{
                  alert('Ocorreu um erro ao tentar adicionar serviço.');
                }
              }
            });

             return false;
           }

         });


          $("#formAnexos").validate({

            submitHandler: function( form ){       
                        //var dados = $( form ).serialize();
                        var dados = new FormData(form); 
                        $("#form-anexos").hide('1000');
                        $("#divAnexos").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");
                        $.ajax({
                          type: "POST",
                          url: "<?php echo base_url();?>os/anexar",
                          data: dados,
                          mimeType:"multipart/form-data",
                          contentType: false,
                          cache: false,
                          processData:false,
                          dataType: 'json',
                          success: function(data)
                          {
                            if(data.result == true){
                              $("#divAnexos" ).load("<?php echo current_url();?> #divAnexos" );
                              $("#userfile").val('');

                            }
                            else{
                              $("#divAnexos").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> '+data.mensagem+'</div>');      
                            }
                          },
                          error : function() {
                            $("#divAnexos").html('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> Ocorreu um erro. Verifique se você anexou o(s) arquivo(s).</div>');      
                          }

                        });

                        $("#form-anexos").show('1000');
                        return false;
                      }

                    });

          $(document).on('click', '#btnOsExcluirProduto', function(event) {
            var idProduto = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var produto = $(this).attr('prodAcao');
            if((idProduto % 1) == 0){
              $("#divProdutosOS").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");
              $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>os/excluirProduto",
                data: "idProduto="+idProduto+"&quantidade="+quantidade+"&produto="+produto,
                dataType: 'json',
                success: function(data)
                {
                  if(data.result == true){
                    $( "#divProdutosOS" ).load("<?php echo current_url();?> #divProdutosOS" );

                  }
                  else{
                    alert('Ocorreu um erro ao tentar excluir produto.');
                  }
                }
              });
              return false;
            }

          });



          $(document).on('click', 'span', function(event) {
            var idServico = $(this).attr('idAcao');
            if((idServico % 1) == 0){
              $("#divServicos").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");
              $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>os/excluirServico",
                data: "idServico="+idServico,
                dataType: 'json',
                success: function(data)
                {
                  if(data.result == true){
                    $("#divServicos").load("<?php echo current_url();?> #divServicos" );

                  }
                  else{
                    alert('Ocorreu um erro ao tentar excluir serviço.');
                  }
                }
              });
              return false;
            }

          });


          $(document).on('click', '.anexo', function(event) {
           event.preventDefault();
           var link = $(this).attr('link');
           var id = $(this).attr('imagem');
           var url = '<?php echo base_url(); ?>os/excluirAnexo/';
           $("#div-visualizar-anexo").html('<img src="'+link+'" alt="" class="img-responsive">');
           $("#excluir-anexo").attr('link', url+id);

           $("#download").attr('href', "<?php echo base_url(); ?>os/downloadanexo/"+id);

         });

          $(document).on('click', '#excluir-anexo', function(event) {
           event.preventDefault();

           var link = $(this).attr('link'); 
           $('#modal-anexo').modal('hide');
           $("#divAnexos").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");

           $.ajax({
            type: "POST",
            url: link,
            dataType: 'json',
            success: function(data)
            {
              if(data.result == true){
                $("#divAnexos" ).load("<?php echo current_url();?> #divAnexos" );
              }
              else{
                alert(data.mensagem);
              }
            }
          });
         });
        });

$("#formProdutosVendas").validate({
  rules:{
   quantidade: {required:true}
 },
 messages:{
   quantidade: {required: 'Insira a quantidade'}
 },
 submitHandler: function( form ){
   var quantidade = parseInt($("#quantidade").val());
   var estoque = parseInt($("#estoque").val());
   if(estoque < quantidade){
    alert('Você não possui estoque suficiente.');
  }
  else{
   var dados = $( form ).serialize();
   $("#divProdutosVendas").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");
   $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>vendas/adicionarProduto",
    data: dados,
    dataType: 'json',
    success: function(data)
    {
      if(data.result == true){
        $("#divProdutosVendas" ).load("<?php echo current_url();?> #divProdutosVendas" );
        $("#quantidade").val('');
        $("#produto").val('').focus();
      }
      else{
        alert('Ocorreu um erro ao tentar adicionar produto.');
      }
    }
  });

   return false;
 }

}

});

$("#formVendas").validate({
  rules:{
   cliente: {required:true},
   tecnico: {required:true},
   dataVenda: {required:true}
 },
 messages:{
   cliente: {required: 'Campo Requerido.'},
   tecnico: {required: 'Campo Requerido.'},
   dataVenda: {required: 'Campo Requerido.'}
 },

 errorClass: "help-inline",
 errorElement: "span",
 highlight:function(element, errorClass, validClass) {
  $(element).parents('.control-group').addClass('error');
},
unhighlight: function(element, errorClass, validClass) {
  $(element).parents('.control-group').removeClass('error');
  $(element).parents('.control-group').addClass('success');
}
});

$(document).on('click', '#btnExcluirProdutoVenda', function(event) {
  var idProduto = $(this).attr('idAcao');
  var quantidade = $(this).attr('quantAcao');
  var produto = $(this).attr('prodAcao');
  if((idProduto % 1) == 0){
    $("#divProdutosVendas").html("<div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%'></div></div>");
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>vendas/excluirProduto",
      data: "idProduto="+idProduto+"&quantidade="+quantidade+"&produto="+produto,
      dataType: 'json',
      success: function(data)
      {
        if(data.result == true){
          $( "#divProdutosVendas" ).load("<?php echo current_url();?> #divProdutosVendas" );

        }
        else{
          alert('Ocorreu um erro ao tentar excluir produto.');
        }
      }
    });
    return false;
  }

});

$(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

</script>

<!-- Editar Lançamentos -->
<script type="text/javascript">
  jQuery(document).ready(function($) {

    $('#pago').click(function(event) {
      var flag = $(this).is(':checked');
      if(flag == true){
        $('#divPagamento').show();
      }
      else{
        $('#divPagamento').hide();
      }
    });

  });

</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $("#clienteosrel").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clienteHide").val(ui.item.id);


            }
      });

      $("#tecnicoosrel").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteUsuario",
            minLength: 2,
            select: function( event, ui ) {

                 $("#responsavelHide").val(ui.item.id);


            }
      });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $("#clientevendas").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clienteidvendas").val(ui.item.id);


            }
      });

      $("#tecnicoosrel").autocomplete({
            source: "<?php echo base_url(); ?>os/autoCompleteUsuario",
            minLength: 2,
            select: function( event, ui ) {

                 $("#responsavelidvendas").val(ui.item.id);


            }
      });

    });
</script>
</body>
</html>