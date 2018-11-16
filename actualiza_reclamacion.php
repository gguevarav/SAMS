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
$detalles=test_input($_POST['detalles']);
$estado=test_input($_POST['estado']);
$id=test_input($_POST['id']);




$cadena_insert=$db->consulta("Update reclamogarantia set idfactura='$idfactura',idgarantia='$idgarantia',estado='$estado',detalles='$detalles' where id='$id'");

?>
