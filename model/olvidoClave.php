<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['txtemail'])){$email= $_POST['txtemail'];
  if (isset($_POST['txtcredencial'])){$credencial= $_POST['txtcredencial'];}
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "sipen";
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
  $sql = "SELECT user_email,credencial FROM users WHERE credencial = '$credencial' && user_email = '$email'";
  $result = mysqli_query($conn, $sql);  
        $count = mysqli_num_rows($result);  
  if($count){
    ?>
     <script>
    $(document ).ready(function() {
      $('#Modalolvidoclave').modal('show')
  });
  </script>
  
  <?php
  }else{
     ?>
     <div class="alert alert-danger text-center mt-3" role="alert">
   Credencial y/o correo no valido.
   </div>
 <?php
  }
  }
}
?>