<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['txtnombre'])){$nom= $_POST['txtnombre'];
  if (isset($_POST['txtapellido'])){$apel= $_POST['txtapellido'];}
  if (isset($_POST['txttelefono'])){$tel= $_POST['txttelefono'];}
  if (isset($_POST['txtcorreo'])){$email= $_POST['txtcorreo'];}
  
  $sql = "INSERT INTO `clientes`(`nombre_cliente`, `apellido`, `telefono`, `correo`) VALUES ('$nom','$apel','$tel','$email')";
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