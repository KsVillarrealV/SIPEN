
         function agregar (id)
         {
             var precio_venta=document.getElementById('precio_venta_'+id).value;
             var cantidad=document.getElementById('cantidad_'+id).value;
             //Inicia validacion
             if (isNaN(cantidad))
             {
             alert('Esto no es un numero');
             document.getElementById('cantidad_'+id).focus();
             return false;
             }
             if (isNaN(precio_venta))
             {
             alert('Esto no es un numero');
             document.getElementById('precio_venta_'+id).focus();
             return false;
             }
             //Fin validacion
             
             $.ajax({
         type: "POST",
         url: "./load_ajax/add_prod_cot.php",
         data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
          beforeSend: function(objeto){
             $("#resultados").html("Mensaje: Cargando...");
           },
         success: function(datos){
         $("#resultados").html(datos);
         }
             });
         }
         
             function eliminar (id)
         {
             
             $.ajax({
         type: "GET",
         url: "./load_ajax/add_prod_cot.php",
         data: "id="+id,
          beforeSend: function(objeto){
             $("#resultados").html("Mensaje: Cargando...");
           },
         success: function(datos){
         $("#resultados").html(datos);
         }
             });
 
         }
         
         $("#datos_cotizacion").submit(function(){
   var atencion = $("#atencion").val();
   var tel1 = $("#tel1").val();
   var empresa = $("#empresa").val();
   var tel2 = $("#tel2").val();
   var email = $("#email").val();
   var condiciones = $("#condiciones").val();
   var validez = $("#validez").val();
   var entrega = $("#entrega").val();
   var vendedor= $("#vendedor").val();
 
   VentanaCentrada('./pdf/documentos/cotizacion_pdf.php?atencion='+atencion+'&tel1='+tel1+'&empresa='+empresa+'&tel2='+tel2+'&email='+email+'&condiciones='+condiciones+'&validez='+validez+'&entrega='+entrega+'&vendedor='+vendedor,'Cotizacion','','1024','768','true');
  
 });