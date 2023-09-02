<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['txtcod'])){$cod= $_POST['txtcod'];
if (isset($_POST['txtref'])){$ref= $_POST['txtref'];}
  if (isset($_POST['txtmarca'])){$mar= $_POST['txtmarca'];}
  if (isset($_POST['txtdes'])){$des= $_POST['txtdes'];}
  if (isset($_POST['txtcar'])){$car= $_POST['txtcar'];}
  if (isset($_POST['txtcant'])){$cant= $_POST['txtcant'];}
  if (isset($_POST['txtprecio'])){$precio= $_POST['txtprecio'];}
  if (isset($_POST['txtfecha'])){$fecha= $_POST['txtfecha'];}
  if (isset($_POST['txtprov'])){$prov= $_POST['txtprov'];}
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "sipen";
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
  $sql = "UPDATE productos SET Referencia ='$ref',Marca ='$mar',Descripcion='$des',caracteristicas='$car',Cantidad='$cant',Precio='$precio',Fecha='$fecha',Proveedor='$prov' WHERE Codigo='$cod'";
  $result = mysqli_query($conn, $sql);  
  if($result){
    $inventario = "INSERT INTO inventario(cod_poducto,cod_proveedor) VALUES ($cod,$prov)";
    mysqli_query($conn, $inventario);
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