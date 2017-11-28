<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Cadastro de clientes</h3>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
            <?php if ($this->session->flashdata('error') == TRUE): ?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
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
            <form action="adicionar" id="formCliente" method="post" class="form-horizontal form-label-left" >
          </p>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tipocliente">Tipo de Cliente <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
             <p>
               <input type="radio" name="tipoCliente" id="radio4" onClick="habilitacao()" value="Pessoa Física" checked>Pessoa Física
               <input type="radio" name="tipoCliente"  id="radio5" onClick="habilitacao()" value="Pessoa Jurídica">Pessoa Jurídica 
             </p>
      
           </div>
         </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nomecompleto">Nome Completo <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="nomeCliente" name="nomeCliente" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Informe o nome fantasia do cliente" required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nomefantasia">Nome Fantasia <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="nomefantasia" name="nomefantasia" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Informe o nome fantasia do cliente" required="required" type="text" disabled="">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="razaosocial">Razão Social <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="razaosocial" name="razaosocial" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Informe a Razão Social" type="text" disabled="">
            </div>
          </div>
         <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="cnpj">CNPJ <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="cnpj" name="cnpj" class="form-control col-md-7 col-xs-12" placeholder="Informe o CNPJ" required="required" type="text" disabled="" data-inputmask="'mask' : '**.***.***/****-**'">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="cpf">CPF <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" id="cpf" name="cpf" required="required" class="form-control col-md-7 col-xs-12" placeholder="Informe o CPF" data-inputmask="'mask' : '***.***.***-**'">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="telefonecomercial">Telefone Comercial <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="telefone" name="telefone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o Telefone Comercial" type="text" data-inputmask="'mask' : '(99) 9999-9999'">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="celular">Telefone Celular <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="celular" name="celular" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o Telefone Celular" type="text" data-inputmask="'mask' : '(99) 99999-9999'">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">E-mail <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="email" name="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o E-mail" type="email">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="cep">CEP <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="cep" name="cep" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o CEP" required="required" type="text" data-inputmask="'mask' : '99999-999'">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="endereco">Endereço Completo <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-12 col-xs-12">
            <input id="endereco" name="endereco" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o Endereço" required="required" type="text">
          </div>
          <label class="control-label col-md-1 col-sm-1 col-xs-12" for="numero">Número <span class="required">*</span>
          </label>
          <div class="col-md-1 col-sm-12 col-xs-12">
            <input id="numero" name="numero" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="numero" required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="complemento">Complemento <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="complemento" name="complemento" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o Complemento" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="bairro">Bairro <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="bairro" name="bairro" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o Bairro" required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="cidade">Cidade <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="cidade" name="cidade" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe a Cidade" required="required" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12">Estado</label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <select class="select2_single form-control" name="estado" id="estado">
              <option>Selecione o estado</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="veiculo">Veículo <span class="required">*</span>
          </label>
          <div class="col-md-2 col-sm-12 col-xs-12">
            <input id="veiculo" name="veiculo" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Ex. Sandero" required="required" type="text">
          </div>
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="placa">Placa do carro <span class="required">*</span>
          </label>
          <div class="col-md-2 col-sm-12 col-xs-12">
            <input id="placa" name="placa" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Ex. ABC-1234" required="required" type="text" data-inputmask="'mask' : '***-****'">
          </div>
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="km">Kilometragem <span class="required">*</span>
          </label>
          <div class="col-md-2 col-sm-12 col-xs-12">
            <input id="km" name="km" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Ex. 999" required="required" type="text">
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-2">
            <a href="<?php echo base_url('clientes'); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
            <button id="send" type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar Cliente</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" >

  $(document).ready(function() {

    function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
              }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                          if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                              }
                            });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                      }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                  }
                });
          });

        </script>

        <script language="javascript">
          function habilitacao(){
            if(document.getElementById('radio4').checked == true){
              document.getElementById('cnpj').disabled = true;
              document.getElementById('nomefantasia').disabled = true;
              document.getElementById('razaosocial').disabled = true;
              document.getElementById('cpf').disabled = false;
            }
            if(document.getElementById('radio4').checked == false){
              document.getElementById('cnpj').disabled = false;
              document.getElementById('nomefantasia').disabled = false;
              document.getElementById('razaosocial').disabled = false;
              document.getElementById('cpf').disabled = true;
            }
          }
        </script>

        