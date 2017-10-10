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

    <title>Sistema JapaCar </title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/css/font-awesome/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/css/iCheck/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../assets/css/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../assets/css/jqvmap/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assets/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../assets/css/datatables.net-bs/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/datatables.net-buttons-bs/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/datatables.net-fixedheader-bs/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/datatables.net-responsive-bs/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/datatables.net-scroller-bs/scroller.bootstrap.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
      <div class="main_container">
          <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="dashboard" class="site_title"><i class="fa fa-paw"></i> <span>Sistema JapaCar</span></a>
              </div>

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
        <script src="../assets/js/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../assets/js/fastclick/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../assets/js/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="../assets/js/Chart.js/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="../assets/js/gauge.js/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../assets/js/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../assets/js/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="../assets/js/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="../assets/js/Flot/jquery.flot.js"></script>
        <script src="../assets/js/Flot/jquery.flot.pie.js"></script>
        <script src="../assets/js/Flot/jquery.flot.time.js"></script>
        <script src="../assets/js/Flot/jquery.flot.stack.js"></script>
        <script src="../assets/js/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="../assets/js/flot.orderbars/jquery.flot.orderBars.js"></script>
        <script src="../assets/js/flot-spline/jquery.flot.spline.min.js"></script>
        <script src="../assets/js/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="../assets/js/DateJS/date.js"></script>
        <!-- JQVMap -->
        <script src="../assets/js/jqvmap/jquery.vmap.js"></script>
        <script src="../assets/js/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="../assets/js/jqvmap/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../assets/js/moment/moment.min.js"></script>
        <script src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../assets/js/custom.min.js"></script>

        <!-- Datatables -->
        <script src="../assets/js/datatables.net/jquery.dataTables.min.js"></script>
        <script src="../assets/js/datatables.net-bs/dataTables.bootstrap.min.js"></script>
        <script src="../assets/js/datatables.net-buttons/dataTables.buttons.min.js"></script>
        <script src="../assets/js/datatables.net-buttons-bs/buttons.bootstrap.min.js"></script>
        <script src="../assets/js/datatables.net-buttons/buttons.flash.min.js"></script>
        <script src="../assets/js/datatables.net-buttons/buttons.html5.min.js"></script>
        <script src="../assets/js/datatables.net-buttons/buttons.print.min.js"></script>
        <script src="../assets/js/datatables.net-fixedheader/dataTables.fixedHeader.min.js"></script>
        <script src="../assets/js/datatables.net-keytable/dataTables.keyTable.min.js"></script>
        <script src="../assets/js/datatables.net-responsive/dataTables.responsive.min.js"></script>
        <script src="../assets/js/datatables.net-responsive-bs/responsive.bootstrap.js"></script>
        <script src="../assets/js/datatables.net-scroller/dataTables.scroller.min.js"></script>
        <script src="../assets/js/jszip/jszip.min.js"></script>
        <script src="../assets/js/pdfmake/pdfmake.min.js"></script>
        <script src="../assets/js/pdfmake/vfs_fonts.js"></script>
        <!-- jquery.inputmask -->
        <script src="../assets/js/jquery.inputmask/jquery.inputmask.bundle.min.js"></script>
    </body>
    </html>