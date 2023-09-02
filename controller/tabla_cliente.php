
    <!-- Tabla--clientes-->
    

    <table class="table table-striped table-sm bg-white">
    <thead class="table-dark">
          <tr class="bg-secondary">
<th>Nombre</th>
<th>Apellido</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Acciones</th>
</thead>
        <tbody class="BusquedaRapida">
        <?php

$con = connect();
$consulta = "select * from clientes";
$resultado = mysqli_query($con , $consulta);
$contador=0;

while($mostrar = mysqli_fetch_assoc($resultado)){ $contador++;?>
<tr>
        <?php $mostrar['codigo']?>
        <td><?php echo $mostrar['nombre_cliente']?></td>
        <td><?php echo $mostrar['apellido']?></td>
        <td><?php echo $mostrar['telefono']?></td>
        <td><?php echo $mostrar['correo']?></td>
        <td><a href="clientes.php?e_cliente=<?php echo $mostrar['codigo'] ;?>&i=<?php echo $i ?>"><img src="assets/img/delete.png" alt=""></a> | <a href="clientes.php?cliente=<?php echo $mostrar['codigo'] ;?>&i=<?php echo $i ?>"><img src="assets/img/editar.png" alt=""></a></td>
    </tr>
    <?php
    }
    ?>
</tbody>
      </table>	
</div>
