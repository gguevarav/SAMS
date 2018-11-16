<?php include "./class_lib/sesionSecurity.php"; ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Punto de Venta</title>
    <?php include "./class_lib/links.php"; ?>
    <link rel="icon" type="image/jpg" href="dist/img/moto.jpg" />
    <meta http_equiv="Expires" content="0">
    <meta http_equiv="Last-Modified" content="0">
    <meta http_equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http_equiv="Pragma" content="no-cache">
  </head>
  <body onload="pone_num_venta();resumen();pone_foco_ini();">

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
      <input type='hidden' id='ncaja' value='1'>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Punto de Venta | Cajero: <?php echo $_SESSION['nombre_de_usuario']; ?> | Caja: 1

          </h1>
          </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class='row'>
          <div class='col-md-4'>
          <div class='box box-primary'>
          <div class='box-header with-border'><h3 class='box-title'>Ingresa el Codigo del Articulo:</h3></div>
          <div class='box-body'>
          <div class='input-group'>
          <div class='input-group-btn'>
          <button type='button' class='btn btn-success' onclick='busqueda_art();'><i class='fa fa-search'></i></button>
          </div>
          <input type='text' id='codigo' class='form-control' placeholder='Codigo...' onchange='busca_articulo();' style="font-size:20px; text-align:center; color:blue; font-weight: bold;">

          </div>
          <br>
          <div class='input-group'>
          <span class='input-group-addon bg-red'>Precio:</span>
          <input type='text' id='preciou' class='form-control cantidades'  style="font-size:20px; text-align:center; color:blue; font-weight: bold;"
          data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" disabled>
          </div>
          <br>
          <div class='input-group'>
          <span class='input-group-addon bg-blue'>Periodo de Garantia:</span>
          <input type='text' id='periodogarantia' class='form-control' style="font-size:20px; text-align:center; color:red; font-weight: bold;">
          </div>
          <br>
          <div class='input-group'>
          <span class='input-group-addon bg-orange'>Cantidad:</span>
          <input type='text' id='cantidad' class='form-control cantidades' style="font-size:20px; text-align:center; color:blue; font-weight: bold;"
          data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" disabled>
          </div>
          <br>
          <button class='btn btn-success btn-lg' id='btn-add' onclick='agrega_a_lista();'><i class=''></i> Agregar</button>
          <button class='btn btn-success btn-lg' id='btn-cancel' onclick='cancela_codigo();'><i class=''></i> Cancelar</button>
          </div>

          </div>
          </div>

          <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"></h3>
                  <h5 class="widget-user-desc"></h5>
                </div>
                <div class="widget-user-image">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header preciol">0.00</h5>
                        <span class="description-text">PRECIO UNIDAD</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->

                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header exis">0.00</h5>
                        <span class="description-text">EXISTENCIA.</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->

          <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><div id='totales'></div></h3>
                  <p>Total</p>
                </div>
                <a href="#" class="small-box-footer">
                  <div id='total_articulos'></div>
                </a>
                <a href="#" class="small-box-footer">
                  <div id='tipo_de_venta'>Venta</div>
                </a>
              </div>
              <div class='btn-group'>
              <button class='btn  btn-success'id='btn-procesa' onclick='prepara_venta();'> Pagar</button>
              <button class='btn  btn-warning' id='btn-cancela' onclick="cancela_venta();"></i> Cancelar</button>
              <button class='btn  btn-primary' onclick="busca_cliente();" id='btn_cre'> Cliente</button>
              </div>
            </div><!-- ./col -->


          </div>

          <div class='row'>
          <div class='col-md-12'>
          <div class='box box-primary'>
          <div class='box-header'>
          <h3 class='box-title'>Lista de Articulos</h3>
          </div>
          <div class='box-body table-responsive'>
          <table id='tabla_articulos' class='table table-hover'>
           <thead>
           <tr>
           <th class='center'>Codigo</th><th class='center'>Periodo de Garantia</th><th class='center'>Descripcion</th><th class='center'>Cantidad</th><th class='center'>Precio U.</th><th class='center'>Monto</th><th class='center'>Operacion</th>
           </tr>
           </thead>
           <tbody>

           </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>
        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->


           <div class="modal fade" id ="modal_tabla_clientes" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Selecciona el Cliente:</h4>
          </div>
          <div class="modal-body">
            <div id='lista_clientes'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id ="modal_prepara_venta" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">RESUMEN</h4>
          </div>
          <div class="modal-body">

          <div class='input-group input-group-lg'>
          <span class='input-group-addon bg-blue'><b>Total de la Venta:</b></span>
          <input type='text' id='total_de_venta' class='form-control' style="font-size:30px; text-align:center; color:red; font-weight: bold;" disabled>
          </div>
          <br>
          <div class='input-group input-group-lg'>
          <span class='input-group-addon bg-blue'><b>Su Pago:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
          <input type='text' id='paga_con' class='form-control cantidades' style="font-size:30px; text-align:center; color:red; font-weight: bold;" onkeyup="calcula_cambio();"
          data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
          </div>
          <br>
          <div class='input-group input-group-lg'>
          <span class='input-group-addon bg-blue'><b>Cambio:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
          <input type='text' id='el_cambio' class='form-control' style="font-size:30px; text-align:center; color:red; font-weight: bold;" disabled>
          </div>


          </div>
          <div class="modal-footer">
              <button class='btn btn-success btn-lg print_ticket' id='btn-termina' onclick='' disabled><i class='fa fa-print'></i> Ticket</button>
              <button class='btn btn-success btn-lg' id='btn-termina' onclick='procesa_venta();'><i class='fa fa-shopping-cart'></i> Procesar</button>
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class=''></i> Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id ="modal_busqueda_arts" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Busqueda de Articulos:</h4>
          </div>
          <div class="modal-body">
          <div class='input-group'>
          <span class='input-group-addon bg-blue'><b>Articulo:</b></span>
          <input type='text' id='articulo_buscar' class='form-control' onkeyup="busca();" placeholder='Descripcion del articulo...'>
          </div>
          <br>
            <div id='lista_articulos'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

      <input type='hidden' id='idcliente_credito' value="">
      <input type='hidden' id='total_venta' value="">

      <div id='impresion_de_ticket' class='print'></div>
      <!-- Main Footer -->
      <?php
      include('./class_lib/main_fotter.php');
      ?>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="dist/js/source_point_sales.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/printPage/jquery.printPage.js"></script>
    <script>
      $(document).ready(function(){
        $(".cantidades").inputmask();
      });
    </script>
    <script type="text/javascript">
       $(window).bind('beforeunload', function(){
         return 'Deseas salir del Punto de Venta...?';
        });
    </script>
  </body>
</html>
