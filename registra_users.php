<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$rol=test_input($_POST['rol']);
$nombre=test_input($_POST['nombre']);
$clave=test_input($_POST['clave']);
$pass=test_input($_POST['pass']);
/*verifica si ya existe el Usuario*/
$cadena="Select nombre, clave from usuarios where nombre='$nombre' and clave='$clave'";
$exe=$db->consulta($cadena);
if($db->numero_de_registros($exe)>0){
  echo "EXISTE";
}else{
  $cadena2="Insert into usuarios(rol,nombre,clave,password,bodega) values('$rol','$nombre','$clave','$pass',1)";
  if($db->consulta($cadena2)){
    echo "PROCESADO";
  }else{
    echo "ERROR";
  }
}
?>
