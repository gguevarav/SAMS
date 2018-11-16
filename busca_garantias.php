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
  $consulta="select * from garantias where idfactura = '$factura'";
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
    echo "<h3 class='box-title'>Garantias</h3>";
    echo "</div>";
    echo "<div class='box-body'>";
   echo "<table id='tabla_garantias' class='table table-hover table-condensed'>";
   echo "<tr>";
   echo "<th style='text-align: center;'>Numero Factura</th>";
   echo "<th style='text-align: center;'>Fecha de Copra</th>";
    echo "<th style='text-align: center;'>Vencimiento de Garantia</th>";
    echo "<th style='text-align: center;'>Reclamos Abiertos</th>";
    echo "<th style='text-align: center;'>Reclamos Cerrados</th>";
    echo "<th style='text-align: center;'></th>";
    echo "<th style='text-align: center;'></th>";
   echo "</tr>";
   while($e=$db->buscar_array($exe)){
     $fecha_actual=strtotime(date("d-m-Y ",time()));
     $fecha_entrada=strtotime($e['fechavence']);
     echo "<tr>";
     echo "<td style='text-align: center;'>".strtoupper($e['idfactura'])."</td>";
     echo "<td style='text-align: center;'>".strtoupper($e['fechacompra'])."</td>";
     echo "<td style='text-align: center;'>".strtoupper($e['fechavence'])."</td>";
     echo "<td style='text-align: center;'>".strtoupper($abiertos)."</td>";
     echo "<td style='text-align: center;'>".strtoupper($cerrados)."</td>";
if ($fecha_actual < $fecha_entrada) {
  echo "<td style='text-align: center;'><a href='util_reclamos.php?d=".strtoupper($e['id'])."&f=".strtoupper($e['idfactura'])."' class='btn btn-danger'>Generar Reclamo</a></td>";
}else {
  echo "<td style='text-align: center;'><a href='#' class='btn btn-danger'>Garantia Vencida</a></td>";
}
if ($abiertos>0 || $cerrados>0) {
  echo "<td style='text-align: center;'><button type='button' class='btn btn-danger pull-right' onclick='busca_reclamos();' id='btn-reg-usr'>Ver Reclamos</button></td>";
}else {
  echo "<td style='text-align: center;'><a href='#' class='btn btn-danger'>No hay reclamos</a></td>";
}



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
