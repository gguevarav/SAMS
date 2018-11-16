<?php
$id=$_GET['g'];
$idgarantia=$_GET['d'];
$idfactura=$_GET['f'];
include "./class_lib/sesionSecurity.php";
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Garantias</title>
    <?php include "./class_lib/links.php"; ?>
    <meta http_equiv="Expires" content="0">
    <meta http_equiv="Last-Modified" content="0">
    <meta http_equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http_equiv="Pragma" content="no-cache">
  </head>
  <body onload="resumen();pone_foco_ini();" >

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
        include('class_lib/class_conecta_mysql.php');
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Garantias.
              <small></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
         <div class="col-md-12">
         <div class="box box-warning">
         <div class="box-header with-border">
         <h3 class="box-title">Creacion de Reclamo</h3>
         </div>
         <div class="box-body">
         <form class="form-horizontal">
         <div class="form-group">

                    <div class="col-sm-3">
                    <input type="hidden" class="form-control" id='idfactura' value="<?php echo $idfactura;?>" >
                    </div>
                    </div>

                    <div class='form-group'>
                    <div class="col-sm-3">
                    <input type="hidden" class="form-control" id='idgarantia' value="<?php echo $idgarantia;?>" >
                    </div>
                    </div>

                    <div class='form-group'>
                    <label for="codigostock" class="col-sm-2 control-label">Detalles de la Reparacion:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id='detalles' placeholder='Detalles de la reclamacion...'>
                    </div>
                    </div>

                    <div class="form-group">
                                <label for="codigo" class="col-sm-2 control-label">Estado:</label>
                                <div class="col-sm-4">
                                <div>
                                  <select name="rol" id="estado" class="form-control" required>
                                    <option value="2" selected>Cerrado</option>
                                  </select>
                                </div>
                                </div>
                                </div>

         </form>
         </div>
         <div class="box-footer">
         <button type="button" class="btn btn-danger pull-right" onclick="actualiza_reclamacion(<?php echo $id;?>);" id="btn-reg-usr">Guardar Cambios</button>
         </div>
         </div>
         </div>

         <div class="col-md-12">
         <div id="garantis_registradas"></div>
         </div>
         </div>
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->


         <div id='impresion_de_ticket' class='print'></div>
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
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="dist/js/source_parameters.js"></script>
    <script src="dist/js/source_point_sales.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/printPage/jquery.printPage.js"></script>
    <script>
      $(document).ready(function(){
        $(".cantidades").inputmask();
      });
    </script>
  </body>
</html>
