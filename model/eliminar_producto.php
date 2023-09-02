<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['elim'])){$id= $_POST['elim'];
  $producto = "DELETE FROM productos WHERE Codigo ='$id'";
  $result = mysqli_query($conn, $producto); 
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