<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['elim'])){$id= $_POST['elim'];
  $edificio = "DELETE FROM edificios WHERE nit ='$id'";
  $result = mysqli_query($conn, $edificio);  
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