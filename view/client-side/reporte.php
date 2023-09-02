<?php
ob_start();
?>
<?php
    if (isset($_POST['nom_edificio'])){$nombre= $_POST['nom_edificio'];
    if (isset($_POST['nit_edificio'])){$nit= $_POST['nit_edificio'];}
    if (isset($_POST['tel_edificio'])){$tel= $_POST['tel_edificio'];}
    if (isset($_POST['correo_edificio'])){$email= $_POST['correo_edificio'];}
    if (isset($_POST['dir_edificio'])){$dir= $_POST['dir_edificio'];}
    $numero=mt_rand(1,1000);
$fecha = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipen | Cotización</title>
    <link rel="icon" href="assets/img/icono.ico">
    <link rel="stylesheet" href="../view/client-side/assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="view/client-side/assets/css/style.css" media="print">
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 ">
            <h1>COTIZACIÓN</h1>
        </div>     
        </div>
    </div>
    <hr>
    <div class="col-xs-2 text-center">
        <strong>ARBOMBAS SAS</strong> <br>
        <strong>NIT: 830071611-5</strong> <br>
    </div>
    <div class="d-flex" >
    <div class="col-xs-2 text-end">
            <strong>FECHA: </strong><?php echo $fecha ?>
            <br>
            <strong>N° COTIZACIÓN: </strong><?php echo $numero ?>
            <br>  
        </div>
        <div class="col-xs-10 ">
            <h3 >COTIZAR A:</h3>
            <strong>EDIFICIO: </strong><?php echo $nombre ?><br>
            <strong>NIT: </strong><?php echo $nit ?><br>
            <strong>TELÉFONO: </strong><?php echo $tel ?><br>
            <strong>CORREO: </strong> <?php echo $email ?><br>
            <strong>DIRECCIÓN: </strong><?php echo $dir ?><br>
        </div>
        
    </div>
    <hr>
   
    <div class="row">
        <div class="col-xs-12">
        <table class="table table-hover table-sm  bg-white">
<tr class="bg-secondary">
<th class='text-center'>CANTIDAD</th>
<th>DESCRIPCIÓN</th>
	<th class='text-center'>REFERENCIA</th>
	<th class='text-right'>PRECIO UNITARIO</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
$simbolo_moneda="$";
$conexion = mysqli_connect("localhost", "root", "", "sipen") or
die("Problemas con la conexión");
$sumador_total=0;
	$sql=mysqli_query($conexion,"select * from productos, tmp_cotizacion where productos.Codigo=tmp_cotizacion.id_producto");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['Descripcion'];
	$codigo_producto=$row['Referencia'];
	$precio_venta=$row['precio'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>
		<tr>
        <td class='text-center'><?php echo $cantidad;?></td>
        <td><?php echo $nombre_producto;?></td>
			<td class='text-center'><?php echo $codigo_producto;?></td>
			<td class='text-right'>$ <?php echo $precio_venta_f;?></td>
			<td class='text-right'>$ <?php echo $precio_total_f;?></td>
			
		</tr>		
		<?php
	}
	$impuesto=19;
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;

?>
<tr>
	<td class='text-right' colspan=4>SUBTOTAL </td>
	<td class='text-right'>$ <?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>IVA (<?php echo $impuesto;?>)% </td>
	<td class='text-right'>$ <?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>TOTAL </td>
	<td class='text-right'>$ <?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>
        </div>
    </div>
    </div>
</div>
<style>
 footer {   
	width: 100%;
	height: 80px;
	position: fixed;
	bottom: 0;
}
</style>
<footer class=" text-center text-lg-start">
  <!-- Copyright -->
  
  <div class="text-center p-3" >
  <hr>
  Dirección: Carrera 96 J # 16 C - 18 -  Email: arbombases@yahoo.com <br>
Teléfono: (+57) 601 415 1446 - Celular: (+57) 310 230 7775 <br>
Bogotá-Colombia
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
<?php
}
$html = ob_get_clean();
//echo $html;

require_once 'pdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Cotización_".$nit , array("Attachment" => false));
?>