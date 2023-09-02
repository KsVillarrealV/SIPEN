<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['nit_prov'])){$nt= $_POST['nit_prov'];
  if (isset($_POST['razon_prov'])){$rs= $_POST['razon_prov'];}
  if (isset($_POST['tel_prov'])){$tel= $_POST['tel_prov'];}
  if (isset($_POST['correo_prov'])){$email= $_POST['correo_prov'];}
  if (isset($_POST['dir_prov'])){$dir= $_POST['dir_prov'];}
  

$SQL = "SELECT * FROM proveedores  WHERE nit_proveedor='$nt'";
$resultado= mysqli_query($conn,$SQL);
  $count = mysqli_num_rows($resultado); 
  if ($count) {
    ?>
    <script>
        $(document ).ready(function() {
          $('#Modalrepetido').modal('show')
      });
      </script>
  <?php
  }else {
  $sql = "INSERT INTO proveedores(`nit_proveedor`, `nombre`, `telefono`, `correo`, `direccion`)VALUES($nt,'$rs','$tel','$email','$dir')";
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