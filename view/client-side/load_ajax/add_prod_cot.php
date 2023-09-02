<?php
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	function get_row($table,$row, $id, $equal){
		global $con;
		$query=mysqli_query($con,"select $row from $table where $id='$equal'");
		$rw=mysqli_fetch_array($query);
		$value=$rw[$row];
		return $value;
		
	}
if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
	$insert_tmp=mysqli_query($con,"INSERT INTO tmp_cotizacion (id_producto,cantidad_tmp,precio,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
$delete=mysqli_query($con, "DELETE FROM tmp_cotizacion WHERE id_tmp='".$id_tmp."'");

}
$simbolo_moneda="$";
?>
<table class="table table-striped table-sm  bg-white">
<thead class="table-dark">
<tr class="bg-secondary">
	<th class='text-center'>REFERENCIA</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCIÓN</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
</thead>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con,"select * from productos, tmp_cotizacion where productos.Codigo=tmp_cotizacion.id_producto and tmp_cotizacion.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['Referencia'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['Descripcion'];
	
	
	$precio_venta=$row['precio'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>
		<tr>
			<td class='text-center'><?php echo $codigo_producto;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td class='text-right'><?php echo $precio_venta_f;?></td>
			<td class='text-right'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><img src="assets/img/delete.png" alt=""></a></td>
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
	<td class='text-right' colspan=4>SUBTOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>IVA (<?php echo $impuesto;?>)% <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>TOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>
