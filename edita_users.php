<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$id=test_input($_POST['id']);
$nombre=test_input($_POST['nombre']);
$clave=test_input($_POST['clave']);
$pass=test_input($_POST['pass']);
$rol=test_input($_POST['rol']);
$cadena=$db->consulta("UPDATE usuarios SET rol='$rol',nombre='$nombre',clave='$clave',password='$pass' where id=$id");
?>
