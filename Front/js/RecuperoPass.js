var servidor = "http://localhost:777";

function RecuperoPass(){

   if( document.getElementById("mailLaboral").value != ""){
    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Emails/RecuperoPass', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                


            }
            else {
              
            }
        }
    }

    fileContent.append("MAIL", document.getElementById("mailLaboral").value);

    xmlhttp.send(fileContent);

    Swal.fire({
        confirmButtonText: 'OK',
        title: 'Se ha envido un email para el cambio de la contraseña',
      }).then((result) => {

        window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Usuarios/Login.php";
      })

    }else{

        Swal.fire({
            title: 'Por favor ingrese su mail',
          })
    }

}

function validarPass(){
  

    if(document.getElementById("Pass").value != "" && document.getElementById("lblToken").value != "")
    {
         if(document.getElementById("Pass").value == document.getElementById("Pass2").value)
         {

            CambiarPass();
         }
         else{

            Swal.fire({
                title: 'Las contraseñas no coinciden',
              })
         }



    }
    else{
        Swal.fire({
            title: 'Debe conpletar todos los campos',
          })

    }
    
    
}


function CambiarPass(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", servidor + '/Emails/GetValidarToken/'+(document.getElementById("lblToken").value)+'/'+(document.getElementById("Pass").value), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            if (xmlhttp.status == 200) {
                //alert(xmlhttp.responseText);
                var id;
                var json = JSON.parse(xmlhttp.responseText);
                if(json == "0")
                {
                    Swal.fire({
                        title: 'Token invalido',
                      })
                }
                else
                {

                    

                    Swal.fire({
                        title: 'Se ha modificado la contraseña',
                      })
                }

                
            }
            else {
                alert("ocurrio un error");
            }
        }
    }


    
    xmlhttp.send();



}

