<?php
 
  if (isset($_POST['credencial'])){$credencial= $_POST['credencial'];
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "sipen";
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
  $sql = "SELECT credencial FROM credencial WHERE credencial = '$credencial'";
  $result = mysqli_query($conn, $sql);  
        $count = mysqli_num_rows($result); 
  if($count){
    ?>
    <script>
    $(document ).ready(function() {
      $('#Modalregistrarme').modal('show')
  });
  </script>
  <?php
  }else{
     ?>
     <div class="alert alert-danger text-center mt-3" role="alert">
   Credencial no valida.
   </div>
 <?php
  }
}
?>