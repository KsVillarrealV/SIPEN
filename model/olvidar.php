<?php

  if (isset($_POST['txtpass'])){$clave1= $_POST['txtpass'];
    if (isset($_POST['txtconfir'])){$clave2= $_POST['txtconfir'];}
    if (isset($_POST['txtcredencial'])){$credencial= $_POST['txtcredencial'];}
   if ($clave1 === $clave2) {
    require_once('../view/client-side/config/connect.php');
    $codigo = "select cod_user from users where user_email = '$correo'";
    $resultado = mysqli_query($conexion, $codigo);
$result = mysqli_fetch_assoc($resultado);
$cod = $result['cod_uder'];
  $clave_hash = password_hash($clave1, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET user_password_hash ='$clave_hash' WHERE credencial= '$credencial'";

    mysqli_query($conexion, $sql);
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location:../view/client-side/login.php?logout&alert1");
   }else {
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location:../view/client-side/login.php?logout&alert2");
 
   }
  }

?>
