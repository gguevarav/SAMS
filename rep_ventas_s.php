<?php include "./class_lib/sesionSecurity.php"; ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Reportes|Rep. de Ventas</title>
    <?php include "./class_lib/links.php"; ?>
    <link rel="icon" type="image/jpg" href="dist/img/moto.jpg" />
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="plugins/printarea/jquery.printarea.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  </head>
  <body onload="">

    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('class_lib/nav_header.php');
        ?>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include('class_lib/sidebar.php');


        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Reportes Ventas
            <small>>> por lineas o general.</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class='row'>
          <div class='col-md-3'>
          <div class='box box-primary'>
          <div class='box-header with-border'>
          <h3 class='box-title'>Ingresa las fechas</h3>
          </div>
          <div class='box-body'>
            <div class="form-group">
                    <label>Fechas:</label>
                    <div class="input-group">
                      <button class="btn btn-default pull-left" id="daterange-btn">
                        <i class="fa fa-calendar"></i> Click para seleccionar.
                        <i class="fa fa-caret-down"></i>
                      </button>
                    </div>
                    <span class='fe'></span>
                    <input type='hidden'  class='form-control' id='fi' value=''>
                    <input type="hidden"  class='form-control' id='ff' value=''>
            </div><!-- /.form group -->
          </div>

          </div>
          </div>

          <div class="col-md-4">
          <div class="box box-primary">
          <div class="box-header with-border">
          <h4 class="box-title">caja.</h4>
           </div>
           <div class="box-body">
           <form class="form-horizontal">
           <div class="form-group">
           <label for="numero_caja" class="col-sm-5 control-label">Caja 1:</label>
             <div class="col-sm-6">
                <select type="hidden" class="form-control select2" id="numero_caja" >

                <option value="1" selected>Caja 1</option>
                </select>
             </div>
           </div>
           </form>
           </div>
           <div class="box-footer">
           <button class="btn btn-primary pull-right" onclick="pone_opcion2();" id="btn-sig"><i class='fa fa-mail-forward'></i> Siguiente</button>
          </div>
          </div>
          </div>

          <div class='col-md-4'>
          <div id='opcion'></div>
          </div>
          </div>

        <div class='row'>

        <div class='col-md-12'>
        <div id='data'>
        </div>
        </div>
        </div>
        </section><!-- /.content -->

        <div class="modal fade" id ="modal_detalle_venta" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title nuticket"></h4>
          </div>
          <div class="modal-body">
            <div id='detalle_de_venta'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

         </div><!-- /.content-wrapper -->


      <!-- Main Footer -->
      <?php
      include('class_lib/main_fotter.php');
      ?>



      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="plugins/select2/select2.full.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/printarea/jquery.printarea.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
     <script src="plugins/iCheck/icheck.min.js"></script>
     <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_report.js"></script>
    <script>
    $(document).ready(function() {
       $("#numero_caja").select2();
    })
    </script>
  </body>
</html>
