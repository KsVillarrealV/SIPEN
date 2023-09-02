
 const button = document.getElementById('slide');
 button.onclick = () => {
   document.getElementById('container').scrollLeft += 20;
 };

 
$(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida tr').hide();
             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
                })
      }(jQuery));
});
         $(document).ready(function(){
            load(1);
         });
      
         function load(page){
            //var mes= $("#mes").val();
            var q= $("#q").val();
            $("#loader").fadeIn('slow');
            $.ajax({
               url:'./load_ajax/productos_factura.php?action=ajax&page='+page+'&q='+q,
                beforeSend: function(objeto){
                $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
              },
               success:function(data){
                  $(".outer_div").html(data).fadeIn('slow');
                  $('#loader').html('');
                  
               }
            })
         }

