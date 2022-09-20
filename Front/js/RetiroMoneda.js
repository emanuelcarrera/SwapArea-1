var servidor = "http://localhost:777";


function AceptarRetiro(){


    if(  document.getElementById("txtMonto").value != ""  &&  document.getElementById("txtCBU").value != ""){

    if( parseInt(document.getElementById("txtMonto").value) <=  parseInt(document.getElementById("hmonto2").innerHTML)  ){

    var xmlhttp = new XMLHttpRequest();
     
    xmlhttp.open("POST", servidor + '/Usuarios/SetTokenMoneda', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            if (xmlhttp.status == 200) {

                Swal
                .fire({
                    title: "Se envio un Token de validacion a su email",
                    input: "text",
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar",
                })
                .then(resultado => {
                    if (resultado.value) {
                        ValidarToken(resultado.value);
                    }else{

                        Swal
                        .fire({
                            icon :'error',
                        })
                    }
                });
            }

        }
    }
    var obje = new FormData();
    obje.append("id", localStorage.getItem('id'));
  
    //envio el mensaje    
    xmlhttp.send(obje);
    }else{

        Swal
        .fire({
            title: "Monto mayor al saldo disponible"
        })
 
    } 

    }else{
        Swal
        .fire({
            title: "Complete los campos"
        })

    }

}
function ValidarToken(valid){
    var xmlhttp = new XMLHttpRequest();
     
    xmlhttp.open("Get", servidor + '/Usuarios/getTokenMoneda/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
                json.map(function(token){
                
                    if(token.Token == valid)
                    {
                        OK();

                    }
                    else{

                        Swal
                        .fire({
                            title: "Token invalido",
                            icon :'error',
                        })
                    }

                });
            }

        }
    }
    xmlhttp.send();

}


function OK(){
    var xmlhttp = new XMLHttpRequest();
     
    xmlhttp.open("POST", servidor + '/Usuarios/RetiroSaldo', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            if (xmlhttp.status == 200) {
                Swal
                .fire({
                    icon :'success',
                })
                GetMonto();
            }

        }
    }
    var obje = new FormData();
    obje.append("id", localStorage.getItem('id'));
    obje.append("saldo", document.getElementById("txtMonto").value);
    //envio el mensaje    
    xmlhttp.send(obje);
  

}