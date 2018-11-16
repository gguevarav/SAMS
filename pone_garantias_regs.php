<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');

$db=new ConexionMySQL();

$cadena="Select * from usuarios";
$exe=$db->consulta($cadena);
if($db->numero_de_registros($exe)>0){
  echo "<div class='box box-primary'>";
  echo "<div class='box-header'>";
  echo "<h3 class='box-title'>Usuarios registrados.</h3>";
  echo "</div>";
  echo "<div class='box-body'>";
 echo "<table >";
 echo "<thead>";
 echo "<tr>";
 echo "<th style='text-align: center;>Nombre de Usuario</th>";
 echo "<th style='text-align: center;></th>";
  echo "<th style='text-align: center;></th>";
  echo "<th style='text-align: center;></th>";
 echo "</tr>";
 echo "</thead>";
 echo "<tbody>";
 while($e=$db->buscar_array($exe)){
   echo "<tr>";
   echo "<td style='text-align: center;'>".strtoupper($e['nombre'])."</td>";
   echo "<td style='text-align: center;'>".strtoupper($e['rol'])."</td>";
   echo "<td style='text-align: center;'><a onclick=''>".strtoupper("editar")."</a></td>";
   echo "<td style='text-align: center;'><button type='button' class='btn btn-danger pull-right' onclick='elimina_usr(".strtoupper($e['id']).");' id='btn-del-usr'>eliminar</button></td>";
   echo "</tr>";
 }
 echo "</tbody>";
 echo "</table>";
 echo "</div>";
 echo "</div>";

}else{
 echo "<b>Actualmente no hay usuarios registrados</b>";
}


?>
