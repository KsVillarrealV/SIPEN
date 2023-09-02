
<!-- Modal agregar cliente-->
<div class="modal fade" id="exampleModal22" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Agregar cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
               
<div class="container">

<form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Nombre</label>
    <input type="text" class="form-control " id="validationDefault01" name="txtnombre" autocomplete="off" required>
    <input type="hidden" name="i" value="<?php echo $i?>">
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Apellido</label>
    <input type="text" class="form-control " id="validationDefault01" name="txtapellido" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Teléfono</label>
    <input type="number" class="form-control" id="validationDefault02" name="txttelefono" autocomplete="off" required>
  </div>
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationDefault03" name="txtcorreo" autocomplete="off" required>
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
</div>
</form>  

<!-- Modal agregar edificio-->
<div class="modal fade" id="exampleModal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Agregar Edificio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Nit</label>
    <input type="number" class="form-control " id="validationDefault01" name="txtid" autocomplete="off" required>
  </div>
  <input type="hidden" name="i" value="<?php echo $i?>">
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationDefault02" name="txtrazon" autocomplete="off" required>
  </div>
 
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Teléfono</label>
    <input type="number" class="form-control" id="validationDefault03" name="txttelefono" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationDefault04"  name="txtcorreo" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault05" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="validationDefault05"  name="txtdireccion" autocomplete="off" required>
    <input type="hidden" class="form-control" id="validationDefault05" value="1" name="txtrol"required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault06" class="form-label">Administradores</label>
    <select class="form-select" id="validationDefault06" name="txtadmin"required>
    
    <?php
  include('config/connect.php');
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Modal agregar proveedores-->
<div class="modal fade" id="exampleModal4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Agregar Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<div class="container">

<form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Nit</label>
    <input type="number" class="form-control " id="validationDefault01"  maxlength="11" name="nit_prov" autocomplete="off" required>
    <input type="hidden" name="i" value="<?php echo $i?>">
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationDefault02" name="razon_prov" autocomplete="off" required>
  </div>
 
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Teléfono</label>
    <input type="number" class="form-control" id="validationDefault03" name="tel_prov" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationDefault04"  name="correo_prov" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault05" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="validationDefault05"  name="dir_prov"required>
   
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


<!-- Modal agregar producto-->
<div class="modal fade" id="exampleModal3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
<div class= "modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Agregar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
               
<div class="container-sm border ">

<form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<?php $numero=mt_rand(1,10000);?>

<input type="hidden" value="<?php echo $numero?>" name="txtcd">
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Referencia</label>
    <input type="text" class="form-control " id="validationDefault01" name="txtreferencia" autocomplete="off"required>
    <input type="hidden" name="i" value="<?php echo $i?>">
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Marca</label>
    <input type="text" class="form-control " id="validationDefault01" name="txtmarca" autocomplete="off"required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="validationDefault02" name="txtdes" autocomplete="off" required>
  </div>
    <div class="col-md-4 w-100">
    <label for="validationDefault03" class="form-label">Cantidad</label>
    <input type="number" class="form-control" id="validationDefault03" name="txtcant" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault04" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="validationDefault04"  name="txtfecha" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault05" class="form-label">Caracteristicas</label>
    <input type="text" class="form-control" id="validationDefault05"  name="txtcar" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault05" class="form-label">Precio</label>
    <input type="text" class="form-control" id="validationDefault05"  name="txtprecio" autocomplete="off"required>
  </div>
  <div class="col-md-3 w-100">
    <label for="validationDefault06" class="form-label">Proveedor</label>
    <select class="form-select" id="validationDefault06" name="txtprov"required>
    <?php
include('config/connect.php');
$registros = mysqli_query($conexion, "select nit_proveedor,nombre from proveedores ") or
die("Problemas en el select:" . mysqli_error($conexion));
while ($reg = mysqli_fetch_array($registros)) {
echo "<option value=\"$reg[nit_proveedor]\">$reg[nombre]</option>";
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
</div>
</form>  

<!-- Modal agregar productos cotizacion-->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Buscar productos</h5>
        

        <button class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
      <form id="custom-search-form" class="form-search form-horizontal pull-right">
                <div class="input-append span12">
                    <input type="text" class="search-query" placeholder="Buscar" id="q" name="q" onkeyup="load(1)">
                    <button type="button" class="btn" onclick="load(1)"><i class="icon-search"></i></button>
                </div>
            </form>

      </div>
      <div id="loader" style="position: absolute;	text-align: center;	top: 25px;	width: 80%;display:none;"></div><!-- Carga gif animado -->
<div class="outer_div" ></div><!-- Datos ajax Final -->
      <div class="modal-footer">
      <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

</div>

  
  

