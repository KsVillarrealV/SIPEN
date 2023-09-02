<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['elim'])){$id= $_POST['elim'];
  $proveedores = "DELETE FROM proveedores WHERE nit_proveedor ='$id'"; 
  $result= mysqli_query($conn, $proveedores); 
if ($result) {
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