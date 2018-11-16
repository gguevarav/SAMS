<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();

$idfactura=test_input($_POST['idfactura']);
$idgarantia=test_input($_POST['idgarantia']);
$descripcion=test_input(strtoupper($_POST['descripcion']));
$detalles=test_input($_POST['detalles']);
$estado=test_input($_POST['estado']);

$busca_numero_ticket=$db->consulta("Select caja2 as numero from parametros");

while($x=$db->buscar_array($busca_numero_ticket)){
   $numero_ticket=$x['numero']+1;
}


$cadena_insert=$db->consulta("Insert into reclamogarantia(idfactura,idgarantia,descripcion,estado,detalles) values('$idfactura','$idgarantia','$descripcion', '$estado','$detalles')");

?>
