<!-- Modal editar edificio-->
<?php
 include('config/connect.php');
 include('conexion.php');
   if (isset($_GET['edificio'])){
$id = $_GET['edificio'];
$sql = "SELECT * FROM edificios WHERE nit='$id'";
$result= mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result); 
  if ($count ==1) {
    ?> 
    <script>
  $(document ).ready(function() {
    $('#Modaleditaredificio').modal('show')
});
</script>
<?php
}
}
?> 
<div class="modal fade" id="Modaleditaredificio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Modificar Edificio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<div class="container">
<?php 
 $sql="select * from  edificios where nit='$id'";
$result = mysqli_query($conexion,$sql);
    ?>
    <?php       
while($mostrar=mysqli_fetch_array($result))
{ 
    $id =  $mostrar['nit'];
    $rs = $mostrar['nombre'] ;
    $tel = $mostrar['tel_edificio'] ;
    $correo=  $mostrar['correo_edificio'] ;
    $dir= $mostrar['direccion'] ;
    
    }    
    ?>
      <form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Nit</label>
    <input type="text" class="form-control " id="validationDefault01" value="<?php echo $id  ?>" name="txtnit" readonly>
  </div>
  <input type="hidden" name="i" value="<?php echo $i?>">
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Razón social</label>
    <input type="text" class="form-control" id="validationDefault02" value="<?php echo $rs ?>" name="txtrazon" autocomplete="off" required>
  </div>
 
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Teléfono</label>
    <input type="number" class="form-control" id="validationDefault03"  value="<?php echo $tel ?>" name="txttelefono" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationDefault04"  value="<?php echo $correo?>" name="txtcorreo" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault05" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="validationDefault05" value="<?php echo $dir ?>" name="txtdireccion" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault06" class="form-label">Administradores</label>
    <select class="form-select" id="validationDefault06" name="txtadmin"required>
    
    <?php
  $registros = mysqli_query($conexion, "select codigo,nombre_cliente from clientes ") or
    die("Problemas en el select:" . mysqli_error($conexion));
  while ($reg = mysqli_fetch_array($registros)) {
    echo "<option value=\"$reg[codigo]\">$reg[nombre_cliente]</option>";
  }
  ?>  
  </select> 
  
  </div>
  
  </div>
</div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal editar producto-->
<?php
   if (isset($_GET['producto'])){
$id = $_GET['producto'];
$sql = "SELECT * FROM productos WHERE Codigo='$id'";
$result= mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result); 
  if ($count ==1) {
    ?> 
    <script>
  $(document ).ready(function() {
    $('#Modaleditarproducto').modal('show')
});
</script>
   <?php
  }
}
  ?>
  <div class="modal fade" id="Modaleditarproducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
<div class= "modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Modificar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<div class="container">
<?php
 $sql="select * from  productos  where Codigo='$id'";
$result = mysqli_query($conexion,$sql);
    ?>
     <?php       
while($mostrar=mysqli_fetch_array($result))
{ 
    $cod =  $mostrar['Codigo'];
    $ref = $mostrar['Referencia'] ;
    $mar = $mostrar['Marca'] ;
    $des=  $mostrar['Descripcion'] ;
    $car= $mostrar['caracteristicas'] ;
    $can= $mostrar['Cantidad'];
    $pre = $mostrar['Precio'];
    $fech = $mostrar['Fecha'];
    $pro = $mostrar['proveedor'];
    
    }    
    ?>
       
       <form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Referencia</label>
    <input type="text" class="form-control " id="validationDefault01" value="<?php echo $ref?>" name="txtref" autocomplete="off" required>
  </div>
  <input type="hidden" name="i" value="<?php echo $i?>">
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Marca</label>
    <input type="text" class="form-control" id="validationDefault02" value="<?php echo $mar?>" name="txtmarca" autocomplete="off" required>
  </div>
 
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="validationDefault03"  value="<?php echo $des?>" name="txtdes" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Caracteristicas</label>
    <input type="text" class="form-control" id="validationDefault04"  value="<?php echo $car?>" name="txtcar" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Cantidad</label>
    <input type="text" class="form-control" id="validationDefault04"  value="<?php echo $can?>" name="txtcant" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Precio</label>
    <input type="text" class="form-control" id="validationDefault04"  value="<?php echo $pre?>" name="txtprecio" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Fecha</label>
    <input type="text" class="form-control" id="validationDefault04"  value="<?php echo $fech?>" name="txtfecha" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault06" class="form-label">Proveedor</label>
    <select class="form-select" id="validationDefault06" name="txtprov"required>
    <?php
   
  $registros = mysqli_query($conexion, "select nit_proveedor,nombre from proveedores") or
    die("Problemas en el select:" . mysqli_error($conexion));
  while ($reg = mysqli_fetch_array($registros)) {
    echo "<option value=\"$reg[nit_proveedor]\">$reg[nombre]</option>";
  }
  ?>  
  </select> 
   <input type="text"  value=" <?php echo $cod  ?>" style="visibility: hidden;" name="txtcod" required>
  </div>
</div> 
</div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal editar proveedor-->
<?php
   if (isset($_GET['proveedor'])){
$id = $_GET['proveedor'];
$sql = "SELECT * FROM proveedores WHERE nit_proveedor='$id'";
$result= mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result); 
  if ($count ==1) {
    ?> 
    <script>
  $(document ).ready(function() {
    $('#Modaleditarproveedor').modal('show')
});
</script>
   <?php
  }
}
  ?>
  <div class="modal fade" id="Modaleditarproveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Modificar Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<div class="container">
<?php
 $sql="select * from  proveedores where nit_proveedor='$id'";
$result = mysqli_query($conexion,$sql);
    ?>
    <?php       
while($mostrar=mysqli_fetch_array($result))
{ 
    $id =  $mostrar['nit_proveedor'];
    $rs = $mostrar['nombre'] ;
    $tel = $mostrar['telefono'] ;
    $correo=  $mostrar['correo'] ;
    $dir= $mostrar['direccion'] ;
    
    }    
    ?>
      <form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Identificación</label>
    <input type="text" class="form-control " id="validationDefault01" value="<?php echo $id  ?>" name="txtnit" readonly>
  </div>
  <input type="hidden" name="i" value="<?php echo $i?>">
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Razón social</label>
    <input type="text" class="form-control" id="validationDefault02" value="<?php echo $rs ?>" name="txtnombre" vautocomplete="off" required>
  </div>
 
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Teléfono</label>
    <input type="number" class="form-control" id="validationDefault03"  value="<?php echo $tel ?>" name="txttelefono" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationDefault04"  value="<?php echo $correo?>" name="txtcorreo" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault05" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="validationDefault05" value="<?php echo $dir ?>" name="txtdireccion" autocomplete="off" required>
  </div>
  
  </div>
</div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal editar cliente-->

<?php
   if (isset($_GET['cliente'])){
$id = $_GET['cliente'];
$sql = "SELECT * FROM clientes WHERE codigo='$id'";
$result= mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result); 
  if ($count ==1) {
    ?> 
    <script>
  $(document ).ready(function() {
    $('#Modaleditarcliente').modal('show')
});
</script>
   <?php
  }
}
  ?>
  <div class="modal fade" id="Modaleditarcliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Modificar cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<div class="container">
<?php
 $sql="select * from  clientes where codigo='$id'";
$result = mysqli_query($conexion,$sql);
    ?>
     <?php       
while($mostrar=mysqli_fetch_array($result))
{  $cod =  $mostrar['codigo'];
    $nom =  $mostrar['nombre_cliente'];
    $ap = $mostrar['apellido'] ;
    $tel = $mostrar['telefono'] ;
    $correo=  $mostrar['correo'] ;
    }    
    ?>
       
       <form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Nombre</label>
    <input type="text" class="form-control " id="validationDefault01" value="<?php echo $nom ?>" name="txtnom" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="validationDefault02" value="<?php echo $ap?>" name="txtapellido" autocomplete="off" required>
  </div>
  <input type="hidden" name="i" value="<?php echo $i?>">
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Teléfono</label>
    <input type="number" class="form-control" id="validationDefault03"  value="<?php echo $tel?>" name="txttelefono"autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationDefault04"  value="<?php echo $correo?>" name="txtcorreo" autocomplete="off"required>
    <input type="text"  value=" <?php echo $cod  ?>" style="visibility: hidden;" name="txtcodigo" required>
  </div>
  </div>
</div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

