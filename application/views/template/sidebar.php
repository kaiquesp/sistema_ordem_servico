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
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){ ?>
       <li><a href="<?php echo base_url("os"); ?>"><i class="fa fa-tags"></i> Ordem de serviço</a></li>
      <?php } ?>
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){ ?>
       <li><a href="<?php echo base_url("vendas"); ?>"><i class="fa fa-shopping-cart"></i> Vendas</a></li>
      <?php } ?>
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vArquivo')){ ?>
       <li><a href="<?php echo base_url("arquivos"); ?>"><i class="fa fa-shopping-cart"></i> Arquivos</a></li>
      <?php } ?>
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vLancamento')){ ?>
          <li><a><i class="fa fa-money"></i> Financeiro <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
                <li><a href="<?php echo base_url("financeiro/lancamentos"); ?>"><i class="fa fa-arrows-v"></i> Lancamentos</a></li>
              <?php } ?>
            </ul>
          </li>
      <?php } ?>  
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')  || $this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente') || $this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao') || $this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){ ?>
      <li><a><i class="fa fa-list-alt"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
            <li><a href="<?php echo base_url("relatorios/clientes"); ?>"><i class="fa fa-users"></i> Clientes</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
            <li><a href="<?php echo base_url("relatorios/produtos"); ?>"><i class="fa fa-barcode"></i> Produtos</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
            <li><a href="<?php echo base_url("relatorios/servicos"); ?>"><i class="fa fa-wrench"></i> Serviços</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
            <li><a href="<?php echo base_url("relatorios/os"); ?>"><i class="fa fa-tags"></i> Ordens de Serviço</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
            <li><a href="<?php echo base_url("relatorios/vendas"); ?>"><i class="fa fa-shopping-cart"></i> Vendas</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
            <li><a href="<?php echo base_url("relatorios/financeiro"); ?>"><i class="fa fa-money"></i> Financeiro</a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>  
      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')  || $this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente') || $this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao') || $this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){ ?>
      <li><a><i class="fa fa-cogs"></i> Configurações <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
            <li><a href="<?php echo base_url("usuarios"); ?>"><i class="fa fa-user"></i> Usuários</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
            <li><a href="<?php echo base_url("home/emitente"); ?>"><i class="fa fa-male"></i> Emitente</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
            <li><a href="<?php echo base_url("permissoes"); ?>"><i class="fa fa-lock"></i> Permissoes</a></li>
          <?php } ?>
          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){ ?>
                <li><a href="<?php echo base_url("home/backup"); ?>"><i class="fa fa-download"></i> Backup</a></li>
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