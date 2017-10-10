<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Mine - Área do Cliente</title>
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

            <div class="row-fluid" style="margin-top:0">
                <div class="span6 offset3">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-user"></i>
                            </span>
                            <h5>Cadastre-se no sistema</h5>
                        </div>
                        <div class="widget-content nopadding">
                           
                            <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal" >
                                <div class="control-group">
                                    <label for="nomeCliente" class="control-label">Nome<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo set_value('nomeCliente'); ?>"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="documento" class="control-label">CPF<span class="required">*</span></label>
                                     <div class="controls">                                        
                                     <input id="documento" type="text" name="documento" value="<?php echo set_value('documento'); ?>"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="telefone" class="control-label">Telefone<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="telefone" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="celular" class="control-label">Celular</label>
                                    <div class="controls">
                                        <input id="celular" type="text" name="celular" value="<?php echo set_value('celular'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="email" class="control-label">Email<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group" class="control-label">
                                    <label for="rua" class="control-label">Rua<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="numero" class="control-label">Número<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="numero" type="text" name="numero" value="<?php echo set_value('numero'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group" class="control-label">
                                    <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="bairro" type="text" name="bairro" value="<?php echo set_value('bairro'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group" class="control-label">
                                    <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="cidade" type="text" name="cidade" value="<?php echo set_value('cidade'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group" class="control-label">
                                    <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="estado" type="text" name="estado" value="<?php echo set_value('estado'); ?>"  />
                                    </div>
                                </div>

                                <div class="control-group" class="control-label">
                                    <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>"  />
                                    </div>
                                </div>



                                <div class="form-actions">
                                    <div class="span12">
                                        <div class="span6 offset3">
                                            <button type="submit" class="btn btn-success btn-large"><i class="icon-plus icon-white"></i> Cadastrar</button>
                                            <a href="<?php echo base_url() ?>index.php/mine" id="" class="btn btn-large"><i class="icon-lock"></i> Acessar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
            <script type="text/javascript">
                  $(document).ready(function(){
                       $('#formCliente').validate({
                        rules :{
                              nomeCliente:{ required: true},
                              documento:{ required: true},
                              telefone:{ required: true},
                              email:{ required: true},
                              rua:{ required: true},
                              numero:{ required: true},
                              bairro:{ required: true},
                              cidade:{ required: true},
                              estado:{ required: true},
                              cep:{ required: true}
                        },
                        messages:{

                              nomeCliente :{ required: 'Campo Requerido.'},
                              documento :{ required: 'Campo Requerido.'},
                              telefone:{ required: 'Campo Requerido.'},
                              email:{ required: 'Campo Requerido.'},
                              rua:{ required: 'Campo Requerido.'},
                              numero:{ required: 'Campo Requerido.'},
                              bairro:{ required: 'Campo Requerido.'},
                              cidade:{ required: 'Campo Requerido.'},
                              estado:{ required: 'Campo Requerido.'},
                              cep:{ required: 'Campo Requerido.'}

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
                  });
            </script>

    
    <!--Footer-part-->
    <div class="row-fluid">
      <div id="footer" class="span12"> <?= date('Y') ?> &copy; MapOS</div>
    </div>

    <!-- javascript
    ================================================== -->

    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 


  </body>
</html>