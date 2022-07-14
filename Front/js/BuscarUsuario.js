var servidor = "http://localhost:777";

ListarUsusario();
function ListarUsusario(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/Listar', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(usuarios){
                    if (usuarios.foto == null)
                    { usuarios.foto  = "../imagenes/logo.jpg";  }
                     template +=
                     `<div class="col-sm-3">
                        <a>${usuarios.NombreUsuario}</a>
                        <br>
                          <img src="${usuarios.foto}" width="100" height="100" class="rounded-circle" alt="avatar">
                        <br>
                          <button onclick="Chatear(${usuarios.idUsuario})" class="form-control"> Chatear</button>  

                     <br>
                     </div>
                     
                     <br>
                     `;

                });
                
                console.log(template);
                document.getElementById('lista').innerHTML=template;


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();

}


function Chatear(idotrousuario)
{

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", servidor + '/Chat/getIdChat/'+localStorage.getItem('id')+'/'+idotrousuario);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
                json.map(function(id){
                    sessionStorage.setItem('idChat', id.id_um);
                    window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Chat/Chat.php";
                });
            }
            else {
                alert("ocurrio un error");
            }
        }
    }
    xmlhttp.send();

}

function Buscar(){

    var xmlhttp = new XMLHttpRequest();
   if(document.getElementById('txtBuscar').value != ""){
    xmlhttp.open("GET", servidor + '/Usuarios/GetUsuariosbyName/'+document.getElementById('txtBuscar').value, true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(usuarios){
                      
                    if (usuarios.foto == null)
                    { usuarios.foto  = "../imagenes/logo.jpg";  }
                     template +=
                     `<div class="col-sm-3">
                        <a>${usuarios.NombreUsuario}</a>
                        <br>
                          <img src="${usuarios.foto}" width="100" height="100" class="rounded-circle" alt="avatar">
                        <br>
                          <button onclick="Chatear(${usuarios.idUsuario})" > Chatear</button>  

                     <br>
                     </div>
                     
                     <br>
                     `;

                });
                
                console.log(template);
                document.getElementById('lista').innerHTML=template;


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();
   }
   else{
    ListarUsusario();
   }
}
