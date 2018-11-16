<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();

$codigo=test_input($_POST['codigo']);

$cadena="Select * from articulos where codigo='$codigo'";
$exec=$db->consulta($cadena);
if($db->numero_de_registros($exec)>0){
  while($r=$db->buscar_array($exec)){
    $desc=$r['descripcion'];
    $stock=$r['codigostock'];
    $costo=$r['costo'];
    $precio=$r['precio'];
   echo "<div class='form-group'>";
   echo "   <label for='' class='col-sm-2 control-label'>Descripcion:</label>";
   echo "   <div class='col-sm-6'>";
   echo "   <input type='text' class='form-control' id='' placeholder='Descripcion del articulo...' value='$desc' disabled>";
   echo "   </div>";
   echo "   </div>";

   echo "<div class='form-group'>";
   echo "   <label for='' class='col-sm-2 control-label'>Codigo de Stock:</label>";
   echo "   <div class='col-sm-3'>";
   echo "   <input type='text' class='form-control' id='' placeholder='Codigo de Stock...' value='$stock' disabled>";
   echo "   </div>";
   echo "   </div>";

   echo "<div class='form-group'>";
   echo "   <label for='' class='col-sm-2 control-label'>Costo:</label>";
   echo "   <div class='col-sm-2'>";
   echo "   <input type='text' class='form-control' id='' placeholder='Costo...' value='$costo' disabled>";
   echo "   </div>";
   echo "   </div>";

   echo "<div class='form-group'>";
   echo "   <label for='' class='col-sm-2 control-label'>Precio:</label>";
   echo "   <div class='col-sm-2'>";
   echo "   <input type='text' class='form-control' id='' placeholder='Precio...' value='$precio' disabled>";
   echo "   </div>";
   echo "   </div>";

   $busca_prov=$db->consulta("Select nombre from proveedores where id=$r[proveedor]");
      while($t=$db->buscar_array($busca_prov)){
       $nombre=$t['nombre'];
       echo "<div class='form-group'>";
       echo "   <label for='' class='col-sm-2 control-label'>Proveedor:</label>";
       echo "   <div class='col-sm-4'>";
       echo "   <input type='text' class='form-control' id='' placeholder='Proveedor...' value='$nombre' disabled>";
       echo "   </div>";
       echo "   </div>";
      }

  /*$busca_linea=$db->consulta("Select * from lineas where linea=$r[linea] and grupo=0");
      while($t=$db->buscar_array($busca_linea)){
       $linea=$t['linea'];
       echo "<div class='form-group'>";
       echo "   <label for='' class='col-sm-2 control-label'>Linea:</label>";
       echo "   <div class='col-sm-4'>";
       echo "   <input type='text' class='form-control' id='' placeholder='Linea...' value='$linea' disabled>";
       echo "   </div>";
       echo "   </div>";
       $grupo=$t['grupo'];
       echo "<div class='form-group'>";
       echo "   <label for='' class='col-sm-2 control-label'>Grupo:</label>";
       echo "   <div class='col-sm-4'>";
       echo "   <input type='text' class='form-control' id='' placeholder='Grupo...' value='$grupo' disabled>";
       echo "   </div>";
       echo "   </div>";
     }*/
     echo "<div class='form-group'>";
     echo "   <label for='' class='col-sm-2 control-label'>Linea:</label>";
     echo "   <div class='col-sm-4'>";
     echo "   <input type='text' class='form-control' id='' placeholder='Linea...' value='$r[linea]' disabled>";
     echo "   </div>";
     echo "   </div>";
    echo "<div class='form-group'>";
    echo "   <label for='' class='col-sm-2 control-label'>Grupo:</label>";
    echo "   <div class='col-sm-4'>";
    echo "   <input type='text' class='form-control' id='' placeholder='Grupo...' value='$r[grupo]' disabled>";
    echo "   </div>";
    echo "   </div>";



   }
}else{
  echo 0;
}
?>
