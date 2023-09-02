<?php
  
  $email = $_POST['txtcorreo'];
  $usuario = $_POST['txtusuario'];
  $password = $_POST['txtpassword'];
  $confirmar = $_POST["txtconfir"];
  $nombre= $_POST['txtnombre'];
  $apellido= $_POST['txtapellido'];
  $credencial= $_POST['txtcred'];
   $user_id=1;
   $date= date("Y-m-d");
   $clave_hash = password_hash($password, PASSWORD_DEFAULT);
 
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "sipen";
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
  

  $SQL = "SELECT * FROM users WHERE user_email='$email'";
  $resultado= mysqli_query($conn,$SQL);
  $count = mysqli_num_rows($resultado); 
   if ($count==1) {
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location:../view/client-side/login.php?alert&alert1");
   }else{
if ($password === $confirmar) {

  $sql = "INSERT INTO `users`(`user_id`,`firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`,`date_added`,`credencial`) VALUES ($user_id,'$nombre','$apellido','$usuario','$clave_hash','$email','$date','$credencial')";
  $result = mysqli_query($conn, $sql);  
  if($result){
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location:../view/client-side/login.php?correcto");
  }
}else {
  header("HTTP/1.1 302 Moved Temporarily"); 
  header("Location:../view/client-side/login.php?alert&alert2");
}
   }
?>