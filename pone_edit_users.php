<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$id=test_input($_POST['id']);
$db=new ConexionMySQL();
$cadena="Select * from usuarios where id=$id";
$exe=$db->consulta($cadena);

$e=$db->buscar_array($exe);

echo "<div class='box box-warning'>";
echo "<div class='box-header with-border'>";
echo "<h3 class='box-title'>Editar usuario</h3>";
echo "</div>";
echo "<div  class='box-body'>";
  echo "<form class='form-horizontal'>";
  echo "<div class='form-group'>";
  echo "<label for='codigo' class='col-sm-2 control-label'>Nombre completo:</label>";
  echo "<div class='col-sm-5'>";
  echo "<input type='text' class='form-control' id='nombre' value='".$e[nombre]."' required>";
  echo "</div>";
  echo "</div>";

  echo "<div class='form-group'>";
  echo "<label for='codigo' class='col-sm-2 control-label'>Usuario:</label>";
  echo "<div class='col-sm-3'>";
  echo "<input type='text' class='form-control' id='clave' value='".$e[clave]."' required>";
  echo "</div>";
  echo "</div>";

  echo "<div class='form-group'>";
  echo "<label for='codigo' class='col-sm-2 control-label'>Password:</label>";
  echo "<div class='col-sm-3'>";
  echo "<input type='password' class='form-control' id='pass' value='".$e[password]."' required>";
  echo "</div>";
  echo "</div>";

  echo "<div class='form-group'>";
  echo "<label for='codigo' class='col-sm-2 control-label'>Rol de Usuario:</label>";
  echo "<div class='col-sm-4'>";
  echo "<div>";
  echo "<select name='rol' id='rol' class='form-control' required>";
  echo "<option value='1' >Adrministrador</option>";
  echo "<option value='2' selected>Cajero</option>";
  echo "</select>";
  echo "</div>";
  echo "</div>";
  echo "</div>";

  echo "</form>";
  echo "</div>";
echo  "<div class='box-footer'>";
  echo "<button type='button' class='btn btn-danger pull-right' onclick='edita(".$e[id].");' id='btn-reg-usr'>Guardar Cambios</button>";
  echo "</div>"


?>
