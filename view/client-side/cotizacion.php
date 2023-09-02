<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipen | Cotización</title>
	<link rel="icon" href="assets/img/icono.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <link href="assets/css/CheckPassword.css" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/501389644c.js" crossorigin="anonymous"></script>

</head>

<body>
<style>
	 body, html{
  height: 100%;
  background-repeat: no-repeat;
  /*background-image: linear-gradient(135deg, rgba(31,123,229,1) 0%, rgba(58,139,232,1) 47%, rgba(70,153,234,1) 92%, rgba(72,156,234,1) 100%);*/
  background: url(assets/img/cotizacion.png) no-repeat center center fixed;
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
<?php
if (isset($_GET['i'])){$i= $_GET['i'];}
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
      header("location: login.php");
  exit;
      }
      require_once("nav_bar.php");

      

include("../../controller/modalAgregar.php");
include("../../controller/modalEditar.php");
include("perfil.php");

?> 
<div class="container border bg-white" style="margin-top: 5%; " >

<form action="reporte.php" target="_blank" method ="post">
				<fieldset>
				<legend style="color:white">Nueva cotización</legend>
					
       
          <div class="form-group row" style="display:flex;margin-top: 5%;">
		
				<label for="nombre_cliente" class="col-md-1 control-label " >Nombre</label>
				<div class="col-md-3">
				<input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Nombre del edificio" name="nom_edificio" required>
				</div>
				<label for="identificacion" class="col-md-1 control-label" >Nit</label>
				  <div class="col-md-3">
					  <input type="number" class="form-control input-sm" id="id_cliente"  name="nit_edificio" placeholder="Identificación" readonly>
				  </div>
				  <label for="tel1" class="col-md-1 control-label" >Teléfono</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" name="tel_edificio" readonly>
							</div>
				 </div>
				 <div class="form-group row" style="display:flex; margin-top:1%;">
				 <label for="mail" class="col-md-1 control-label">Correo</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="mail" placeholder="Correo" name="correo_edificio" readonly>
							</div>
				 <label for="direccion" class="col-md-1 control-label">Dirección</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="direccion" placeholder="Dirección" name="dir_edificio" readonly>
							</div>
							<label for="tel2" class="col-md-1 control-label" >Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" name="txtfecha" value="<?php echo date("Y/m/d");?>" readonly>
							</div>
							
		  <div class="pull-right" style="margin-top: 5%; margin-bottom:3%; ">
		<a href="#myModal" role="button" class="btn bg-white" style="border: solid 1px;" data-toggle="modal"><i class="fa-solid fa-file-pen"></i> Agregar productos</a>
        <button type="submit"  class="btn bg-white " style="border: solid 1px;"><i class="fa-solid fa-file-pdf"></i> Imprimir</button>
		
		</div>
		</fieldset>
      </form>
	

<div id="container">
<div id="resultados"></div>

    </div>
	<?php include("../../model/footer.php")?> 
    </div>

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