<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
date_default_timezone_set("America/Chihuahua");
 $descripcion=strtoupper($_POST['descripcion']);
 $estado=$_POST['estado'];
 $detalle=$_POST['detalle'];
 $idfactura=$_POST['idfactura'];
 $serie=$_POST['serie'];
  $hora= date("h:i:s");
  $fecha= date ("j/n/Y");
  $idgarantia=$_POST['idgarantia'];
  $numero_ticket=$_POST['numero_ticket'];
  $ar=fopen("ticketrecla.txt","w") or die("Problemas en la creacion");

  fputs($ar,"Fecha: ".$fecha."\n");
  fputs($ar,"Hora: ".$hora."\n");
  fputs($ar,"Ticket: ".$serie."-".$numero_ticket."\n");
  fputs($ar,"---------------------"."\n");
  fputs($ar,"No. de Factura  : ".$idfactura."\n");
  fputs($ar,"No. de Garantia : ".$idgarantia."\n");
  fputs($ar,"Descripcion del Reclamo : \n");
  fputs($ar,$descripcion."\n");
  fputs($ar,"     Lo atendio:    "."\n");
  fputs($ar,"  ".$_SESSION['nombre_de_usuario']."\n");
  fputs($ar,"---------------------"."\n");
  fputs($ar,"---------------------"."\n");
  fclose($ar);

 ?>
