<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['txtid'])){$ide= $_POST['txtid'];
if (isset($_POST['txtrazon'])){$rs= $_POST['txtrazon'];}
if (isset($_POST['txttelefono'])){$tel= $_POST['txttelefono'];}
if (isset($_POST['txtcorreo'])){$email= $_POST['txtcorreo'];}
if (isset($_POST['txtdireccion'])){$dir= $_POST['txtdireccion'];}
if (isset($_POST['txtadmin'])){$rol= $_POST['txtadmin'];}

$SQL = "SELECT * FROM edificios WHERE nit='$ide' || nombre='$rs'";
$resultado= mysqli_query($conn,$SQL);
$count = mysqli_num_rows($resultado); 
  if ($count){
    ?>
     <script>
        $(document ).ready(function() {
          $('#Modalrepetido').modal('show')
      });
      </script>
<?php
  }else{ 
  $sql = "INSERT INTO edificios(`nit`, `nombre`, `tel_edificio`, `correo_edificio`, `direccion`, `Cod_cliente`)VALUES($ide,'$rs','$tel','$email','$dir',$rol)";
  mysqli_query($conn, $sql);  
  ?>
  <script>
        $(document ).ready(function() {
          $('#Modalcorrecto').modal('show')
      });
      </script>
<?php
  }
}
}
?>