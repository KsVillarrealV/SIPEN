<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection

require_once("config/db.php");

// load the login class
require_once("../../model/Login.php");


if (isset($_POST['user_name'])){$i= $_POST['user_name'];
  
}

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.

   header("location: edificios.php?b&i=$i");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    ?>
	<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Sipen | Inicio</title>
	<!-- Latest compiled and minified CSS -->
  <link rel="icon" href="assets/img/icono.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="asset/js/jquery-3.3.1.slim.min.js"></script>
    <link href="assets/css/CheckPassword.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/501389644c.js" crossorigin="anonymous"></script>
  
  <!-- CSS  -->
   <link href="assets/css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <style>
     body, html{
  height: 100%;
  background-repeat: no-repeat;
  /*background-image: linear-gradient(135deg, rgba(31,123,229,1) 0%, rgba(58,139,232,1) 47%, rgba(70,153,234,1) 92%, rgba(72,156,234,1) 100%);*/
  background: url(assets/img/login.png) no-repeat center center fixed;
  background-size: 100% 100%;
}
  </style>
<?php
if (isset($_GET['alert'])){
	?>
  <script>
	$(document ).ready(function() {
	  $('#Modalregistrarme').modal('show')
  });
  </script>
	 <?php
	}

?>
<a href="../../index.html" type="button" style="margin-top: 2%;margin-left:2%" class="btn btn-outline-light"><i class="fa-solid fa-left-long"></i> Atras</a>
 <div class="container">

        <div class="card card-container" >
            <img id="profile-img" class="profile-img-card" src="assets/img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
            <?php
if (isset($_GET['alert1'])){
	?>
  <div class="alert alert-success  mt-3 text-center" role="alert">
				!Clave modificada exitosamente¡ 
			  </div>
	 <?php
	}
  require_once("../../model/olvidoClave.php");
require_once("../../model/conf_credencial.php");
?>
      <?php
			if (isset($_GET['correcto'])){
				?>
			  <div class="alert alert-success  mt-3" role="alert">
			   !Registro exitoso¡ Inicia sesión para continuar.
			  </div>
			  <?php
			  }
			  if (isset($_GET['alert2'])){
				?>
				<div class="alert alert-danger  mt-3" role="alert">
				!Alerta¡ Las claves no coinciden.
			  </div>
			  <?php
        }
        	if (isset($_GET['exito'])){
            ?>
            <div class="alert alert-success  mt-3" role="alert">
            !Perfil modificado exitosamente¡ 
            </div>
            <?php
			  }
				// show potential errors / feedback (from login object)
				if (isset($login)) {
					if ($login->errors) {
						?>
						<div class="alert alert-danger alert-dismissible text-center " role="alert">
              <i class="fa-solid fa-face-frown-open fa-4x "></i><br>
						<?php 
						foreach ($login->errors as $error) {
             
               echo $error;
						}
						?>
						</div>
						<?php
					}
					if ($login->messages) {
						?>
						<div class="alert alert-success alert-dismissible text-center" role="alert">
            <i class="fa-solid fa-user-slash fa-4x"></i><br>
						<?php
						foreach ($login->messages as $message) {
							echo $message;
						}
						?>
						</div> 
						<?php 
					}
				}
				?>
				
                <span id="reauth-email" class="reauth-email"></span>
				<label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope"></i> Correo y/o Usuario</label>
                <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
				<label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock"></i> Clave</label>
                <input class="form-control" placeholder="Clave" name="user_password" type="password" value="" autocomplete="off" required>
				<h6>¿Necesito una cuenta? <a href="" data-bs-toggle="modal" data-bs-target="#Modalconfirmar">
  Registrarme</a></h6>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin" name="login" id="submit">Iniciar Sesión</button>
				<a href="#"><h6 data-bs-toggle="modal" data-bs-target="#olvidoclave"  id="olvidar">¿Se te olvidó tu clave?</h6></a>
            </form><!-- /form -->

                  
<!-- Modal olvido contraseña credencial y correo-->   
<form class="row g-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
<div class="modal fade" id="olvidoclave" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" > 
      <div class="alert alert-primary text-center" role="alert">
      Si olvido su clave por favor ingrese su correo y credencial.
</div>
        <div class="col-12" >
        <div class="mb-3">
  <input type="email" class="form-control "  placeholder="Correo electronico" name="txtemail"  autocomplete="off" required>
</div>
<div class="mb-3">
  <input type="number" class="form-control mt-3"  placeholder="Credencial" name="txtcredencial" autocomplete="off" required>
</div>
  </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
        </div>
  </div>
</div>
</form>




<!-- Modal registrar usuario-->
<div class="modal fade" id="Modalregistrarme" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
<div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
		<legend>Registrarme</legend>
     
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php
	  
if (isset($_GET['alert1'])){
  ?>
  
<div class="alert alert-danger  mt-3" role="alert">
  !Alerta¡ Este usuario ya se encuentra registrado.
</div>
   <?php
  }
 
  if (isset($_GET['alert2'])){
  ?>
  <div class="alert alert-danger  mt-3" role="alert">
  !Alerta¡ Las claves no coinciden.
</div>
<?php
}
?>
      <div class="modal-body">
            <form class="row "method="POST" action="../../model/Registrarme.php">
            <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="exampleInputText1"  name="txtnombre" required >
  </div>
  <input type="hidden" value="<?php echo $credencial;?>" name="txtcred">
  <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="exampleInputText1"  name="txtapellido" required >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txtusuario"required  >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="txtcorreo"required  >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Clave</label>
    <input type="password" class="form-control" id="txtPassword" name="txtpassword" autofocus="autofocus" min="6" required>
    <div id="strengthMessage"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirmar clave</label>
    <input type="password" class="form-control" id="txtConfirmPassword" name="txtconfir" min="6" max="10" required>
  </div>

</div>
<div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              <a href= ""class= btn-primary data-bs-toggle=modal data-bs-target="#exampleModal">Terminos y condiciones.</a>
            </label>
            </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Registrarme</button>
      </div>
    </div>
  </div>
  </div>
  </form>



<!-- Modal olvido clave - cambio-->  
<form class="row g-2" method="POST" action="../../model/olvidar.php"> 
<div class="modal fade" id="Modalolvidoclave" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">  
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Registrar clave</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"  > 
  <div class="col-12" >
    <input type="hidden" value=" <?php echo $credencial?>" name="txtcredencial">
  
  <div class="mb-3">
    <label for="validationDefault01" class="form-label">Clave nueva</label>
    <input type="password" class="form-control " id="txtPassword" name="txtpass" style=" margin-bottom: 3%;" autocomplete="off" required>
    <div id="strengthMessage" style=" margin-bottom: 5%;"></div>
  </div>
  <div class="mb-3">
    <label for="validationDefault02" class="form-label " >Confirmar clave</label>
    <input type="password" class="form-control" id="txtConfirmPassword"  name="txtconfir" min="6" max="10" autocomplete="off" required>
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


		<!-- Modal credencial-->	
  
  <div class="modal fade" id="Modalconfirmar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar de credencial.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="alert alert-success  mt-3 text-center" role="alert">
      <i class="fa-solid fa-credit-card fa-4x"></i><br>
      ! Notificación ¡Si usted hace parte de esta empresa por favor pedir su credencial al administrador antes de continuar con el registro.
</div> 
<form action="login.php" method="post">
      <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Ingresa una credencial</label>
    <input type="text" class="form-control" id="exampleInputText1"  name="credencial" autocomplete="off" required >
    
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Continuar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal terminos y condiciones-->
  <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Terminos y condiciones</h1>
            </div>
            <div class="modal-body">
            Términos y condiciones
¡Bienvenido a Sistemas de Información Para Empresas y Negocios!
Estos términos y condiciones describen las reglas y regulaciones para el uso del sitio web de SIPEN, ubicado en sipen00webhost.com.
Al acceder a este sitio web, asumimos que aceptas estos términos y condiciones. No continúes usando Sistemas de Información Para Empresas y Negocios si no estás de acuerdo con todos los términos y condiciones establecidos en esta página.
Cookies:
El sitio web utiliza cookies para ayudar a personalizar tu experiencia en línea. Al acceder a Sistemas de Información Para Empresas y Negocios, aceptaste utilizar las cookies necesarias.
Una cookie es un archivo de texto que un servidor de páginas web coloca en tu disco duro. Las cookies no se pueden utilizar para ejecutar programas o enviar virus a tu computadora. Las cookies se te asignan de forma exclusiva y solo un servidor web en el dominio que emitió la cookie puede leerlas.
Podemos utilizar cookies para recopilar, almacenar y rastrear información con fines estadísticos o de marketing para operar nuestro sitio web. Tienes la capacidad de aceptar o rechazar cookies opcionales. Hay algunas cookies obligatorias que son necesarias para el funcionamiento de nuestro sitio web. Estas cookies no requieren tu consentimiento ya que siempre funcionan. Ten en cuenta que al aceptar las cookies requeridas, también aceptas las cookies de terceros, que podrían usarse a través de servicios proporcionados por terceros si utilizas dichos servicios en nuestro sitio web, por ejemplo, una ventana de visualización de video proporcionada por terceros e integrada en nuestro sitio web.
Licencia:
A menos que se indique lo contrario, SIPEN y/o sus licenciantes poseen los derechos de propiedad intelectual de todo el material en Sistemas de Información Para Empresas y Negocios. Todos los derechos de propiedad intelectual son reservados. Puedes acceder desde Sistemas de Información Para Empresas y Negocios para tu uso personal sujeto a las restricciones establecidas en estos términos y condiciones.
No debes:
Copiar o volver a publicar material de Sistemas de Información Para Empresas y Negocios
Vender, alquilar o sublicenciar material de Sistemas de Información Para Empresas y Negocios
Reproducir, duplicar o copiar material de Sistemas de Información Para Empresas y Negocios
Redistribuir contenido de Sistemas de Información Para Empresas y Negocios
Este acuerdo comenzará el fecha presente.
Partes de este sitio web ofrecen a los usuarios la oportunidad de publicar e intercambiar opiniones e información en determinadas áreas. SIPEN no filtra, edita, publica ni revisa los comentarios antes de su presencia en el sitio web. Los comentarios no reflejan los puntos de vista ni las opiniones de SIPEN, sus agentes y/o afiliados. Los comentarios reflejan los puntos de vista y opiniones de la persona que publica. En la medida en que lo permitan las leyes aplicables, SIPEN no será responsable de los comentarios ni de ninguna responsabilidad, daños o gastos causados ​​o sufridos como resultado de cualquier uso o publicación o apariencia de comentarios en este sitio web.
SIPEN se reserva el derecho de monitorear todos los comentarios y eliminar los que puedan considerarse inapropiados, ofensivos o que incumplan estos Términos y Condiciones.
Garantizas y declaras que:
Tienes derecho a publicar comentarios en nuestro sitio web y tienes todas las licencias y consentimientos necesarios para hacerlo;
Los comentarios no invaden ningún derecho de propiedad intelectual, incluidos, entre otros, los derechos de autor, patentes o marcas comerciales de terceros;
Los comentarios no contienen ningún material difamatorio, calumnioso, ofensivo, indecente o ilegal de otro modo, que sea una invasión de la privacidad.
Los comentarios no se utilizarán para solicitar o promover negocios o actividades comerciales personalizadas o presentes o actividades ilegales.
Por la presente, otorgas a SIPEN una licencia no exclusiva para usar, reproducir, editar y autorizar a otros a usar, reproducir y editar cualquiera de tus comentarios en todas y cada una de las formas, formatos, o medios.
Hipervínculos a nuestro contenido:
Las siguientes organizaciones pueden vincularse a nuestro sitio web sin aprobación previa por escrito:
Agencias gubernamentales;
Motores de búsqueda;
Organizaciones de noticias;
Los distribuidores de directorios en línea pueden vincularse a nuestro sitio web de la misma manera que hacen hipervínculos a los sitios web de otras empresas que figuran en la lista; y
Empresas acreditadas en todo el sistema, excepto que soliciten organizaciones sin fines de lucro, centros comerciales de caridad y grupos de recaudación de fondos de caridad que no pueden hacer hipervínculos a nuestro sitio web.
Estas organizaciones pueden enlazar a nuestra página de inicio, a publicaciones o a otra información del sitio siempre que el enlace: (a) no sea engañoso de ninguna manera; (b) no implique falsamente patrocinio, respaldo o aprobación de la parte vinculante y sus productos y/o servicios; y (c) encaja en el contexto del sitio de la parte vinculante.
Podemos considerar y aprobar otras solicitudes de enlaces de los siguientes tipos de organizaciones:
fuentes de información de consumidores y/o empresas comúnmente conocidas;
sitios de la comunidad .com;
asociaciones u otros grupos que representan organizaciones benéficas;
distribuidores de directorios en línea;
portales de Internet;
firmas de contabilidad, derecho y consultoría; y
instituciones educativas y asociaciones comerciales.
Aprobaremos las solicitudes de enlace de estas organizaciones si: (a) el enlace no nos haría vernos desfavorablemente a nosotros mismos ni a nuestras empresas acreditadas; (b) la organización no tiene registros negativos con nosotros; (c) el beneficio para nosotros de la visibilidad del hipervínculo compensa la ausencia de SIPEN; y (d) el enlace está en el contexto de información general de recursos.
Estas organizaciones pueden enlazar a nuestra página de inicio siempre que el enlace: (a) no sea engañoso de ninguna manera; (b) no implique falsamente patrocinio, respaldo o aprobación de la parte vinculante y sus productos o servicios; y (c) encaja en el contexto del sitio de la parte vinculante.
Si eres una de las organizaciones enumeradas en el párrafo 2 y estás interesada en vincularte a nuestro sitio web, debes informarnos enviando un correo electrónico a SIPEN. Incluye tu nombre, el nombre de tu organización, la información de contacto, así como la URL de tu sitio, una lista de las URL desde las que tienes la intención de vincular a nuestro sitio web y una lista de las URL de nuestro sitio a las que te gustaría acceder. Espera 2-3 semanas para recibir una respuesta.
Las organizaciones aprobadas pueden hacer hipervínculos a nuestro sitio web de la siguiente manera:
Mediante el uso de nuestro nombre corporativo; o
Mediante el uso del localizador uniforme de recursos al que se está vinculando; o
Usar cualquier otra descripción de nuestro sitio web al que está vinculado que tenga sentido dentro del contexto y formato del contenido en el sitio de la parte vinculante.
No se permitirá el uso del logotipo de SIPEN u otro material gráfico para vincular sin un acuerdo de licencia de marca comercial.
Responsabilidad del contenido:
No seremos responsables de ningún contenido que aparezca en tu sitio web. Aceptas protegernos y defendernos contra todas las reclamaciones que se presenten en tu sitio web. Ningún enlace(s) debe aparecer en ningún sitio web que pueda interpretarse como difamatorio, obsceno o criminal, o que infrinja, de otra manera viole o defienda la infracción u otra violación de los derechos de terceros.
Reserva de derechos:
Nos reservamos el derecho de solicitar que elimines todos los enlaces o cualquier enlace en particular a nuestro sitio web. Apruebas eliminar de inmediato todos los enlaces a nuestro sitio web cuando se solicite. También nos reservamos el derecho de modificar estos términos y condiciones y su política de enlaces en cualquier momento. Al vincular continuamente a nuestro sitio web, aceptas estar vinculado y seguir estos términos y condiciones de vinculación.
Eliminación de enlaces de nuestro sitio web:
Si encuentras algún enlace en nuestro sitio que sea ofensivo por cualquier motivo, puedes contactarnos e informarnos en cualquier momento. Consideraremos las solicitudes para eliminar enlaces, pero no estamos obligados a hacerlo ni a responder directamente.
No nos aseguramos de que la información de este sitio web sea correcta. No garantizamos su integridad o precisión, ni prometemos asegurarnos de que el sitio web permanezca disponible o que el material en el sitio se mantenga actualizado.
Exención de responsabilidad:
En la medida máxima permitida por la ley aplicable, excluimos todas las representaciones, garantías y condiciones relacionadas con nuestro sitio web y el uso de este. Nada en este descargo de responsabilidad:
limitará o excluirá nuestra responsabilidad o la tuya por muerte o lesiones personales;
limitará o excluirá nuestra responsabilidad o la tuya por fraude o tergiversación fraudulenta;
limitará cualquiera de nuestras responsabilidades o las tuyas de cualquier manera que no esté permitida por la ley aplicable; o
excluirá cualquiera de nuestras responsabilidades o las tuyas que no puedan estar excluidas según la ley aplicable.
Las limitaciones y prohibiciones de responsabilidad establecidas en esta sección y en otras partes de este descargo de responsabilidad: (a) están sujetas al párrafo anterior; y (b) regirá todas las responsabilidades que surjan en virtud de la exención de responsabilidad, incluidas las responsabilidades que surjan en el contrato, en agravio y por incumplimiento de la obligación legal.
Siempre que el sitio web y la información y los servicios en el sitio se proporcionen de forma gratuita, no seremos responsables de ninguna pérdida o daño de cualquier naturaleza.

            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary"data-bs-toggle="modal" data-bs-target="#Modalregistrarme">Acepto</button>
      </div>
          </div>
            <div class="invalid-feedback">
              Aceptar terminos de condidciones.
            </div>
          </div>



          <script>

            (() => {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()


          </script>

            
        </div><!-- /card-container -->
    </div><!-- /container -->
    
	<script src="assets/js/CheckPassword.js"></script>
<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
	<?php
}


