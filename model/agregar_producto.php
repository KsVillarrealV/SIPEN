<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['txtcd'])){$cd= $_POST['txtcd'];
if (isset($_POST['txtreferencia'])){$ref= $_POST['txtreferencia'];}
  if (isset($_POST['txtmarca'])){$mar= $_POST['txtmarca'];}
  if (isset($_POST['txtdes'])){$des= $_POST['txtdes'];}
  if (isset($_POST['txtcar'])){$car= $_POST['txtcar'];}
  if (isset($_POST['txtcant'])){$cant= $_POST['txtcant'];}
  if (isset($_POST['txtprecio'])){$precio= $_POST['txtprecio'];}
  if (isset($_POST['txtfecha'])){$fecha= $_POST['txtfecha'];}
  if (isset($_POST['txtprov'])){$prov= $_POST['txtprov'];}

  $SQL = "SELECT * FROM productos WHERE Referencia='$ref'";
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
  $sql = "INSERT INTO productos(Codigo,Referencia,Marca,Descripcion,caracteristicas,Cantidad,Precio,Fecha,Proveedor) VALUES ($cd,'$ref','$mar','$des','$car',$cant,$precio,'$fecha',$prov)";
  $resultado = mysqli_query($conn, $sql);
  if ($resultado) {
    $inventario = "INSERT INTO inventario(cod_poducto,cod_proveedor) VALUES ($cd,$prov)";
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
}
?>