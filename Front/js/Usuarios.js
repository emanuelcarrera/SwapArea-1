addEventListener("load", load)
var servidor = "http://localhost:777";

//var servidor = "https://edi3carreraback.herokuapp.com";



function $(valor) {
    return document.getElementById(valor);
}


function load() {
    

   $("btnAceptar").addEventListener("click",ValidarNombreMail);

    
}



function ValidarNombreMail() {

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("POST", servidor + '/Usuarios/ValidarNombreMail', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);

                 if(json.NombreUsuario == "1")
                 {
                    Swal.fire({
                        title: 'Nombre de usuario ya esta siendo usado',
                      })

                 }
                 if(json.Mail == "1")
                 {
                    Swal.fire({
                        title: 'El email ya se encutra registrado en la pagina use otro',
                      })

                 }

                 if(json.NombreUsuario == "0" && json.Mail == "0")
                 {
                    AltaUsuario();

                 }

                //GETDomicilio();
            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    var obje = new FormData();
    obje.append("nombre", $("txtNombreUsuario").value  );
    obje.append("mail", $("txtEmail").value );
    xmlhttp.send(obje);

}



function AltaUsuario(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("POST", servidor + '/Usuarios/Alta', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            if (xmlhttp.status == 200) {
                //alert(xmlhttp.responseText);

                
            }
            else {
                Swal.fire({
                    title: 'ocurrio un error',
                  })
            }
        }
    }
     
    if($("txtNombreUsuario").value === null || $("txtNombreUsuario").value === "")
    {
        Swal.fire({
            title: 'Nombre de usuario Obligatorio',
          })
    }
    else if ($("txtpass").value === null || $("txtpass").value === "") {
        
        Swal.fire({
            title: 'Contraseña Obligatoria',
          })
    } 
    else if ($("txtpass").value != $("txtpass2").value) {
        
        Swal.fire({
            title: 'Las contraseñas no coinciden',
          })
    } 
    else if ($("txtNombre").value === null || $("txtNombre").value === "") {
        Swal.fire({
            title: 'Nombre Obligatorio',
          })
    } 
    else if ($("txtApellido").value === null || $("txtApellido").value === "") {
        Swal.fire({
            title: 'Apellido Obligatorio',
          })
    } 
    else if ($("txtEdad").value === null || $("txtEdad").value === "") {
        Swal.fire({
            title: 'Edad Obligatorio',
          })
    } 
    else if ($("txtDni").value === null || $("txtDni").value === "") {
        Swal.fire({
            title: 'Descripcion Obligatorio',
          })
    } 
    else if ($("txtTelefono").value === null || $("txtTelefono").value === "") {
        Swal.fire({
            title: 'Telefono Obligatorio',
          })
    } 
    else{

    var obje = new FormData();
    obje.append("Nombre", $("txtNombre").value );
    obje.append("Apellido", $("txtApellido").value );
    obje.append("NombreUsuario", $("txtNombreUsuario").value );
    obje.append("Mail", $("txtEmail").value );
    obje.append("Edad", $("txtEdad").value );
    obje.append("dni", $("txtDni").value );
    obje.append("Contrasenia", $("txtpass").value );
    obje.append("Telefono", $("txtTelefono").value );
    //envio el mensaje    
    xmlhttp.send(obje);

    Swal.fire({
        title: 'Usuaruario Creado',
        confirmButtonText: 'OK',
        confirmButtonColor: '#28a745',
      }).then((result) => {

        if (result.isConfirmed) {
           
            window.location.href = "../Usuarios/Login.php";

        } 
      
      })
    $("txtNombre").value = "";
    $("txtApellido").value = "";
    $("txtNombreUsuario").value = "";
    $("txtEmail").value = "";
    $("txtEdad").value = "";
    $("txtDni").value  ="";
    $("txtpass").value  ="";
    $("txtpass2").value  ="";
    $("txtTelefono").value  ="";
    }

}
