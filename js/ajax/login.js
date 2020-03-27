$(document).ready(function(){

  function enviar(){
    var parametros =
    {
      usuario: $("#usuario").val(),
      password: $("#password").val(),
    }
    $.ajax({
        async: true, //Activar la transferencia asincronica
        type: "POST", //El tipo de transaccion para los datos
        dataType: "json", //Especificaremos que datos vamos a enviar
        contentType: "application/x-www-form-urlencoded", //Especificaremos el tipo de contenido
        url: "../../php/login.php", //Sera el archivo que va a procesar la petición AJAX
        data: parametros, //Datos que le vamos a enviar
        // data: "total="+total+"&penalizacion="+penalizacion,
        beforeSend: inicioEnvio, //Es la función que se ejecuta antes de empezar la transacción
        success: llegada, //Función que se ejecuta en caso de tener exito
        timeout: 4000,
        error: problemas //Función que se ejecuta si se tiene problemas al superar el timeout
    });
    return false;
  }
  function inicioEnvio(){
      console.log("Enviando petición de login...");
  }

  function llegada(datos){
    if(datos[0]=="Exito"){
      alert("Se actualizó la contraseña de manera exitosa, por favor inicia sesión");
      setTimeout("location.href='index.html'", 500);
    }
  }

  function problemas(){
     alert("Problemas al actualizar la contraseña, intentalo más tarde");
  }
});
