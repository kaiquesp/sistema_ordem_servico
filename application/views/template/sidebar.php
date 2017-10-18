<?php 
$session = $this->session->userdata();
$nome = $session['nome'];
$foto = $session['foto'];
?>

<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="<?php echo site_url().'assets/foto/'.$foto;?>" alt="foto" class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Bem vindo,</span>
    <h2><?php echo $nome; ?></h2>
  </div>
</div>

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
    <li><a href="<?php echo base_url("home"); ?>"><i class="fa fa-home"></i> Home</a></li>
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){ ?>
        <li><a href="<?php echo base_url("clientes"); ?>"><i class="fa fa-users"></i> Clientes</a></li>
      <?php } ?>
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){ ?>
       <li><a href="<?php echo base_url("produtos"); ?>"><i class="fa fa-barcode"></i> Produtos</a></li>
      <?php } ?>
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vServico')){ ?>
       <li><a href="<?php echo base_url("servicos"); ?>"><i class="fa fa-wrench"></i> Serviços</a></li>
      <?php } ?>
      <!-- <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="cadastrocliente"><i class="fa fa-plus"></i> Cadastro</a></li>
          <li><a href="consultacliente"><i class="fa fa-search"></i> Consulta</a></li>
          <li><a href="listacliente"><i class="fa fa-list-alt"></i> Listar</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-shopping-cart"></i> Produtos <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="cadastraproduto"><i class="fa fa-plus"></i> Cadastro</a></li>
          <li><a href="consultaproduto"><i class="fa fa-search"></i> Consulta</a></li>
          <li><a href="listaproduto"><i class="fa fa-list-alt"></i> Listar</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-check-square-o"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="novopedido"><i class="fa fa-plus"></i> Novo Pedido</a></li>
          <li><a href="alterarpedido"><i class="fa fa-search"></i> Alterar Pedidos</a></li>
          <li><a href="consultarpedido"><i class="fa fa-list-alt"></i> Consultar Pedidos</a></li>
          <li><a href="emissaopedido"><i class="fa fa-list-alt"></i> Emissão de Pedidos</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-area-chart"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="relatorioclientes"><i class="fa fa-plus"></i> Clientes</a></li>
          <li><a href="relatorioprodutos"><i class="fa fa-search"></i> Produtos</a></li>
          <li><a href="relatoriopedidos"><i class="fa fa-list-alt"></i> Pedidos</a></li>
        </ul>
      </li>
      <li><a href="agenda"><i class="fa fa-calendar"></i> Agenda</a></li>
      <li><a href="requisicaoajax"><i class="fa fa-circle-o"></i> Requisição Jquery/Ajax</a></li> -->
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')  || $this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente') || $this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao') || $this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){ ?>
      <li><a><i class="fa fa-cogs"></i> Configurações <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
            <li><a href="<?php echo base_url("usuarios"); ?>"><i class="fa fa-user"></i> Usuários</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
            <li><a href="<?php echo base_url("permissoes"); ?>"><i class="fa fa-user"></i> Permissoes</a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
    </ul>
  </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Sair" href="<?php echo base_url("home/sair"); ?>">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
</div>
</div>