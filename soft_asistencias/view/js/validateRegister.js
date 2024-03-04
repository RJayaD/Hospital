/*var usuarioExistente = false;

$("#usuario").change(function(){
    var usuario = $("#usuario").val();
    var datos = new FormData();
    datos.append("validarUsuario", usuario);
    $.ajax({
        url:"view/modules/ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            //console.log(respuesta);
            if (respuesta == 0){
                $("label[for='usuarioLabel'] span").html('<p>Este usuario ya existe.</p>');
                usuarioExistente = true;
            }else{
                $("label[for='usuarioLabel'] span").html("");
            }
        }
    });
});*/
function validarRegistro(){
    var usuario = document.querySelector("#usuario").value;
    var passw = document.querySelector("#passw").value;
    var email = document.querySelector("#email").value;
    var terminos = document.querySelector("#terminos").checked;

    if (usuario != "") {
        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

      

        if (!expresion.test(usuario)){
            document.querySelector("label[for=usuarioLabel]").innerHTML+="<br>No escriba caracteres especiales";
            return false;
        }

      
    }

    if (passw != "") {
        var caracteres = passw.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres  < 6 ){
            document.querySelector("label[for='passwLabel']").innerHTML+="<br>Escriba minimo 6 caracteres.";
            return false;
        }

        if (!expresion.test(usuario)){
            document.querySelector("label[for=passwLabel]").innerHTML+="<br>No escriba caracteres especiales";
            return false;
        }
    }

    /** VALIDAR EMAIL */

    if(email != "") {
        var expresion = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

        if (!expresion.test(email)) {
            document.querySelector("label[for='emailLabel']").innerHTML+="<br> Escriba correctamente su email";
            return false;
        }
    }
    
    /** VALIDAR PRESION DE LOS TERMINOS */

    if (!terminos) {
        document.querySelector("label[for='termLabel']").innerHTML+="<br >Acepte los terminos y condiciones";
        document.querySelector("#usuario").value = usuario;
        document.querySelector("#passw").value = passw;
        document.querySelector("#email").value = email;

        return false;
    }
    return true;
}
