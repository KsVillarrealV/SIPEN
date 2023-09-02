

<?php if (isset($_GET['e_edificio'])){$eliminar= $_GET['e_edificio'];
?> 
 <script>
 $(document ).ready(function() {
   $('#ModalEliminar').modal('show')
});
</script>
<?php
}
if (isset($_GET['e_cliente'])){$eliminar= $_GET['e_cliente']; 
?> 
<script>
 $(document ).ready(function() {
   $('#ModalEliminar').modal('show')
});
</script>
<?php
}
if (isset($_GET['e_producto'])){$eliminar= $_GET['e_producto']; 
    ?> 
    <script>
     $(document ).ready(function() {
       $('#ModalEliminar').modal('show')
    });
    </script>
    <?php
    }
    if (isset($_GET['e_proveedor'])){$eliminar= $_GET['e_proveedor']; 
        ?> 
        <script>
         $(document ).ready(function() {
           $('#ModalEliminar').modal('show')
        });
        </script>
        <?php
}
?> 
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="modal fade" id="ModalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
      <div class="modal-body text-center">
      
      <i class="fa-solid fa-triangle-exclamation fa-5x"></i>
   <h3>¿Realmente desea eliminar?</h3>
   <input type="hidden" value="<?php echo $eliminar?> "name="elim">
   <input type="hidden" name="i" value="<?php echo $i?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>