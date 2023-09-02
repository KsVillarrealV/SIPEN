<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['elim'])){$id= $_POST['elim'];
  $cliente = "DELETE FROM clientes WHERE codigo ='$id'";
  $result = mysqli_query($conn, $cliente); 
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