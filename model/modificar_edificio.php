<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['txtnit'])){$id= $_POST['txtnit'];
    if (isset($_POST['txtrazon'])){$rs= $_POST['txtrazon'];}
    if (isset($_POST['txttelefono'])){$tel= $_POST['txttelefono'];}
    if (isset($_POST['txtcorreo'])){$email= $_POST['txtcorreo'];}
    if (isset($_POST['txtdireccion'])){$dir= $_POST['txtdireccion'];}
    if (isset($_POST['txtadmin'])){$rol= $_POST['txtadmin'];}
   
  $sql = "UPDATE edificios SET nit='$id',nombre='$rs',tel_edificio='$tel',correo_edificio='$email',direccion='$dir',Cod_cliente='$rol' WHERE nit='$id'";
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