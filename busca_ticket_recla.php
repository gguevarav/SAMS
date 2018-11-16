<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();


$db->consulta("SET NAMES 'utf8'");

 $cadena='Select caja2 as numero from parametros';

$exe=$db->consulta($cadena);
 if($db->numero_de_registros($exe)>0){
   while($re=$db->buscar_array($exe)){
       $sig_ticket=intval($re['numero']) + 1;
     }
   echo $sig_ticket;
   }
?>
