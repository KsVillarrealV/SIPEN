<?php
 
if (isset($_POST['confir'])){$codigo= $_POST['confir'];
  if (isset($_POST['txtnombre'])){$nombre= $_POST['txtnombre'];}
    if (isset($_POST['txtapellido'])){$apellido= $_POST['txtapellido'];}
    if (isset($_POST['txtcorreo'])){$email= $_POST['txtcorreo'];}
    if (isset($_POST['usuario'])){$usuario= $_POST['usuario'];}

    $conexion = mysqli_connect("localhost", "root", "", "sipen") or
    die("Problemas con la conexión");
  $sql = "UPDATE users SET user_email='$email',firstname='$nombre',lastname='$apellido',user_name='$usuario' WHERE cod_user=$codigo";
  $result = mysqli_query($conexion, $sql);  
  if($result){
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location:../view/client-side/login.php?logout&exito");
  }else {
}
   }
  
?>
