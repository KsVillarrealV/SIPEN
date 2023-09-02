<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['txtpassword'])){$clave1= $_POST['txtpassword'];
    if (isset($_POST['txtconfir'])){$clave2= $_POST['txtconfir'];}
    if (isset($_POST['i'])){$i= $_POST['i'];}
   if ($clave1 === $clave2) {
    require_once('../view/client-side/config/connect.php');

  $clave_hash = password_hash($clave1, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET user_password_hash ='$clave_hash' WHERE user_email='" . $i . "' || user_name='" . $i . "'";
    mysqli_query($conexion, $sql);
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location:../view/client-side/login.php?logout&alert1");
   }else {
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location:../view/client-side/login.php?logout&alert2");
 
   }
  }
}
?>
