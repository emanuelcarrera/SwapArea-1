addEventListener("load", load)
var servidor = "http://localhost:777";
//var servidor = "https://backpracticapro.herokuapp.com/";



function $(valor) {
    return document.getElementById(valor);
}


function load() {
    
    //enviarMensajeAlServidor(servidor , cargarOpcionesProvincia); EnviarUsuario
   $("btnEnviar").addEventListener("click",Login);
   //$("btnEnviarUsuario").addEventListener("click",AltaUsuario);

    
}


function Login(){

    var xmlhttp = new XMLHttpRequest();

    var url = '/Usuarios/Login/'+($("NombreUsuariotxt").value) +'/'+ ( $("Contraseñatxt").value);
    xmlhttp.open("GET", servidor + '/Usuarios/Login/'+($("NombreUsuariotxt").value) +'/'+ ( $("Contraseñatxt").value) , true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            if (xmlhttp.status == 200) {
                //alert(xmlhttp.responseText);
                var id;
                var json = JSON.parse(xmlhttp.responseText);
                if(json.idUsuario == "0")
                {
                    alert("usuario o contraseña incorrectos")
                }
                else
                {
                    id = json[0].idUsuario;

                    window.localStorage.setItem('id',id);
    
                    id = localStorage.getItem('id')

                    setLog();
                    if(!(id  == "0") )
                    {
                       window.location.href = "../Articulos/BuscarArticulos.php";
                    }
                }

                
            }
            else {
                alert("ocurrio un error");
            }
        }
    }


    
    xmlhttp.send();



}