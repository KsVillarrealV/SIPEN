


<!-- Tabla edificios -->


 

    <table class="table table-striped table-sm bg-white table-responsive">
    <thead class="table-dark">
        <tr class="bg-secondary">
    <th>Nit</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Correo</th>
    <th>Dirección</th>
    <th>Administrador</th> 
    <th>Acciones</th>  
</tr>
        </thead>
        <tbody class="BusquedaRapida"
<?php

$con = connect();
$consulta = "select * from edificios inner join clientes on edificios.Cod_cliente=clientes.codigo";
$resultado = mysqli_query($con,$consulta);

while($mostrar = mysqli_fetch_assoc($resultado)){?>
<tr>
<td> <?php echo $mostrar['nit']; ?></td>
        <td><?php  echo $mostrar['nombre'] ;?></td>
        <td><?php echo $mostrar['tel_edificio'];?></td>
        <td><?php echo $mostrar['correo_edificio']; ?></td>
        <td><?php echo $mostrar['direccion']; ?></td>
        <td><?php echo $mostrar['nombre_cliente']; ?></td>
       <td><a href="edificios.php?e_edificio=<?php echo $mostrar['nit'];?>&i=<?php echo $i ?>"><img src="assets/img/delete.png" alt=""></a> | <a href="edificios.php?edificio=<?php echo $mostrar['nit'];?>&i=<?php echo $i ?>"><img src="assets/img/editar.png" alt=""></a></td>
    </tr>   
<?php }?>          

</tbody>
      </table>		


 
