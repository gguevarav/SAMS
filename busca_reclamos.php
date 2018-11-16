<?php
session_start();
if($_SESSION['autorizado']<>1){
header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');

$db= new ConexionMySQL();

$factura = "";
 if(test_input($_POST['factura'])){
  $factura=test_input($_POST['factura']);
  $consulta="select * from reclamogarantia where idfactura = '$factura'";
  $consulta3="select * from reclamogarantia where idfactura = '$factura' AND estado = 2";
  $consulta2="select * from reclamogarantia where idfactura = '$factura' AND estado = 1";
  $exe=$db->consulta($consulta);
  $exe2=$db->consulta($consulta2);
  $exe3=$db->consulta($consulta3);
  $abiertos=$db->numero_de_registros($exe2);
  $cerrados=$db->numero_de_registros($exe3);
  if($db->numero_de_registros($exe)>0){
    echo "<div class='box box-primary'>";
    echo "<div class='box-header'>";
    echo "<h3 class='box-title'>Reclamos</h3>";
    echo "</div>";
    echo "<div class='box-body'>";
   echo "<table id='tabla_garantias' class='table table-hover table-condensed'>";
   echo "<tr>";
   echo "<th style='text-align: center;'>Numero Factura</th>";
   echo "<th style='text-align: center;'>Numero de Garantia</th>";
    echo "<th style='text-align: center;'>Descripcion</th>";
    echo "<th style='text-align: center;'>Estado</th>";
    echo "<th style='text-align: center;'>Detalles del Reclamo</th>";
    echo "<th style='text-align: center;'></th>";
    echo "<th style='text-align: center;'></th>";
   echo "</tr>";
   while($e=$db->buscar_array($exe)){
     $fecha_actual=strtotime(date("d-m-Y ",time()));
     $fecha_entrada=strtotime($e['fechavence']);
     if ($e['estado']=='1') {
       $estado="Abierto";
     } else {
       $estado="Cerrado";
     }

     echo "<tr>";
     echo "<td style='text-align: center;'>".strtoupper($e['idfactura'])."</td>";
     echo "<td style='text-align: center;'>".strtoupper($e['idgarantia'])."</td>";
     echo "<td style='text-align: center;'>".strtoupper($e['descripcion'])."</td>";
     echo "<td style='text-align: center;'>".strtoupper($estado)."</td>";
     echo "<td style='text-align: center;'>".strtoupper($e['detalles'])."</td>";

  echo "<td style='text-align: center;'><a href='util_editar_reclamo.php?g=".$e['id']."&d=".$e['idgarantia']."&f=".$e['idfactura']."' class='btn btn-danger'>Editar Reclamo</a></td>";


  echo "<td style='text-align: center;'><button type='button' class='btn btn-danger pull-right' onclick='elimina_reclamo(".$e['id'].",".strtoupper($e['idfactura']).");' id='btn-reg-usr'>Elimina Reclamo</button></td>";




     echo "</tr>";
   }
   echo "</table>";
   echo "</div>";
   echo "</div>";

  }else{
   echo "<b>Actualmente no hay garantias registrados</b>";
  }
  }




?>
