<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipen | Cliente</title>
    <link rel="icon" href="assets/img/icono.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <link href="assets/css/CheckPassword.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/501389644c.js" crossorigin="anonymous"></script>
</head>
<header>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $i = htmlspecialchars($_REQUEST['i']);
    if (empty($i)) {
        echo "Name is empty";
    } else {
       
    }
}

session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
      header("location: login.php");
  exit;
      }
      if (isset($_GET['i'])){$i= $_GET['i'];};
require_once("config/database.php");
require_once("conexion.php");
require_once("nav_bar.php");

          ?>

</header>
<body>
<!-- opciones de buscar y agregar-->
<div class="container border p-3 bg-white" style="margin-top: 5%;">
<div class="d-flex ">
<legend>Clientes</legend>
  </div>

  <div class="d-flex mb-3">
      <input class="form-control me-2 w-25" id="FiltrarContenido" name="Buscar" placeholder="Buscar" aria-label="Search">
      <button type="button" class="btn bg-white h-25 border"  data-bs-toggle="modal" data-bs-target="#exampleModal22">
      <i class="fa-solid fa-file-pen"></i> Nuevo cliente
</button>
</div>

     <!-- Modal de operación completa agregar y modificar-->
     <div class="modal fade" id="Modalcorrecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
      <div class="alert mt-3  text-center" role="alert">
      <i class="fa-solid fa-circle-check fa-5x"></i>
   <h2>Operación completada</h2>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

 
<?php 
require_once("../../model/eliminar_cliente.php");
require_once("../../model/agregar_cliente.php"); 
require_once("../../model/modificar_cliente.php"); 
if (isset($_GET['i'])){$i= $_GET['i'];};
?> 
<div id="container">
  <?php
include("../../controller/tabla_cliente.php");
?> 

<?php include("../../model/footer.php")?> 
</div>
</div>
<?php

include("../../controller/modalEditar.php");
include("../../controller/modalAgregar.php");
include("../../controller/modalEliminar.php");
include("perfil.php");
?> 
<style>
   body, html{
  height: 100%;
  background-repeat: no-repeat;
  /*background-image: linear-gradient(135deg, rgba(31,123,229,1) 0%, rgba(58,139,232,1) 47%, rgba(70,153,234,1) 92%, rgba(72,156,234,1) 100%);*/
  background: url(assets/img/administrador.png) no-repeat center center fixed;
  background-size: 100% 100%;
}
 
#container {
  width: 100%;
  height: 100%;
  border: 1px solid #ccc;
  overflow-x: scroll;
}

#content {
  width: 250px;
  background-color: #ccc;
}
</style>
<script>

$(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida tr').hide();
             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
                })
      }(jQuery));
});

</script>
 


<script src="assets/js/main.js"></script>
<script src="assets/js/CheckPassword.js"></script>
<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/VentanaCentrada.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="assets/js/autocomplete.js"></script>
  <script src="assets/js/ready.js"></script>
  <script src="assets/js/agregarProducto.js"></script>
  <script>
  
</script>
</body>
</html>