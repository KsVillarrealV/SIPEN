<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (isset($_POST['txtcodigo'])){$cod= $_POST['txtcodigo'];
  if (isset($_POST['txtnom'])){$nom= $_POST['txtnom'];}
    if (isset($_POST['txtapellido'])){$apel= $_POST['txtapellido'];}
    if (isset($_POST['txttelefono'])){$tel= $_POST['txttelefono'];}
    if (isset($_POST['txtcorreo'])){$email= $_POST['txtcorreo'];}
  $sql = "UPDATE clientes SET nombre_cliente='$nom',apellido='$apel',telefono='$tel',correo='$email' WHERE codigo='$cod'";
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