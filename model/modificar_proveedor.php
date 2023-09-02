<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['txtnit'])){$nit= $_POST['txtnit'];
    if (isset($_POST['txtnombre'])){$nombre= $_POST['txtnombre'];}
    if (isset($_POST['txttelefono'])){$tel= $_POST['txttelefono'];}
    if (isset($_POST['txtcorreo'])){$email= $_POST['txtcorreo'];}
    if (isset($_POST['txtdireccion'])){$dir= $_POST['txtdireccion'];}
    if (isset($_POST['txtprov'])){$rol= $_POST['txtprov'];}
  $sql = "UPDATE proveedores SET nombre='$nombre',telefono='$tel',correo='$email',direccion='$dir'WHERE nit_proveedor='$nit'";
  $result = mysqli_query($conn, $sql);      
  if($result){
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