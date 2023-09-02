<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM edificios where nombre like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_cliente=$row['nit'];
		$row_array['value'] = $row['nombre'];
		$row_array['nit']=$id_cliente;
		$row_array['nombre']=$row['nombre'];
		$row_array['tel_edificio']=$row['tel_edificio'];
		$row_array['correo_edificio']=$row['correo_edificio'];
		$row_array['direccion']=$row['direccion'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>