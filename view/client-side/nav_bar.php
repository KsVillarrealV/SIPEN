<style>
  .navbar{
    position: relative;
  }
</style>

<nav class="navbar navbar-expand-lg bg-light position-sticky">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/img/logo.png" alt="Bootstrap" width="150" height="50">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <div class="btn-group">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 200px;">          
            <a href="edificios.php?i=<?php echo $i ?>"class="btn btn-outline-primary " aria-current="page"><i class="fa-solid fa-building"></i> Edificios</a>
        <a href="clientes.php?i=<?php echo $i ?>" class="btn btn-outline-primary "><i class="fa-solid fa-people-group"></i> Clientes</a>
        <a href="proveedores.php?i=<?php echo $i ?>" class="btn btn-outline-primary " aria-current="page"><i class="fa-solid fa-truck"></i> Proveedores</a>
        <a href="productos.php?i=<?php echo $i ?>" class="btn btn-outline-primary"> <i class="fa-solid fa-cubes-stacked"></i> Inventario</a>
        <a href="cotizacion.php?i=<?php echo $i ?>" class="btn btn-outline-primary"><i class="fa-solid fa-file"></i> Cotización</a>
      </ul>
      </div>
      
            </div>
          </div>
        </div>
         <ul class="nav justify-content-end ">
        <div class="btn-group mr-1">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa-solid fa-circle-user fa-1x"></i> <?php echo $i ?>
  
  </button>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modalperfil" href="#">Editar perfil</a></li>
    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modalcontrasena" href="#">Cambiar clave</a></li>
    <li><a class="dropdown-item " href="login.php?logout"> Cerrar sesión</a></li>
    
  </ul>
</div>
 </ul>
      </nav>

      

