
<?php
$nombreServidor = "localhost";
$nombreUsuario = "root";
$passwordBaseDeDatos = "";
$nombreBaseDeDatos = "sipen";
$conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
if ($conn ->connect_error) {
  die("Connection failed: " . $conn ->connect_error);
}
?>