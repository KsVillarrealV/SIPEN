
$(document).ready(function () {
    $('#txtPassword').keyup(function () {
        $('#strengthMessage').html(checkStrength($('#txtPassword').val()))
    })
    function checkStrength(password) {
        var strength = 0
        if (password.length < 6) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Short')
            return 'Muy corta'
        }
        if (password.length > 7) strength += 1
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
        if (strength < 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Weak')
            return 'Medio'
        } else if (strength == 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Good')
            return 'Buena'
        } else {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Strong')
            return 'Muy buena'
        }
    }
});

$(document).ready(function() {
	//variables
	var pass1 = $('[name=txtpassword]');
	var pass2 = $('[name=txtconfir]');
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion');	
	}
	if(valor1.length==0 || valor1==""){
	span.text(vacio).addClass('negacion');	
	}
	if(valor1.length<6 || valor1.length>10){
	span.text(longitud).addClass('negacion');
	}
	if(valor1.length!=0 && valor1==valor2){
	span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	});
});
