
<!-- Modal editar perfil-->
<?php 

if (isset($_GET['i'])){$i= $_GET['i'];}?>
<div class="modal fade" id="Modalperfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Editar perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">   
<div class="container">
<?php
include('config/connect.php');
 $sql="select * from  users where user_name='$i' || user_email='$i'";
$result = mysqli_query($conexion,$sql);
    ?>
     <?php       
while($mostrar=mysqli_fetch_array($result))

{  $cod =  $mostrar['cod_user'];
    $nombre =  $mostrar['firstname'];
    $apellido =$mostrar['lastname'];
    $usuario = $mostrar['user_name'] ;
    $correo = $mostrar['user_email'] ;
    }    
    ?>
       <form class="row g-2" method="POST" action="../../model/modificar_perfil.php"> 
  <div class="col-12" >
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Nombre</label>
    <input type="text" class="form-control " id="validationDefault01" value="<?php echo $nombre ?>" name="txtnombre" autocomplete="off" required>
    <input type="hidden" value=" <?php echo $cod ?>" name="confir" >
    <input type="hidden" name="i" value="<?php echo $i?>">
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Apellido</label>
    <input type="text" class="form-control " id="validationDefault01" value="<?php echo $apellido ?>" name="txtapellido" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault01" class="form-label">Usuario</label>
    <input type="text" class="form-control " id="validationDefault01" value="<?php echo $usuario?>" name="usuario" autocomplete="off" required>
  </div>
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Correo</label>
    <input type="email" class="form-control" id="validationDefault02" value="<?php echo $correo?>" name="txtcorreo" autocomplete="off" required>
  </div>
  </div>
</div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Editar perfil</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Modal cambiar contraseña-->

<div class="modal fade" id="Modalcontrasena" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Cambiar clave</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> 
       <form class="row g-2" method="POST" action="../../model/cambiar_clave.php"> 
  <div class="col-12" >
  
  <div class="col-md-4 w-100 ">
    <label for="validationDefault01" class="form-label">Clave nueva</label>
    <input type="password" class="form-control " id="txtPassword" name="txtpassword" style=" margin-bottom: 3%;" autocomplete="off" required>
    <div id="strengthMessage" style=" margin-bottom: 3%;"></div>
  </div>
  <input type="hidden" name="i" value="<?php echo $i?>">
  <div class="col-md-4 w-100">
    <label for="validationDefault02" class="form-label">Confirmar clave</label>
    <input type="password" class="form-control" id="txtconfirmPassword" name="txtconfir" min="6" max="10" autocomplete="off" required>
  </div>
</div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar clave</button>
      </div>
    </div>
  </div>
</div>
</form>







