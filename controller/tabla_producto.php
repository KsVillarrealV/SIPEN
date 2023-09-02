
<!-- Tabla--productos-->



    <table class="table table-striped table-sm bg-white">
    <thead class="table-dark">
          <tr class="bg-secondary">
          <th>Referencia</th>
    <th>Marca</th>
    <th>Descripción</th>
    <th>Caracteristicas</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Fecha</th>
    <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="BusquedaRapida">
            
<?php

$con = connect();

$consulta = "select * from productos" ;
$resultado = mysqli_query($con , $consulta);
$contador=0;

while($mostrar = mysqli_fetch_assoc($resultado)){ $contador++;?>
<tr>
        <?php $mostrar['Codigo'] ?>
        <td><?php echo $mostrar['Referencia'] ?></td>
        <td><?php echo $mostrar['Marca'] ?></td>
        <td><?php echo $mostrar['Descripcion'] ?></td>
        <td><?php echo $mostrar['caracteristicas'] ?></td>
        <td><?php echo $mostrar['Cantidad'] ?></td>
        <td><?php echo $mostrar['Precio'] ?></td>
        <td><?php echo $mostrar['Fecha'] ?></td>
        
        <td> <a href="productos.php?e_producto=<?php echo $mostrar['Codigo'] ;?>&i=<?php echo $i ?>"><img src="assets/img/delete.png" alt=""></a> | <a href="productos.php?producto=<?php echo $mostrar['Codigo'] ;?>&i=<?php echo $i ?>"><img src="assets/img/editar.png" alt=""> </a></td>
    </tr>
          
<?php }?>          

</tbody>
      </table>	
     
   
    