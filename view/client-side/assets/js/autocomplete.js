$(function() {
    $("#nombre_cliente").autocomplete({
        source: "./load_ajax/autocomplete/clientes.php",
        minLength: 2,
        select: function(event, ui) {
            event.preventDefault();
            $('#id_cliente').val(ui.item.nit);
            $('#nombre_cliente').val(ui.item.nombre);
            $('#tel1').val(ui.item.tel_edificio);
            $('#mail').val(ui.item.correo_edificio);
            $('#direccion').val(ui.item.direccion);	
         }
    });
});
$("#nombre_cliente" ).on( "keydown", function( event ) {
    if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
    {
        $("#id_cliente" ).val("");
        $("#tel1" ).val("");
        $("#mail" ).val("");
        $("#direccion" ).val("");				
    }
    if (event.keyCode==$.ui.keyCode.DELETE){
        $("#nombre_cliente" ).val("");
        $("#id_cliente" ).val("");
        $("#tel1" ).val("");
        $("#mail" ).val("");
        $("#direccion" ).val("");
    }
});	
