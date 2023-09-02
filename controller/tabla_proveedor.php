
  <!-- Tabla proveedores-->
  
    <table class="table table-striped table-sm bg-white">
    <thead class="table-dark">
        <tr class="bg-secondary">
    <th>Nit</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Correo</th>
    <th>Dirección</th>
    <th>Acciones</th>  
</tr>
        </thead>
        <tbody class="BusquedaRapida">
<?php
require_once("config/database.php");
$con = connect();
$consulta = "select * from  proveedores";
$resultado = mysqli_query($con,$consulta);


while($mostrar = mysqli_fetch_assoc($resultado)){?>
<tr>
<td> <?php echo $mostrar['nit_proveedor']; ?></td>
        <td><?php  echo $mostrar['nombre'] ;?></td>
        <td><?php echo $mostrar['telefono'];?></td>
        <td><?php echo $mostrar['correo']; ?></td>
        <td><?php echo $mostrar['direccion']; ?></td>
       <td><a href="proveedores.php?e_proveedor=<?php echo $mostrar['nit_proveedor'];?>&i=<?php echo $i ?>"><img src="assets/img/delete.png" alt=""></a> | <a href="proveedores.php?proveedor=<?php echo $mostrar['nit_proveedor'];?>&i=<?php echo $i ?>"><img src="assets/img/editar.png" alt=""></a></td>
    </tr>
          
<?php }?>          

</tbody>
      </table>		
</div>

