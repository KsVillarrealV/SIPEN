<?php
$cod = $_POST["txtid"];
   $fecha= $_POST['txtfecha'];
   include('../conexion.php');
   $sql = "INSERT INTO `cotizacion`(`fecha_cotizacion`, `id_usuario`) VALUES ('$fecha','$cod')";
  $result = mysqli_query($conn, $sql);  
  if($result){
    header("HTTP/1.1 302 Moved Temporarily"); 
    header ("Location:../cotizador.php");
  }
?>