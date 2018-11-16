<section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">

            <div class="pull-left image">
              <img src="dist/img/imagen.jpg" class="img-circle" title= "Logo MotoSport">
            </div>

            <div class="pull-left info">
              <p><?php echo $_SESSION['nombre_de_usuario'] ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div>


          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
              <a href="#"><i class="fa fa-money"></i> <span>Ventas</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="punto_venta.php"><i class="fa fa-object-group"></i> Punto de Venta.</a></li>
                <li><a href="cancel_venta.php"><i class="fa fa-times"></i> Cancelacion de Ventas.</a></li>
                <li><a href="util_garantias.php"><i class="fa fa-archive"></i> Garantias.</a></li>
                <li><a href="cartera_clientes.php"><i class="fa fa-user"></i> Consulta y Abonos.</a></li>
                <?php if ($_SESSION['rol']==1): ?>
                <?php endif; ?>

              </ul>
            </li>
            <?php if ($_SESSION['rol']==1): ?>
              <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Clientes.</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="abc_clients.php"><i class="fa fa-male"></i> Gestion Clientes.</a></li>

                </ul>
              </li>
            <?php endif; ?>

            <?php if ($_SESSION['rol']==1): ?>
              <li class="treeview">
                <a href="#"><i class="fa fa-server"></i> <span> Almacen </span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="abc_articulos.php"><i class="fa fa-cubes"></i> Articulos.</a></li>
                  <li><a href="abc_lineas.php"><i class="fa fa-bars"></i> Lineas.</a></li>
                  <li><a href="entrada_compra.php"><i class="fa fa-download"></i> Entradas.</a></li>
                  <li><a href="valida_cambio.php?opt=1265780909"><i class="fa fa-sort-numeric-asc"></i>  Inventario.</a></li>

                </ul>
              </li>
            <?php endif; ?>

            <?php if ($_SESSION['rol']==1): ?>
              <li class="treeview">
                <a href="#"><i class="fa fa-truck"></i> <span> Proveedores.</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="abc_provs.php"><i class="fa fa-truck"></i> Gestion Proveedores.</a></li>
                </ul>
              </li>
            <?php endif; ?>

            <?php if ($_SESSION['rol']==1): ?>
              <li class="treeview">
                <a href="#"><i class="fa fa-edit"></i> <span>Reportes.</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <!--<li><a href="#"><i class="fa fa-newspaper-o"></i> Corte de Cajas.</a></li>-->
                  <li><a href="rev_entrada.php"><i class="fa fa-file-text"></i> Reporte de Existencias.</a></li>
                  <li><a href="rep_ventas.php"><i class="fa fa-list-alt"></i> Reporte de Ventas.</a></li>

                </ul>
              </li>
            <?php endif; ?>



            <?php if ($_SESSION['rol']==1): ?>
              <li class="treeview">
                <a href="#"><i class="	fa fa-motorcycle"></i> <span>Herramientas.</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                <!--  ***************<li><a href="valida_cambio.php?opt=5829637"><i class="fa fa-folder-open"></i> Respaldo de BD.</a></li>-->
                  <li><a href="util_usr.php"><i class="fa fa-user"></i> Gestion de Usuarios.</a></li>


                </ul>
              </li>
            <?php endif; ?>


          </ul><!-- /.sidebar-menu -->
        </section>
